<?php
if(!function_exists("admin_url")){
	function admin_url($path=""){
		return base_url("admin/{$path}");
	}
}


if(!function_exists("nav_menu")){
	function nav_menu($key="", $parent=0){
		$db = \Config\Database::connect();
		$query = $db->query("SELECT * FROM menu where language='".service('request')->getLocale()."' AND status='1' AND  display='".$key."' AND parent='".$parent."' ORDER BY short ASC")->getResult();
		$html = [];
		foreach($query as $k => $v){
			$html[] = '<li class="menu-item"><a class="menu-link nav-link" href="'.$v->router.'">'.$v->name.'</a></li>';
		}
		return implode($html, "\n");
	}
}

if(!function_exists("widgets")){
	function widgets($display="", $format="html"){
		$db = \Config\Database::connect();
		$query = $db->query("SELECT * FROM windget where language='".service('request')->getLocale()."' AND  display='".$display."' AND format='".$format."' ORDER BY short ASC")->getResult();
		if($format == "html"){
			$html = [];
			foreach($query as $k => $v){
				$html[] = trim($v->contents);
			}
			return implode($html, "\n");
		}


	}
}

if(!function_exists("nav_language")){
	function nav_language($arv=["en" => "English"]){
		
		foreach ($arv as $key => $value) {
			echo '<li><a href="?language='.$key.'">'.$value.'</a></li> ';
		}
	}
}

if(!function_exists("oncepage")){
	function oncepage($parent=0){
		$db = \Config\Database::connect();
		$query = $db->query("SELECT * FROM menu where status='1' AND  oncepage='1' AND parent='".$parent."' ORDER BY main_short ASC")->getResult();
		$html = [];
		foreach($query as $k => $v){
			$html[] = $v->layout;
		}
		return implode($html, "\n");
	}
}


if(!function_exists("editer")){
	function editer($id=""){
		echo view("editer",["id" => $id]);
	}
	
}





//generate unique id
if (!function_exists('generate_unique_id')) {
	function generate_unique_id()
	{
		$id = uniqid("", TRUE);
		$id = str_replace(".", "-", $id);
		return $id . "-" . rand(10000000, 99999999);
	}
}

//generate short unique id
if (!function_exists('generate_short_unique_id')) {
	function generate_short_unique_id()
	{
		$id = uniqid("", TRUE);
		return str_replace(".", "-", $id);
	}
}
//generate order number
if (!function_exists('generate_transaction_number')) {
	function generate_transaction_number()
	{
		$transaction_number = uniqid("", TRUE);
		return str_replace(".", "-", $transaction_number);
	}
}

//generate token
if (!function_exists('generate_token')) {
	function generate_token()
	{
		$token = uniqid("", TRUE);
		$token = str_replace(".", "-", $token);
		return $token . "-" . rand(10000000, 99999999);
	}
}

//generate purchase code
if (!function_exists('generate_purchase_code')) {
	function generate_purchase_code()
	{
		$id = uniqid("", TRUE);
		$id = str_replace(".", "-", $id);
		$id .= "-" . rand(100000, 999999);
		$id .= "-" . rand(100000, 999999);
		return $id;
	}
}