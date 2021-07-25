<?php

namespace App\Controllers;
use App\Libraries\Users;
use App\Models\SignalsModel;
class Trader extends BaseController
{
	private $SocketIOServer = "127.0.0.1";
	private $SocketIOPort = "3000";
	public function index()
	{
		$this->setSEO(["title" => "Smart Signal"]);
		$this->jsLoad("assets/core/socket.io.js");
		$this->data["signals"] = $this->signals(true);
		$this->data["symbol"] = $this->symbol();
		$this->data["report"] = $this->getReport();
		$this->data["bestbroker"] = [
			["link" => "https://secure.tickmill.com?utm_campaign=ib_link&utm_content=IB21222244","image" => "https://cdn.tickmill.com/promotional/3/banners/static/Welcome-Account_240x400_en.png"],
			["link" => "https://one.exness.link/a/tjm6vjm6","image" => "https://www.exness.com/media/banners/vi/static/250x250_VI_Registration_AccessFunds.png"],
			["link" => "https://www.icmarkets.com/?camp=38308","image" => "https://promo.icmarkets.com/ic markets_logo_black_200x200.jpg"],
			["link" => "https://secure.tickmill.com?utm_campaign=ib_link&utm_content=IB21222244","image" => "https://cdn.tickmill.com/promotional/3/banners/static/Welcome-Account_240x400_en.png"]
		];
		$this->data["video"] = [];
		
	}

	public function account($meta_id){
		$db = \Config\Database::connect();
        $query = $db->query("SELECT * FROM trader where meta_id='".$meta_id."' AND active='1'")->getRow();
        $arv = [];
        $arv["serial"] = "";
        $arv["size"] = "auto";
        header('Content-Type: application/json');
		echo json_encode($arv);
		exit();
		$this->layout = "application/json";
		$this->view = "json";
		
	}

	public function signals($returndata=false){
		$db = \Config\Database::connect();
        $query = $db->query("SELECT * FROM signals where active='active' AND status != 'complete' AND status != 'cancel' ORDER BY id DESC LIMIT 100")->getResult();
        $arv = [];
        foreach ($query as $key => $value) {
        	$value->access = $this->getMemberGroups($value->symbol);
        	$value->open = $this->formatSymbolPrice($value->symbol,$value->open);
        	$value->sl = $this->formatSymbolPrice($value->symbol,$value->sl);
        	$value->tp1 = $this->formatSymbolPrice($value->symbol,$value->tp1);
        	$value->tp2 = $this->formatSymbolPrice($value->symbol,$value->tp2);
        	$value->tp3 = $this->formatSymbolPrice($value->symbol,$value->tp3);
        	$arv[] = $value;
        }
        if($returndata == true) return $arv;
        header('Access-Control-Allow-Origin: *');
		header('Content-type: application/json');
		print_r(json_encode($arv));
		exit();
		
	}
	
	private function getMemberGroups($symbol){
		if($this->user->hasLogin() == false ) return "guest";


		$db = \Config\Database::connect();
        $query = $db->query("SELECT * FROM signals_access where symbol='".$symbol."' AND account_id = '".$this->user->getAccountID()."' AND status = 'active' AND starttime < '".time()."' AND endtime > '".time()."' ORDER BY id DESC LIMIT 1")->getNumRows();
        if($query > 0) return "vip";


		return "guest";
	}

	

