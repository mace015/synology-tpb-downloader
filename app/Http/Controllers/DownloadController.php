<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repositories\DownloadStation;

use Redirect;

class DownloadController extends Controller
{
    
	public function download() {

		$downloadStation = new DownloadStation();

		$download = $downloadStation->api()->addTask(request()->magnet);

		return Redirect::back()->withSuccess('Download task has been added');

	}

	public function deleteDownload($id) {

		$downloadStation = new DownloadStation();

		$download = $downloadStation->api()->deleteTask($id);

		return Redirect::back()->withSuccess('Download task has been deleted');

	}

}
