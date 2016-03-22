<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Contracts\Cache\Repository as Cache;

class Controller extends BaseController {

	protected $cache;

	/**
	 * Controller constructor.
	 * @param $cache
	 */
	public function __construct(Cache $cache)
	{
		$this->cache = $cache;
	}

}
