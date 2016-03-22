<?php namespace App\Http\Controllers;

use stdClass;

class HomeController extends Controller {


    /**
     * Show the homepage.
     * Gets content from the blog to show.
     * @return View
     */
	public function home()
    {
		// Get Blog articles
        if ($this->cache->has('blog-feed')) {
            $blogItems = $this->cache->get('blog-feed');
        } else {
            $blogItems = $this->getBlogPosts();
            $this->cache->put('blog-feed', $blogItems, 60*12);
        }

		return view('home', [
            'blogItems' => $blogItems
        ]);
	}

    /**
     * Get blog posts from the BookStack blog.
     * @return Array[stdClass]
     */
    public function getBlogPosts()
    {
        $contents = file_get_contents('https://www.bookstackapp.com/blog/rss/');
        $blogItems = [];
        $rss = simplexml_load_string($contents);

        if ($rss !== false) {
            foreach ($rss->channel->{'item'} as $item) {
                $blogItem = new stdClass;
                $blogItem->link = (string) $item->link;
                $blogItem->title = (string) $item->title;
                $blogItem->description = (string) strip_tags($item->description);
                $blogItems[] = $blogItem;
            }
        } else {
            return [];
        }

        $blogItems = array_slice($blogItems, 0, 3);
        return $blogItems;
    }

}
