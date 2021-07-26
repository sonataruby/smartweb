<?php

namespace App\Controllers;
use App\Libraries\Users;
class Account extends BaseController
{
	public function index()
	{
		//return $this->view = 'home/index';
	}

	public function login(){
		
		$this->layout = "layout/nolayout";
		if($this->request->getVar("email")){
			$this->user = new Users();
			$info = $this->user->login($this->request->getVar("email"), $this->request->getVar("password"));
			if(is_string($info)) {
				$this->session->setFlashdata("confirm",lang("users.login_ok"));
				session()->set(["token" => $info]);
			}
			$pre_link = str_replace(base_url(),"",previous_url());
			$pre = ($pre_link == "/account/login" ? "/cpanel" : previous_url());
			if($this->request->getVar("return")){
				$pre = $this->request->getVar("return");
			}

			//Error password
			if($info == 1){
				$this->session->setFlashdata("errors",lang("users.error_password"));
				$pre = "/account/login";
			}

			//Email Not validate
			if($info == 2){
				$this->session->setFlashdata("errors",lang("users.error_emailactive"));
				$pre = "/account/login";
			}

			//Account Banner
			if($info == 3){
				$this->session->setFlashdata("errors",lang("users.error_account_banner"));
				$pre = "/account/login";
			}

			//print_r($this->user->getSession());
			return redirect()->to($pre);
		}
	}

	public function register(){
		$this->layout = "layout/nolayout";
		$repass = $this->request->getVar("repassword");
		$password = $this->request->getVar("password");
		$email = $this->request->getVar("email");
		$username = $this->request->getVar("username");
		$firstname = $this->request->getVar("firstname");
		$lastname = $this->request->getVar("lastname");

		if($email && $password){
			$this->user = new Users();
			$info = $this->user->register($email, $password,$username,$firstname,$lastname);
			session()->set(["token" => $info]);
			$pre_link = str_replace(base_url(),"",previous_url());
			$pre = ($pre_link == "/account/register" ? "/account/login" : previous_url());
			if($this->request->getVar("return")){
				$pre = $this->request->getVar("return");
			}
			return redirect()->to($pre);
		}
	}

	public function reset(){
		$this->layout = "layout/nolayout";
	}

	
	public function intivite($code = ""){
		if($code != ""){
			session()->set(["intivite" => $code]);
		}
		//print_r(session()->get("intivite"));
		return redirect()->to("/account/register");
	}

	public function logout(){
		session_destroy();
		return redirect()->to("/");
	}

	public function google(){
		
		$get = $this->request->getGet();
		require_once APPPATH . "ThirdParty/google/vendor/autoload.php";
		
		$provider = new \League\OAuth2\Client\Provider\Google([
			'clientId' => $this->settings->google_client_id,
			'clientSecret' => $this->settings->google_secret,
			'redirectUri' => base_url("account/google")
		]);
		//$provider->setAccessType("offline");

		//$provider->setAccessType("refresh_token");
		
		if (!empty($get['error'])) {
			
			// Got an error, probably user denied access
			exit('Got error: ' . htmlspecialchars($get['error'], ENT_QUOTES, 'UTF-8'));
		} elseif (empty($get['code'])) {
			
			// If we don't have an authorization code then get one
			$authUrl = $provider->getAuthorizationUrl();
			//$_SESSION['oauth2state'] = $provider->getState();
			session()->setTempdata(["oauth2state" => $provider->getState()]);

			//$this->session->set_userdata('g_login_referrer', $this->agent->referrer());
			header('Location: ' . $authUrl);
			exit();

		} elseif (empty($get['state']) || ($get['state'] !== session()->getTempdata('oauth2state'))) {
			// State is invalid, possible CSRF attack in progress
			
			session()->removeTempdata("oauth2state");
			//@unset($_SESSION['oauth2state']);
			
			exit('Invalid state');
		} else {
			
			// Try to get an access token (using the authorization code grant)
			
			$token = $provider->getAccessToken('authorization_code', [
				'code' => $get['code']
			]);
			
			// Optional: Now you have a token you can look up a users profile data
			try {
				// We got an access token, let's now get the owner details
				$user = $provider->getResourceOwner($token);

				$g_user = new \stdClass();
				$g_user->id = $user->getId();
				$g_user->email = $user->getEmail();
				$g_user->name = $user->getName();
				$g_user->avatar = $user->getAvatar();

				$this->user->login_with_google($g_user);

				return redirect()->to("/cpanel");

			} catch (Exception $e) {
				// Failed to get user details
				exit('Something went wrong: ' . $e->getMessage());
			}
		}

	}


	public function facebook(){

		$fb_url = "https://www.facebook.com/v3.3/dialog/oauth?client_id=" . $this->settings->facebook_app_id . "&redirect_uri=" . base_url("account/fbcallback") . "&scope=email&state=" . generate_unique_id();

		//$this->session->set_userdata('fb_login_referrer', $this->agent->referrer());
		return redirect()->to($fb_url);
		exit();
	}

	public function fbcallback(){
		$get = $this->request->getGet();
		require_once APPPATH . "ThirdParty/facebook/vendor/autoload.php";

		$fb = new \Facebook\Facebook([
			'app_id' => $this->settings->facebook_app_id,
			'app_secret' => $this->settings->facebook_secret,
			'default_graph_version' => 'v2.10',
		]);
		try {
			$helper = $fb->getRedirectLoginHelper();
			$permissions = ['email'];
			if (isset($get['state'])) {
				$helper->getPersistentDataHandler()->set('state', $get['state']);
			}
			$accessToken = $helper->getAccessToken();
			$response = $fb->get('/me?fields=name,email', $accessToken);
		} catch (\Facebook\Exceptions\FacebookResponseException $e) {
			// When Graph returns an error
			echo 'Graph returned an error: ' . $e->getMessage();
			exit;
		} catch (\Facebook\Exceptions\FacebookSDKException $e) {
			// When validation fails or other local issues
			echo 'Facebook SDK returned an error: ' . $e->getMessage();
			exit;
		}

		$user = $response->getGraphUser();
		$fb_user = new \stdClass();
		$fb_user->id = $user->getId();
		$fb_user->email = $user->getEmail();
		$fb_user->name = $user->getName();

		$this->user->login_with_facebook($fb_user);

		return redirect()->to("/cpanel");
	}


	public function permission(){
		$this->setSEO(["title" => "Permission"]);
	}
}
