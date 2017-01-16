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

		$torrents = [];

		$results = (new TorrentScraperService(['thePirateBay']))->search(request()->search);

		foreach ($results as $result) {
			$torrents[] = [
				'name'    => $result->getName(),
				'seeders' => $result->getSeeders(),
				'magnet'  => $result->getMagnetUrl()
			];
		}

		return $torrents;

	}

}
