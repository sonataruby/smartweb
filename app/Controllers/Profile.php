<?php

namespace App\Controllers;

class Profile extends AccountController
{
	public function index()
	{

		$this->data["profile"] = $this->user->getInfoProfile();
		$this->setSEO(["title" => $this->data["profile"]->firstname." - ".$this->data["profile"]->lastname." - Profile"]);
		$this->view = 'account/profile';
	}

	public function update(){
		if($this->request->getVar("post")){
			$this->user->UpdateProfile($this->request->getVar("post"));
			
		}
		return redirect()->to("/profile");
		exit();
	}

	public function changepass(){
		$password = $this->request->getVar("password");
		$repassword = $this->request->getVar("repassword");
		if($password == $repassword){
			
			$this->user->UpdatePassword($password);
			
		}else{
			session()->setFlashdata("errors",lang("users.password_error"));
		}
		
		return redirect()->to("/profile");
		exit();
	}
}