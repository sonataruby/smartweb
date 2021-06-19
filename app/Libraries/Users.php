<?php
namespace App\Libraries;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
use App\Libraries\Jsontoken;
class Users {
	protected $db;
    protected $tb_user = "users";
    protected $request;
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->session = session();
        
    }

    /*
	Descript
    */
    public function validate_password($password){
    	return ucfirst($password);
    }

    private function validate_email($email){
    	return strtolower($email);
    }

    private function password_verify( $str, $hash )
	{
		return password_verify( $str, $hash );
	}

	public function hash( $str, $algo = PASSWORD_DEFAULT, $cost = 12 )
	{
		return password_hash( $str, $algo, ['cost' => $cost] );
	}


	/*
	Create User
	*/

	public function login(){

	}

	public function register($email, $password, $autologin=true){
    	$password = $this->validate_password($password);
    	$email = $this->validate_email($email);
    	$data = $this->getDataByEmail($email);
    	if(!$data){
    		$this->db->query("INSERT INTO {$this->tb_user} SET `email` = '".$email."', `password` = '".$this->hash($password)."', `email_status` = '1'");
    		if($autologin) return $this->login($email, $password);
    	}
    	return false;
    }


    private function getDataByEmail($email){
    	//print_r("SELECT * FROM {$this->tb_user} WHERE `email`='".$email."' ORDER BY id LIMIT 1");exit();
    	
    	$data = $this->db->query("SELECT * FROM {$this->tb_user} WHERE `email`='".$email."' ORDER BY id LIMIT 1")->getRow();

    	return $data;
    }

    public function getIDByEmail($email){
        //print_r("SELECT * FROM {$this->tb_account} WHERE `email`='".$email."' ORDER BY account_id LIMIT 1");exit();
        
        $data = $this->db->query("SELECT * FROM {$this->tb_user} WHERE `email`='".$email."' ORDER BY id LIMIT 1")->getRow();

        return $data->id > 0 ? $data->id : 0;
    }

}