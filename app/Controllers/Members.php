<?php

namespace App\Controllers;

class Members extends AccountController
{
	public function index()
	{
		$this->data["code"] = $this->user->getSession()->refcode;
		$this->view = 'account/members';
	}
}