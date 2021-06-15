<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
	public function index()
	{
		$this->setIsHome();
		//return $this->view = 'home/index';
	}
}
