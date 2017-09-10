<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repositories\DownloadStation;


class DownloadController extends Controller
{
    public function downloads()
    {
        $downloadStation = new DownloadStation();

        $downloads = $downloadStation->api()->getTaskList();

        return $downloads->tasks;
    }

    public function download()
    {
        $downloadStation = new DownloadStation();

        $download = $downloadStation->api()->addTask(request()->magnet);

        return 'true';
    }

    public function deleteDownload()
    {
        $downloadStation = new DownloadStation();

        $download = $downloadStation->api()->deleteTask(request()->id);

        return 'true';
    }
}
