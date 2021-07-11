<?php
namespace App\Libraries;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
use App\Libraries\Jsontoken;
use App\Libraries\Bcrypt;
class Users extends Model{
	//protected $db;
   
    protected $table      = 'users';
    protected $primaryKey = 'id';
    protected $returnType     = 'object';
    protected $allowedFields = ["username","slug","email","email_status","token","password","role","user_type","display_name","firstname","lastname","midname","facebook_id","google_id","avatar","banner_img","banned","phone_number","timezone","language","country_id","state_id","city_id","address","zip_code","show_email","show_phone","show_location","facebook_url","twitter_url","instagram_url","pinterest_url","linkedin_url","vk_url","youtube_url","last_seen","show_rss_feeds","intivited_code","created_at"];
    protected $request;
    public function __construct()
    {
        //$this->db = \Config\Database::connect();
        $this->session = session();
        parent::__construct();
        
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


    public function getOnline(){
        //last_seen
        return intval($this->where("last_seen >= NOW() - INTERVAL 10 MINUTE")->countAll());
    }

    public function getTotals(){
        return intval($this->countAll());
    }
    public function getOffline(){
        return $this->getTotals() - $this->getOnline();
    }

    public function update_last_seen($userid=0){
        if($userid > 0){
            $this->update($userid,['last_seen' => date("Y-m-d H:i:s")]);
        }
    }


	/*
	Create User
	*/

	public function login($email, $password){
        $password = $this->validate_password($password);
        $email = $this->validate_email($email);
        $data = $this->get_user_by_email($email);
        $bcrypt = new Bcrypt;
        if(empty($email) || empty($password)){
            return false;
        }
        //print_r($data);
        //$2a$08$oMp7xSKAlSNOpeLTs84cmetiDuNiULStoH8GuMls.6Z1Ujxoyueza
        $error = "";
        if(!is_null($data)){
            if (!$bcrypt->check_password($password, $data->password)) {
                $error = 1;
                return $error;
            }
            if ($data->email_status != 1) {
                $error = 2;
                return $error;
            }
            if ($data->banned == 1) {
                $error = 3;
                return $error;
            }
            if($error == ""){
                $this->setlogin($data);
                return $this->getToken();
            }
        }
        return false;
	}

    public function getToken(){
        $session = $this->getSession();
        if(intval($session->account_id) < 1) return false;
        $token = Jsontoken::encode($session,$this->device);
        return $token;
    }

    public function checkToken($tokencontent){

    }
    public function extractToken($tokencontent){
        
        $untoken = Jsontoken::decode($tokencontent,$this->device,["HS256"]);
        return $untoken;
    }


    public function getSession(){
        
        return (object)$this->session->get("userlogin");
    }

    private function hasLogin(){
        if($this->session->has("userlogin")) return true;
        return false;
    }

	public function register($email, $password, $username="",$autologin=true){
        $bcrypt = new Bcrypt;
        

        $password = $this->validate_password($password);
        $email = $this->validate_email($email);

        if(empty($email) || empty($password)){
            return false;
        }

        if(empty($username)){
            list($username) = explode('@', $email);
        }
        

        $arv = [];
        $arv['user_type'] = "registered";
        $arv["username"] = $this->generate_uniqe_username($username);
        $arv["slug"] = $this->generate_uniqe_slug($username);
        $arv['banned'] = 0;
        $arv['created_at'] = date('Y-m-d H:i:s');
        $arv['token'] = generate_token();
        $arv['email_status'] = 1;
        $arv['intivited_code'] = generate_short_unique_id();
        $arv["password"] = $bcrypt->hash_password($password);
    	$data = $this->get_user_by_email($email);

    	if(!$data){
    		if($this->insert($arv) !== false){
                if($autologin) return $this->login($email, $password);
            }
    		
    	}
    	return false;
    }


   

    

    private function setlogin($user){
        if(!$user) return false;
        $user_data = array(
            'user_id' => $user->id,
            'username' => $user->slug,
            'email' => $user->email,
            'role' => $user->role,
            'firstname' => $user->firstname,
            'lastname' => $user->lastname,
            'logged_in' => true,
            'display_name' => $user->display_name,
            'language' =>  $data->language,
            'timezone' =>  $data->timezone,
            'user_avatar' => $user->avatar
        );
        $this->update_last_seen($user->id);
        $this->session->set(["userlogin" => $user_data]);
    }


    public function get_user_by_email($email){
        return $this->where("email",$email)->first();
    }
    public function get_user_by_id($id){
        return $this->where("id",$id)->first();
    }

    public function get_user_by_username($username){
        return $this->where("username",$username)->first();
    }
    public function get_user_by_slug($slug){
        return $this->where("slug",$slug)->first();
    }


    //generate uniqe username
    public function generate_uniqe_username($username)
    {
        $new_username = $username;
        if (!empty($this->get_user_by_username($new_username))) {
            $new_username = $username . " 1";
            if (!empty($this->get_user_by_username($new_username))) {
                $new_username = $username . " 2";
                if (!empty($this->get_user_by_username($new_username))) {
                    $new_username = $username . " 3";
                    if (!empty($this->get_user_by_username($new_username))) {
                        $new_username = $username . "-" . uniqid();
                    }
                }
            }
        }
        return $new_username;
    }

    //generate uniqe slug
    public function generate_uniqe_slug($username)
    {
        
        $slug = str_slug($username);
        if (!empty($this->get_user_by_slug($slug))) {
            $slug = str_slug($username . "-1");
            if (!empty($this->get_user_by_slug($slug))) {
                $slug = str_slug($username . "-2");
                if (!empty($this->get_user_by_slug($slug))) {
                    $slug = str_slug($username . "-3");
                    if (!empty($this->get_user_by_slug($slug))) {
                        $slug = str_slug($username . "-" . uniqid());
                    }
                }
            }
        }
        return $slug;
    }


    //login with google
    public function login_with_google($g_user)
    {
        if (!empty($g_user)) {
            $user = $this->get_user_by_email($g_user->email);
            //check if user registered
            if (empty($user)) {
                if (empty($g_user->name)) {
                    $g_user->name = "user-" . uniqid();
                }
                $username = $this->generate_uniqe_username($g_user->name);
                $slug = $this->generate_uniqe_slug($username);
                //add user to database
                $data = array(
                    'google_id' => $g_user->id,
                    'email' => $g_user->email,
                    'email_status' => 1,
                    'token' => generate_unique_id(),
                    'username' => $username,
                    'slug' => $slug,
                    'avatar' => $g_user->avatar,
                    'user_type' => "google",
                    'created_at' => date('Y-m-d H:i:s')
                );
                if (!empty($data['email'])) {
                    $this->insert($data);
                    $user = $this->get_user_by_email($g_user->email);
                    $this->setlogin($user);
                }
            } else {
                //login
                $this->setlogin($user);
            }
        }
    }




    //login with facebook
    public function login_with_facebook($fb_user)
    {
        if (!empty($fb_user)) {
            $user = $this->get_user_by_email($fb_user->email);
            //check if user registered
            if (empty($user)) {
                if (empty($fb_user->name)) {
                    $fb_user->name = "user-" . uniqid();
                }
                $username = $this->generate_uniqe_username($fb_user->name);
                $slug = $this->generate_uniqe_slug($username);
                //add user to database
                $data = array(
                    'facebook_id' => $fb_user->id,
                    'email' => $fb_user->email,
                    'email_status' => 1,
                    'token' => generate_token(),
                    'username' => $username,
                    'slug' => $slug,
                    'avatar' => "https://graph.facebook.com/" . $fb_user->id . "/picture?type=large",
                    'user_type' => "facebook",
                    'created_at' => date('Y-m-d H:i:s')
                );
                if (!empty($data['email'])) {
                    $this->insert($data);
                    $user = $this->get_user_by_email($fb_user->email);
                    $this->setlogin($user);
                }
            } else {
                //login
                $this->setlogin($user);
            }
        }
    }


}