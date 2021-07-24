<?php

namespace App\Controllers;
use App\Libraries\Users;
use App\Models\Users_walletModel;
use App\Models\Wallet;
use App\Controllers\Trader;
class Smarttrader extends AccountController
{
	private $tokenMethod = "token";
	private $price_signals = 5;
	private $price_token = 0.1;//0.1 USD

	public function index()
	{
		$this->view = 'trader/index';
	}

	public function upvip(){
		$wallet = new Users_walletModel();
		$this->setSEO(["title" => "Update VIP Signals"]);

		if($this->request->getVar("symbol")){
			if($wallet->setBalance($service,$this->price_signals)){
				
				$this->setAccessVip($this->request->getVar("symbol"));
			}
		}

		$this->breadcrumb->add('Dashboard', '/cpanel');
		$this->breadcrumb->add('Signals', "/trader");
		$this->breadcrumb->add('Update VIP', '/index');
		$this->data['breadcrumbs'] = $this->breadcrumb->render();
		$this->data["balance_token"] = $wallet->getBalance($tokenMethod);
		$trade = new Trader;
		$this->data["symbol"] = $trade->symbol();
		$this->data["price_token"] = $wallet->getTokenPrice();
		$this->data["price_btc"] = $wallet->getTokenPrice("BTC");
		$this->data["price_eth"] = $wallet->getTokenPrice("ETH");
		$this->data["price_signals"] = $this->price_signals;
		$this->data["tokenname"] = $wallet->getTokenName();
		$this->view = 'trader/upvip';
	}


	public function setAccessVip($symbol){
		$this->user = new Users();
		if($this->user->hasLogin() == false ) return "guest";


		$db = \Config\Database::connect();
        $query = $db->query("INSERT INTO signals_access (`account_id`, `symbol`, `status`, `created_at`, `starttime`, `endtime`) VALUES ('".$this->user->getAccountID()."', '".$symbol."', 'active', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);");

	}
	
}

?>