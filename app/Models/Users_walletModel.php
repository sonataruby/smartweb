<?php
namespace App\Models;
use App\Models\BaseModel;
use App\Libraries\Users;
//==================================================
// Smart Blockchain 
// Builder : v1.22.17
// Date : {date}
// Author : VO VAN KHOA
// Website : https://expressiq.co
//==================================================
class Users_walletModel extends BaseModel
{
    protected $price_token = 0.1;
    // ...
    protected $table      = 'users_wallet';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'object';
    protected $useSoftDeletes = false;

    protected $allowedFields = ["user_id","wallet_address","wallet_network","created_at","wallet_money","balance","local_balance"];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
    protected $user;
    public $page = 1;
    public $per_page = 20;
    
    private $search = [];
    private $NumTotals = 0;
    private $mutilanguage = false;
    private $system_where = [];

    private $tokenname = "SMFX";
    function __construct()
    {
        if($this->mutilanguage == true){
            $this->setLanguage();
        }
        $this->user = new Users();
        parent::__construct();
    }

    public function getTokenName(){
        return $this->tokenname;
    }

    public function getTokenPrice($symbol=""){
        if($symbol == "") return $this->price_token;
        $data = json_decode(file_get_contents("https://min-api.cryptocompare.com/data/price?fsym=".$symbol."&tsyms=USD&api_key=c0cc3568f034c2ab6eaf1e70a429b1aae1a6aa10187eabfd3849fa59eccc35e4"));
       
        return $data->USD;
    }

    public function converTokenToUSD($tokenNumber){
        return number_format($tokenNumber * $this->getTokenPrice(),2);
    }

    public function getTokenBTC(){
        return $this->tokenname;
    }
    
    public function getTokenETH(){
        return $this->tokenname;
    }

    public function getItems($where=[]){
        $request = service('request');

        if ($request->getVar("page")) {
            $this->page = (int) $request->getVar("page");
            $this->page = max(1, $this->page);
        }
        $offset = $this->per_page * ($this->page - 1);

        if($this->system_where){
            $this->where($this->system_where);
        }

        if($where){
            $this->where($where);
        }

        if($this->search && is_array($this->search)){
            foreach ($this->search as $key => $value) {
                $this->like($key,$value);
            }
        }
        
        if ($request->getVar("short")) {
            $this->orderBy($request->getVar("short"), $request->getVar("des") == "asc" ? 'ASC' : 'DESC');
        }
        $result = $this->findAll($this->per_page,$offset);
        $this->NumTotals = $this->getTotals($where);
        return ["items" => $result,"offset" => $offset, "page" => $this->getPages()];
        
    }

    public function getItem($id=false,$where=[],$next=false,$user_id=false){
        if($user_id){
            $where["user_id"] = $this->user->getAccountID();
        }

        if($where){
            $this->where($where);
        }
        if($next == true){
            return ["items" => $this->find($id),"next" => "", "last" => ""];
        }else{
            return $this->find($id);
        }
        
        
    }

    public function setLanguage($lang=""){
        $this->mutilanguage = session()->get("lang");
        $this->system_where["language"] = $this->mutilanguage;
        return $this;
    }

    

    public function setSearch($field=[], $search=""){
        
        foreach ($field as $key => $value) {
            $this->search[$value] = $search;
        }
        return $this;
    }


    public function getPages(){
        if($this->NumTotals < $this->per_page) return "";
        $pager = service('pager');
        $pagination = $pager->makeLinks($this->page, $this->per_page, $this->NumTotals, 'default_full');
        return $pagination;
    }

    
    public function getTotals()
    {
        $query = new Users_walletModel;
        if($this->system_where){
            $query->where($this->system_where);
        }
        if($where){
            $query->where($where);
        }

        if($this->search && is_array($this->search)){
            foreach ($this->search as $key => $value) {
                $query->like($key,$value);
            }
        }
        return $query->countAllResults();
    }

    public function getID(){
        return $this->insertID();
    }


