<?php
namespace App\Libraries;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
use App\Models\Users_walletModel;
class WhatToDo extends Model{
	public function register_complete($arv){
		$wallet = new Users_walletModel();
		$wallet->setBalanceTokenAirdrop(3,$arv->id);
	}

	public function firstlogin_complete($arv){

		$wallet = new Users_walletModel();
		$wallet->setBalanceTokenAirdrop(3,$arv->id);
	}


	public function intivite_complete($arv){
		$wallet = new Users_walletModel();
		$wallet->setBalanceTokenAirdrop($wallet->getTokenAmountAirdrop(),$arv->intivite_id);
	}


	public function firstbuy_complete(){

	}

	public function runQueryAction($action="", $arv=[]){
		if($action == "register"){
			//Function Register Account
			$this->register_complete();
		}

		if($action == "loginfirst"){
			//Function Register Account
			$this->firstlogin_complete($arv);
		}

		if($action == "intivite"){
			//Function intivite Account
			$this->intivite_complete($arv);
		}
		if($action == "firstbuy"){
			//Function First Buy Token
			$this->firstbuy_complete($arv);
		}

	}
}
?>