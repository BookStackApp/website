<?php namespace App\Http\Controllers;

use \Parsedown;

class DocsController extends Controller
{

	/**
	 * Show the index page for all documents.
	 * @return View
	 */
    public function index()
    {
        return view('docs/index');
    }

    /**
     * Show a page of documentation
     * @param  string $type Documentation Category
     * @param  string $page Documentation Page Name
     * @return [type]
     */
    public function showPage($type, $page)
    {
    	$type = strtolower($type);
    	if ($type !== 'admin' && $type !== 'user') abort(404);

    	$cacheKey = $type . '-' . $page;
    	if ($this->cache->has($cacheKey) && !app()->environment('local')) {
    		$html = $this->cache->get($cacheKey);
    	} else {
    		$html = $this->getDocumentFromMarkdown($type, $page);
    		$this->cache->forever($cacheKey, $html);
    	}

    	if ($this->cache->has($cacheKey . '_title') && !app()->environment('local')) {
    		$title = $this->cache->get($cacheKey . '_title');
    	} else {
    		$title = $this->getTitleFromHtml($html);
    		$this->cache->forever($cacheKey . '_title', $title);
    	}

    	return view('docs/' . $type, [
    		'html' => $html,
    		'title' => $title
    	]);
    }

    /**
     * Get a page title from the HTML content.
     * @param  string $html Page HTML content
     * @return string
     */
    protected function getTitleFromHtml($html)
    {
    	$titleRegex = '/<h1>(.*?)<\/h1>/';
    	$matches = [];
    	preg_match_all($titleRegex, $html, $matches);

    	if (isset($matches[1]) && isset($matches[1][0])) {
    		return $matches[1][0];
    	}

    	return false;
    }

    /**
     * Get document HTML from markdown content.
     * @param  string $type Documentation Category
     * @param  string $page Documentation Page Name
     * @return string       Page HTML
     */
    protected function getDocumentFromMarkdown($type, $page)
    {
    	$filePath = app()->basePath('resources/docs/' . strtolower($type) . '/' . strtolower($page) . '.md');

    	if (!file_exists($filePath) || !is_readable($filePath)) {
    		abort(404);
    	}

    	$markdown = file_get_contents($filePath);
    	$parseDown = new Parsedown();
    	$html = $parseDown->text($markdown);
    	return $html;
    }

}