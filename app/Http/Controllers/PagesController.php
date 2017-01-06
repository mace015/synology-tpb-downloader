<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Xurumelous\TorrentScraper\TorrentScraperService;

use View;

class PagesController extends Controller
{
    
	public function index($search = '', $results = []) {

		require(base_path(). '/vendor/zzarbi/synology/src/Synology/DownloadStation/Api.php');

		$synology = new \Synology_DownloadStation_Api(config('synology.host'), config('synology.port'), config('synology.protocol'), 1);
		$synology->connect(config('synology.user'), config('synology.password'));

		$downloads = $synology->getTaskList();

		return View::make('index', compact('search', 'results', 'downloads'));

	}

	public function search() {

		$search = request()->search;
		$results = (new TorrentScraperService(['thePirateBay']))->search($search);

		return $this->index($search, $results);

	}

}
