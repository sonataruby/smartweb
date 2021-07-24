<?php
namespace App\Libraries;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
use App\Libraries\Jsontoken;
use App\Libraries\Bcrypt;
use App\Libraries\Users;
class UsersRelaytion extends Model{
	//protected $db;
   
    protected $table      = 'users_relaytionship';
    protected $primaryKey = 'id';
    protected $returnType     = 'object';
    protected $allowedFields = ["intivite_id","intivite_code","account_id","created_at"];
    protected $request;
    public function __construct()
    {
        //$this->db = \Config\Database::connect();
        $this->session = session();
        parent::__construct();
        
    }

    public function getRelaytion($intivite_id){
        $this->select("users_relaytionship.*, users.id, users.email, users.firstname, users.lastname");
        $this->where("users_relaytionship.intivite_id",$intivite_id);
        $this->join('users', 'users.id = users_relaytionship.account_id', 'left');
        return $this->findAll();
    }


    private function checkReadyRealay($account_id){
        $this->where("account_id",$account_id);
        return $this->countAll();
    }

    
    public function addRelaytion($intivite_id,$code,$account_id){
        $arv = [
            "intivite_id" => $intivite_id,
            "intivite_code" => $code,
            "account_id" => $account_id
        ];

        if($this->checkReadyRealay($account_id) == 0) $this->insert($arv);
    }
}