    public function createRow($data=[], $user_id=false){
        if($this->mutilanguage != false){
            $data["language"] = $this->mutilanguage;
        }
        if($user_id){
            $data["user_id"] = $this->user->getAccountID();
            if($data["user_id"] == 0){
                 session()->setFlashdata("errors",lang("globals.update_error"));
                return 0;
            }
        }

        $walletExit = $this->checkWalletExit($data["wallet_network"]);
        if($walletExit >= 1){
            session()->setFlashdata("errors",lang("wallet.wallet_exit"));
            return 0;
        }
        if($data && $this->insert($data)){
            session()->setFlashdata("confirm",lang("globals.insert_confirm"));
            return $this->getID();
        }else{
            session()->setFlashdata("errors",lang("globals.insert_error"));
            return 0;
        }
    }

    public function updateRow($id, $data=[], $user_id=false){
        if($this->mutilanguage != false){
            $this->where("language",$this->mutilanguage);
        }
        if($user_id){
            $read = $this->getItem($id);
            if($read->user_id != $this->user->getAccountID()){
                 session()->setFlashdata("errors",lang("globals.update_error"));
                return 0;
            }
            
        }

        

        if($data && $this->update($id,$data)){
            session()->setFlashdata("confirm",lang("globals.update_confirm"));
            return $id;
        }else{
            session()->setFlashdata("errors",lang("globals.update_error"));
            return $id;
        }
    }

    public function removeRow($id, $user_id=false){
        if($user_id==true){
            $this->where(["user_id" => $this->user->getAccountID()]);
        }
        if($this->delete($id)){
            session()->setFlashdata("confirm",lang("globals.delete_confirm"));
            return $id;
        }else{
            session()->setFlashdata("errors",lang("globals.delete_error"));
            return $id;
        }
    }


    public function checkWalletExit($service){
         return $this->where("user_id",$this->user->getAccountID())->where("wallet_network",$service)->countAllResults();
    }


    public function checkWallet(){
        
        return $this->where("user_id",$this->user->getAccountID())->findAll();
    }



    public function getBalance($network){
        $data = $this->where(["user_id" => $this->user->getAccountID(),"wallet_network" => $network])->first();
        $money = $data->balance + $data->local_balance;
        
        return $money;
    }


    //Set Balance When Payment
    public function setBalanceToken($total,$money,$paymentid,$payerid,$serviceInfo){
        $getPrice = $this->getTokenPrice();
        if($money == "BTC"){
            $getPrice = $this->getTokenPrice("BTC");
        }
        if($money == "ETH"){
            $getPrice = $this->getTokenPrice("ETH");
        }

        $totaltokenbuy = number_format($total / $getPrice,0);

        $data = $this->where(["user_id" => $this->user->getAccountID(),"wallet_network" => "BSC"])->first();

        if($data == ""){
            $this->createRow(["wallet_network" => "BSC"],true);
            $value = $this->where(["user_id" => $this->user->getAccountID(),"wallet_network" => "BSC"])->first();
        }else{
            $value = $data;
        }
        

        $aod = new Users_walletModel;
        if($aod->update(["id" => $value->id,"user_id" => $value->user_id],["balance" => $value->balance + $totaltokenbuy])){
            return true;
        }
    }



    //Set Balance When Aidrop
    public function setBalanceTokenAirdrop($amount=0){
     
        $totaltokenbuy = number_format($amount,0);

        $data = $this->where(["user_id" => $this->user->getAccountID(),"wallet_network" => "BSC"])->first();

        if($data == ""){
            $this->createRow(["wallet_network" => "BSC"],true);
            $value = $this->where(["user_id" => $this->user->getAccountID(),"wallet_network" => "BSC"])->first();
        }else{
            $value = $data;
        }
        

        $aod = new Users_walletModel;
        if($aod->update(["id" => $value->id,"user_id" => $value->user_id],["local_balance" => $value->local_balance + $totaltokenbuy])){
            return true;
        }
    }

    //Set Balance When Use Service

    public function setBalancePaymentService($service,$amount){
        $data = $this->where(["user_id" => $this->user->getAccountID(),"wallet_network" => $service])->first();
        $total = $data->balance + $data->local_balance;

        if($total >= $amount){
            $aod = new Users_walletModel;
            $arvUpdate = [];
            if($data->balance >= $amount){
                $arvUpdate["balance"] = $data->balance - $amount;
            }else{
                $in_balance = $amount - $data->balance;
                $arvUpdate["balance"] = 0;
                $arvUpdate["local_balance"] = $data->local_balance - $in_balance;
            }

            if($aod->update(["id" => $data->id,"user_id" => $data->user_id],$arvUpdate)){
                $miss = 0;
                return true;
            }
        }
        return false;
    }
}
