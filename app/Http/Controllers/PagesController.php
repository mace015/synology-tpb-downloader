<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Xurumelous\TorrentScraper\TorrentScraperService;

use View;

class PagesController extends Controller
{
    
	public function index() {

		return View::make('index');

	}

	public function search() {

		$results = (new TorrentScraperService(['thePirateBay']))->search(request()->dork);

		return View::make('index', compact('results'));

	}

}
