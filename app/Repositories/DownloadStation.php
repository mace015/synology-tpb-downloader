<?php

namespace App\Repositories;

class DownloadStation {

	protected $synology;

	public function __construct() {

		require(base_path(). '/vendor/zzarbi/synology/src/Synology/DownloadStation/Api.php');

		$this->synology = new \Synology_DownloadStation_Api(
			config('synology.host'),
			config('synology.port'),
			config('synology.protocol'),
			1
		);

		$this->synology->connect(
			config('synology.user'),
			config('synology.password')
		);

	}

	public function api() {

		return $this->synology;

	}

}