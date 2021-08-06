<?php

namespace App\Controllers;
use App\Libraries\Users;
use App\Models\Users_walletModel;
use App\Models\Wallet;
use App\Controllers\Trader;
class Smarttrader extends AccountController
{
	
	private $price_signals = 12;
	private $price_copy = 3;
	private $price_vps = 15;//USD

	public function index()
	{
		$this->view = 'trader/index';
	}


	public function copytrade(){

		$wallet = new Users_walletModel();
		$this->setSEO(["title" => "Smart Copy Trade"]);
		$this->breadcrumb->add('Dashboard', '/cpanel');
		$this->breadcrumb->add('Signals', "/trader");
		$this->breadcrumb->add('Copy Trade', '/index');
		$this->data['breadcrumbs'] = $this->breadcrumb->render();
		$this->data["balance_token"] = $wallet->getBalance("token");
		$trade = new Trader;
		$this->data["symbol"] = $trade->symbol();
		$this->data["price_token"] = $wallet->getTokenPrice();
		$this->data["price_btc"] = $wallet->getTokenPrice("BTC");
		$this->data["price_eth"] = $wallet->getTokenPrice("ETH");
		$this->data["price_copy"] = $wallet->converUSDToToken($this->price_copy);
		$this->data["price_vps"] = $wallet->converUSDToToken($this->price_vps);
		$this->data["tokenname"] = $wallet->getTokenName();

		$db = \Config\Database::connect();
		$builder = $db->table('copytrade');
		$userid = $this->user->getAccountID();
		$signal = $db->query("SELECT * FROM signals_access where account_id='".$userid."' AND endtime >= NOW() + INTERVAL 1 DAY LIMIT 100")->getResult();
		$this->data["signal"] = $signal;

		$read = $builder->where("account_id",$userid)->get()->getRow();
		$this->data["signalinfo"] = $read;
		$this->data["signalready"] = (array)json_decode($read->options);

		if($this->request->getVar("metaid") && $this->request->getVar("metaid") != ""){
				
			
				$signalSelect = $this->request->getVar("signals");
				$options[$signalSelect] = [
					"size" => $this->request->getVar("size") > 0 && $this->request->getVar("size") < 3 ? $this->request->getVar("size") : 1,
					"limit" => $this->request->getVar("limit") > 0 && $this->request->getVar("limit") < 16 ? $this->request->getVar("limit") : 10
				];
				
				


				if(!$read){
					$arv = [
						"account_id" => $userid,
						"meta_id" => $this->request->getVar("metaid"),
						"meta_password" => $this->request->getVar("metapass"),
						"metaserver" => $this->request->getVar("servermeta"),
						"serialmeta" => generate_token(),
						"options" => json_encode($options)
					];
					$builder->insert($arv);
				}else{
					if($read->options != ""){
						$options = array_merge($this->data["signalready"],$options);
					}
					$arv = [
						"meta_id" => $this->request->getVar("metaid"),
						"meta_password" => $this->request->getVar("metapass"),
						"metaserver" => $this->request->getVar("servermeta"),
						"options" => json_encode($options)
					];
					
					$builder->where("id",$read->id)->update($arv);
				}
			session()->setFlashdata("confirm","Copytrade Setting Update ".$signalSelect." signals");
			return redirect()->to("/smarttrader/copytrade");
		}
		$this->view = 'trader/copytrade';
		//return redirect()->to("/smarttrader/upvip");
	}

	public function smartea(){
		return redirect()->to("/smarttrader/upvip");
	}

	public function upvip(){
		$wallet = new Users_walletModel();
		$this->setSEO(["title" => "Update VIP Signals"]);

		if($this->request->getVar("symbol") && $this->request->getVar("symbol") != ""){
			if($wallet->setBalancePaymentService("token",$this->price_signals)){
				
				$this->setAccessVip($this->request->getVar("symbol"));
				session()->setFlashdata("confirm","Your are access VIP ".$this->request->getVar("symbol")." signals");
				return redirect()->to("/smarttrader/upvip");
			}else{
				session()->setFlashdata("errors","Update VIP Signals".$this->request->getVar("symbol")." Error");
				return redirect()->to("/smarttrader/upvip");
			}
		}

		$this->breadcrumb->add('Dashboard', '/cpanel');
		$this->breadcrumb->add('Signals', "/trader");
		$this->breadcrumb->add('Update VIP', '/index');
		$this->data['breadcrumbs'] = $this->breadcrumb->render();
		$this->data["balance_token"] = $wallet->getBalance("token");
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
		
		$readOldAccess = $db->query("SELECT * FROM signals_access where account_id='".$this->user->getAccountID()."' AND symbol='".$symbol."'")->getRow();
		$starttime  = date('Y-m-d h:i:s');
		$checktime = strtotime($readOldAccess->endtime);
		if($checktime > time() && @$readOldAccess->endtime != ""){
			$endtime 	= date('Y-m-d h:i:s',strtotime( "+30 day",strtotime($readOldAccess->endtime)));
		}else{
			$endtime 	= date('Y-m-d h:i:s',strtotime( "+30 day",strtotime($starttime)));
		}
		

        $query = $db->query("INSERT INTO signals_access (`account_id`, `symbol`, `status`, `created_at`, `starttime`, `endtime`) VALUES ('".$this->user->getAccountID()."', '".$symbol."', 'active', CURRENT_TIMESTAMP, '".$starttime."', '".$endtime."');");

	}


	public function signals(){
		$db = \Config\Database::connect();
		
		$readOldAccess = $db->query("SELECT * FROM signals_access where account_id='".$this->user->getAccountID()."'")->getResult();

		$wallet = new Users_walletModel();
		$this->setSEO(["title" => "VIP Signals"]);
		$this->breadcrumb->add('Dashboard', '/cpanel');
		$this->breadcrumb->add('Signals', "/smarttrader/signals");
		$this->breadcrumb->add('VIP Signals', '/signals');
		$this->data['breadcrumbs'] = $this->breadcrumb->render();
		$this->data["balance_token"] = $wallet->getBalance("token");
		$this->data["tokenname"] = $wallet->getTokenName();
		$this->data["symbolvip"] = $readOldAccess;
		$this->view = 'trader/mysignals';
	}
	
}

?>