<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Xurumelous\TorrentScraper\TorrentScraperService;

use View;

class PagesController extends Controller
{
    
	public function index() {

		return View::make('index', compact('search', 'results', 'downloads'));

	}

	public function search() {

		$search = request()->search;
		$results = (new TorrentScraperService(['thePirateBay']))->search($search);

		return json_encode($results);

	}

}
