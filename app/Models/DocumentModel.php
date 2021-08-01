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
class DocumentModel extends BaseModel
{
    // ...
    protected $table      = 'document';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'object';
    protected $useSoftDeletes = false;

    protected $allowedFields = ["language","title","image","contents_highlight","contents","tags"];

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
    private $mutilanguage = true;
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
            $this->orderBy($request->getVar("short"), $request->getVar("des") == "asc" ? 'ASC' : 'DESC');
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
        $language = \Config\Services::language();
$this->mutilanguage = $language->getLocale();
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
        $query = new DocumentModel;
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


    public function createRow($data=[]){
        if($this->mutilanguage != false){
            $data["language"] = $this->mutilanguage;
        }

        if($data && $this->insert($data)){
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

        if($data && $this->update($id,$data)){
            session()->setFlashdata("confirm",lang("globals.update_confirm"));
            return $id;
        }else{
            session()->setFlashdata("errors",lang("globals.update_error"));
            return $id;
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

}
