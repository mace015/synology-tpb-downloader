<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Xurumelous\TorrentScraper\TorrentScraperService;

use View;

class PagesController extends Controller
{
    
	public function index($search = '', $results = []) {

		return View::make('index', compact('search', 'results'));

	}

	public function search() {

		$search = request()->search;
		$results = (new TorrentScraperService(['thePirateBay']))->search($search);

		return $this->index($search, $results);

	}

}
