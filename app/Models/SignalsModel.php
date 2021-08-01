<?php
namespace App\Models;
use App\Models\BaseModel;
//==================================================
// Smart Blockchain 
// Builder : v1.22.17
// Date : {date}
// Author : VO VAN KHOA
// Website : https://expressiq.co
//==================================================
class SignalsModel extends BaseModel
{
    // ...
    protected $table      = 'signals';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'object';
    protected $useSoftDeletes = false;

    protected $allowedFields = ["is_free","symbol","type","open","sl","tp1","tp2","tp3","status","active","profits","opendate","closedate","ticket","close","week"];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public $page = 1;
    public $per_page = 20;
    
    private $search = [];
    private $NumTotals = 0;
    private $mutilanguage = false;
    private $system_where = [];

    function __construct()
    {
        if($this->mutilanguage == true){
            $this->setLanguage();
        }
        parent::__construct();
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
            $this->orderBy($request->getVar("short") == "" ? "opendate" : $request->getVar("short"), $request->getVar("des") == "asc" ? 'ASC' : 'DESC');
        }
        $result = $this->findAll($this->per_page,$offset);
        $this->NumTotals = $this->getTotals($where);
        return ["items" => $result,"offset" => $offset, "page" => $this->getPages()];
        
    }

    public function getItem($id=false,$where=[],$next=false){

        if($where){
            $this->where($where);
        }
        if($next == true){
            return ["items" => $this->find($id),"next" => $this->getNextRow(), "last" => $this->getPreviousRow()];
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
        $query = new SignalsModel;
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

    public function getWeekReport(){
        $this->where("week",date("W"));
        $this->select("SUM(profits) as pipsTotals");
        $arv["pips"] = $this->first()->pipsTotals;
        $query = new SignalsModel;
        $query->where("week",date("W"));
        $arv["orders"] = $query->countAllResults();
        return (object)$arv;
    }
    public function createRow($data=[]){
        if($this->mutilanguage != false){
            $data["language"] = $this->mutilanguage;
        }
        $data["opendate"] = date("Y-m-d h:i:s");
        if($data && $this->insert($data)){
            //if($data["is_free"] == "yes"){
            $this->alertSocket("open",$data);
            $this->sendTelegram($data,"create");
            //}
            session()->setFlashdata("confirm",lang("globals.insert_confirm"));
            return $this->getID();
        }else{
            session()->setFlashdata("errors",lang("globals.insert_error"));
            return 0;
        }
    }

    public function updateRow($id, $data=[]){
        if($this->mutilanguage != false){
            $this->where("language",$this->mutilanguage);
        }

        $data["opendate"] = date("Y-m-d h:i:s");

        if($data && $this->update($id,$data)){
            //if($data["is_free"] == "yes"){
            $this->alertSocket("update",$data);
            $this->sendTelegram($data,"update");
            //}
            session()->setFlashdata("confirm",lang("globals.update_confirm"));
            return $id;
        }else{
            session()->setFlashdata("errors",lang("globals.update_error"));
            return $id;
        }
    }

    public function updateRowTicket($ticket, $data=[]){
        

        $read = $this->where("ticket",$ticket)->first();
        $teleAray = array_merge((array)$read,$data);

        if($read && $this->update($read->id,$data)){
            //if($data["is_free"] == "yes"){
            $this->alertSocket("update",(array)$read);
            $this->sendTelegram($teleAray,"update");
            //}
            session()->setFlashdata("confirm",lang("globals.update_confirm"));
            return $ticket;
        }else{
            session()->setFlashdata("errors",lang("globals.update_error"));
            return $ticket;
        }
    }

    public function closeRowTicket($ticket, $data=[],$targetby="close"){
        $read = $this->where("ticket",$ticket)->first();
        $teleAray = array_merge((array)$read,$data);

        if($read && $this->update($read->id,$data)){
            //if($data["is_free"] == "yes"){
            $this->alertSocket("close",(array)$read);
            $this->sendTelegram($teleAray,"close",$targetby);
            //}
            session()->setFlashdata("confirm",lang("globals.update_confirm"));
            return $ticket;
        }else{
            session()->setFlashdata("errors",lang("globals.update_error"));
            return $ticket;
        }
    }

    public function removeRow($id){
        if($this->delete($id)){

            session()->setFlashdata("confirm",lang("globals.delete_confirm"));
            return $id;
        }else{
            session()->setFlashdata("errors",lang("globals.delete_error"));
            return $id;
        }
    }


    private function sendTelegram($data,$type, $targetby="close"){
        $token = "1279919331:AAFW68mtfiC1niRGpZPgsa7YHH4RIE2yIB4";
        $channel = "@smartiqx";

        $msg =  "============================\n";
        if($type == "update"){
        $msg .= $data["symbol"]." - ".$data["type"]." [UPDATE]\n";
        }else{
        $msg .= $data["symbol"]." - ".$data["type"]." [NEW]\n";
        }
        if($data["is_free"] == "yes"){
            $msg .=  "Open : ".$data["open"]."\n";
            $msg .=  "SL   : ".$data["sl"]."\n";
            $msg .=  "TP   : ".$data["tp1"]."\n";
        }

        if($type == "close"){
            $msg =  "============================\n";
            if($targetby == "close"){
                $msg .= $data["symbol"]." - ".$data["type"]." [CLOSE]\n";
            }
            if($targetby == "sl"){
                $msg .= $data["symbol"]." - ".$data["type"]." [HIT SL]\n";
            }
            if($targetby == "tp"){
                $msg .= $data["symbol"]." - ".$data["type"]." [HIT TP]\n";
            }
            $msg .=  "Open : ".$data["open"]."\n";
            $msg .=  "SL   : ".$data["sl"]."\n";
            $msg .=  "TP   : ".$data["tp1"].($data["tp2"] ? "|".$data["tp2"] : "").($data["tp3"] ? "|".$data["tp3"] : "")."\n";
            $msg .=  "Profit : ".$data["profits"]." pip(s)\n";
        }

        $msg .=  "Full Signal : https://vsmart.ltd/trader\n";
        $msg .=  "===========================\n";

        $url = "https://api.telegram.org/bot" . $token . "/sendMessage?chat_id=" . $channel;
        $url = $url . "&text=" . urlencode($msg);
        $ch = curl_init();
        $optArray = array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
        );
        curl_setopt_array($ch, $optArray); 
        $result = curl_exec($ch);
        curl_close($ch);

    }

    private function alertSocket($ivent, $arvs=[]){
        $arv = [];
        if($ivent == "open"){
            $arv = [
                "username" => "SmartFX",
                "channel" => "main",
                "orderid" => "0",
                "symbol" => $arvs["symbol"],
                "type" => $arvs["type"], 
                "openprice" => $arvs["open"],
                "stoploss" => "0", 
                "takeprofit" => "0", 
                "opentime" => "0", 
                "exittime" => "0"
            ];
        }
        if($ivent == "close"){
            $arv = [
                "username" => "SmartFX",
                "channel" => "main",
                "orderid" => "0",
                "symbol" => $arvs["symbol"],
                "type" => $arvs["type"], 
                "price" => $arvs["close"],
                "pips" => $arvs["profits"], 
                "closetime" => "0"
            ];
        }
        $client = new \App\Libraries\SocketIO();
        $client->send("127.0.0.1",9000,$ivent,json_encode($arv));
    }

}
