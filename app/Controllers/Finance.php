<?php

namespace App\Controllers;
use App\Models\Users_walletModel;
use App\Models\FinaceappsModel;

class Finance extends AccountController
{
	

	public function index()
	{
		$this->setSEO(["title" => "Smart Finance Apps"]);
		$this->breadcrumb->add('Dashboard', '/cpanel');
		$this->breadcrumb->add("finance", '/finance');
		$this->breadcrumb->add("Smart Finance Apps", '/index');
		$this->data['breadcrumbs'] = $this->breadcrumb->render();
		$app = new FinaceappsModel;
		$this->data["app"] = $app->getItems();
	}
}