<?php
namespace App\Controllers;

class Dashboard extends BaseController
{
	public function index()
	{
		if(getenv("INSTALL") == ""){
            return redirect()->to("install");
        }
		$this->setIsHome();
		
		//return $this->view = 'home/index';
	}
}
