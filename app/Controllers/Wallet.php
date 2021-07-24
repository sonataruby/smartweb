<?php

namespace App\Controllers;
use App\Models\Users_walletModel;
class Wallet extends AccountController
{
	private $tokenname = "SMFX";

	public function index()
	{
		$wallet = new Users_walletModel();
		$this->data["wallet"] = $wallet->checkWallet();
		//return $this->view = 'home/index';
	}

	public function token($wallet){
		
	}



	public function create($id=false){

		$wallet = new Users_walletModel();
		$this->breadcrumb->add('Dashboard', '/cpanel');
		$this->breadcrumb->add(lang('users_wallet.modules'), $this->link);
		$this->breadcrumb->add(lang('users_wallet.create'), '/index');
		$this->data['breadcrumbs'] = $this->breadcrumb->render();
		$this->data["tokenname"] = $wallet->getTokenName();
		$this->data["item"] = $wallet->getItem($id,[],false,true);
		if($this->request->getVar("post")){
			
			if($id !== false) $wallet->updateRow($id,$this->request->getVar("post"),true);
			if($id == false) {
				$data = $this->request->getVar("post");
				if($data["wallet_network"] == "eth"){
					$data["wallet_money"] = "ETH";
				}
				if($data["wallet_network"] == "btc"){
					$data["wallet_money"] = "BTC";
				}
				if($data["wallet_network"] == "paypal"){
					$data["wallet_money"] = "USD";
				}
				if($data["wallet_network"] == "token"){
					$data["wallet_money"] = $wallet->getTokenName();
				}

				$wallet->createRow($data,true);
			}
			return redirect()->to("/wallet");
			
		}
	}

	public function remove($id){
		$wallet = new Users_walletModel();
		$wallet->removeRow($id,true);
		return redirect()->to("/wallet");
	}

	public function deposit($network=""){

	}
}