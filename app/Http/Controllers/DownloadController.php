<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Redirect;

class DownloadController extends Controller
{
    
	public function download() {

		$synology = new \Synology_DownloadStation_Api(config('synology.host'), config('synology.port'), config('synology.protocol'), 1);
		$synology->connect(config('synology.user'), config('synology.password'));

		$download = $synology->addTask(request()->magnet);

		return Redirect::back();

	}

	public function deleteDownload($id) {

		$synology = new \Synology_DownloadStation_Api(config('synology.host'), config('synology.port'), config('synology.protocol'), 1);
		$synology->connect(config('synology.user'), config('synology.password'));

		$download = $synology->deleteTask($id);

		return Redirect::back();

	}

}