	public function symbol(){
		$arv = [];
		$arv["XAUUSD"] = ["format" => 3, "factor" => 100, "point" => 0.001];
		$arv["GBPUSD"] = ["format" => 5, "factor" => 10, "point" => 0.00001];
		$arv["XAGUSD"] = ["format" => 3, "factor" => 10, "point" => 0.001];
		$arv["GBPJPY"] = ["format" => 3, "factor" => 10, "point" => 0.001];
		$arv["GBPCHF"] = ["format" => 5, "factor" => 10, "point" => 0.00001];
		$arv["GBPNZD"] = ["format" => 5, "factor" => 10, "point" => 0.00001];
		$arv["GBPCAD"] = ["format" => 5, "factor" => 10, "point" => 0.00001];
		$arv["GBPAUD"] = ["format" => 5, "factor" => 10, "point" => 0.00001];
		$arv["EURUSD"] = ["format" => 5, "factor" => 10, "point" => 0.00001];
		$arv["EURAUD"] = ["format" => 5, "factor" => 10, "point" => 0.00001];
		$arv["EURCAD"] = ["format" => 5, "factor" => 10, "point" => 0.00001];
		$arv["EURCHF"] = ["format" => 5, "factor" => 10, "point" => 0.00001];
		$arv["EURGBP"] = ["format" => 5, "factor" => 10, "point" => 0.00001];
		$arv["EURJPY"] = ["format" => 3, "factor" => 10, "point" => 0.001];
		$arv["EURNZD"] = ["format" => 5, "factor" => 10, "point" => 0.00001];
		$arv["USDJPY"] = ["format" => 3, "factor" => 10, "point" => 0.001];
		$arv["USDCHF"] = ["format" => 5, "factor" => 10, "point" => 0.00001];
		$arv["USDCAD"] = ["format" => 5, "factor" => 10, "point" => 0.00001];
		$arv["AUDUSD"] = ["format" => 5, "factor" => 10, "point" => 0.00001];
		$arv["AUDCAD"] = ["format" => 5, "factor" => 10, "point" => 0.00001];
		$arv["AUDJPY"] = ["format" => 3, "factor" => 10, "point" => 0.001];
		$arv["AUDCHF"] = ["format" => 5, "factor" => 10, "point" => 0.00001];
		$arv["CHFJPY"] = ["format" => 3, "factor" => 10, "point" => 0.001];
		$arv["NZDUSD"] = ["format" => 5, "factor" => 10, "point" => 0.00001];
		$arv["NZDJPY"] = ["format" => 3, "factor" => 10, "point" => 0.001];
		$arv["NZDCAD"] = ["format" => 5, "factor" => 10, "point" => 0.00001];
		$arv["NZDCHF"] = ["format" => 5, "factor" => 10, "point" => 0.00001];
		$arv["AUDNZD"] = ["format" => 5, "factor" => 10, "point" => 0.00001];
		$arv["CADCHF"] = ["format" => 5, "factor" => 10, "point" => 0.00001];
		$arv["CADJPY"] = ["format" => 3, "factor" => 10, "point" => 0.001];
		$arv["BTCUSD"] = ["format" => 2, "factor" => 1000, "point" => 0.01];
		$arv["ETHUSD"] = ["format" => 2, "factor" => 100, "point" => 0.01];
		$arv["XRPUSD"] = ["format" => 5, "factor" => 10, "point" => 0.00001];
		return $arv;
	}
	private function formatSymbolPrice($symbol,$price){
		$arv = $this->symbol();
		if(is_array($arv[$symbol]) && $price > 0){
			return number_format($price,$arv[$symbol]["format"]); 
		}
		return $price;
	}


	private function getReport(){
		$arv = [
			"usd" => 520.7,
			"pip" => 780,
			"member" => $this->user->getTotals(),
			"signals" => 24
		];
		return (object)$arv;
	}
	public function cratesignals(){
		
		$signals = new SignalsModel;
		//{"ticket":"232437174","symbol":"BTCUSD","type":"SELLLIMIT","open":"35387.02","sl":"0","tp":"0"}
		//$json = json_decode($data);

		$json = json_decode(urldecode($_SERVER['argv'][3]));
		$type = $json->type;
		$symbol = $json->symbol;
		$ticket = $json->ticket;

		$arv["open"] 	= $json->open;
		$arv["sl"] 	= $json->sl;
		$arv["tp1"] 	= $json->tp;
		$arv["type"] = $type;
		if($type == "SELLLIMIT" || $type == "SELLSTOP"){
			$arv["type"] = "SELL";
			$arv["status"] = "pending";
		}

		if($type == "BUYLIMIT" || $type == "BUYSTOP"){
			$arv["type"] = "BUY";
			$arv["status"] = "pending";
		}
		if($type == "BUY" || $type == "SELL"){
			$arv["status"] = "active";
		}
		$arv["ticket"] = $ticket;
		$arv["symbol"] = $symbol;
		$arv["is_free"] = "no";
		$arv["opendate"] = date("Y-m-d h:i:s");
		$supportSymbol = $this->symbol();
		if($supportSymbol[$symbol] != "") $signals->createRow($arv);

		//$this->sendTelegram($arv);
		//$this->sendDiscord($arv);
		//$this->alertSocket();
		//$this->alertApps();
		exit();
	}


	public function closesignals(){
		$json = $this->request->getJSON();
		exit();
	}

	public function movesignals(){
		$json = $this->request->getJSON();
		exit();
	}
	
	private function sendTelegram($arv){

	}

	private function sendDiscord($arv){

	}

	private function alertSocket(){
		//$client = new \Libs\SocketIO();
		//$client->send($this->SocketIOServer,$this->SocketIOPort,'waitevent',"Events : ".$msg);
	}

	private function alertApps($contents){
		$content = array(
	        "en" => $contents
	        );

	    $fields = array(
	        'app_id' => "97eca75d-76a0-4848-b379-ab26c14696e5",
	        'included_segments' => array('All'),
	        'data' => array("foo" => "bar"),
	        'large_icon' =>"logo.png",
	        'contents' => $content
	    );

	    $fields = json_encode($fields);
	

	    $ch = curl_init();
	    curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
	    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',
	                                               'Authorization: Basic MzhkZGE3OWYtNTIwMy00MTY2LThhM2YtZGVlN2M2OTA4NmZl'));
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, FALSE);
	    curl_setopt($ch, CURLOPT_HEADER, FALSE);
	    curl_setopt($ch, CURLOPT_POST, TRUE);
	    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
	    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);    

	    curl_exec($ch);
	    curl_close($ch);
	}
}