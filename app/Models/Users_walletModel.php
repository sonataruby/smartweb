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
    // ...
    protected $table      = 'users_wallet';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'object';
    protected $useSoftDeletes = false;

    protected $allowedFields = ["user_id","wallet_address","wallet_network","created_at","wallet_money","balance"];

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

    function __construct()
    {
        if($this->mutilanguage == true){
            $this->setLanguage();
        }
        $this->user = new Users();
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




    public function checkWallet(){
        
        return $this->where("user_id",$this->user->getAccountID())->findAll();
    }

    public function getBalance($service){
        $data = $this->where(["user_id" => $this->user->getAccountID(),"wallet_network" => $service])->findAll();
        $money = 0;
        foreach ($data as $key => $value) {
            $money += $value->balance;
        }
        return $money;
    }


    public function setBalance($service, $remove){
        $data = $this->where(["user_id" => $this->user->getAccountID(),"wallet_network" => $service])->findAll();
       
        $miss = $remove;
        foreach ($data as $key => $value) {
            if($value->balance >= $remove && $miss > 0){
                $aod = new Users_walletModel;
                if($aod->update(["id" => $value->id,"user_id" => $value->user_id],["balance" => $value->balance - $remove])){
                    $miss = 0;
                    return true;
                }
            }
        }
        if($miss == 0) return true;
        return false;
    }
}
