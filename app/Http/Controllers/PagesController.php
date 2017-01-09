<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Xurumelous\TorrentScraper\TorrentScraperService;

use App\Repositories\DownloadStation;

use View;

class PagesController extends Controller
{
    
	public function index($search = '', $results = []) {

		$downloadStation = new DownloadStation();

		$downloads = $downloadStation->api()->getTaskList();

		return View::make('index', compact('search', 'results', 'downloads'));

	}

	public function search() {

		$search = request()->search;
		$results = (new TorrentScraperService(['thePirateBay']))->search($search);

		return $this->index($search, $results);

	}

}
