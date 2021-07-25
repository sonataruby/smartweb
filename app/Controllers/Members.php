<?php

namespace App\Controllers;
use App\Models\Users_walletModel;
class Members extends AccountController
{
	public function index()
	{
		$wallet = new Users_walletModel;
		$this->data["code"] = $this->user->getSession()->refcode;
		$this->data["membership"] = $this->user->getRelaytionShip();
		$this->data["token"] = $wallet->getTokenName();
		$this->data["airdrop"] = $wallet->getTokenAmountAirdrop();
		
		$this->view = 'account/members';
	}
}