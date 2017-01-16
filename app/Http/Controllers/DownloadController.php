<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repositories\DownloadStation;

use Redirect;

class DownloadController extends Controller
{

	public function downloads() {

		$downloadStation = new DownloadStation();

		$downloads = $downloadStation->api()->getTaskList();

		return json_encode($downloads);

	}
    
	public function download() {

		$downloadStation = new DownloadStation();

		$download = $downloadStation->api()->addTask(request()->magnet);

		return json_encode($download);

	}

	public function deleteDownload($id) {

		$downloadStation = new DownloadStation();

		$download = $downloadStation->api()->deleteTask($id);

		return json_encode($download);
	}

}
