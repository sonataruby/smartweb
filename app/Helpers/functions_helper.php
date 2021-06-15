<?php
if(!function_exists("admin_url")){
	function admin_url($path=""){
		return base_url("admin/{$path}");
	}
}


if(!function_exists("nav_menu")){
	function nav_menu($key="", $parent=0){
		$db = \Config\Database::connect();
		$query = $db->query("SELECT * FROM menu where status='1' AND  display='".$key."' AND parent='".$parent."' ORDER BY short ASC")->getResult();
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
		$query = $db->query("SELECT * FROM windget where language='".session()->get("lang")."' AND  display='".$display."' AND format='".$format."' ORDER BY short ASC")->getResult();
		if($format == "html"){
			$html = [];
			foreach($query as $k => $v){
				$html[] = $v->contents;
			}
			return implode($html, "\n");
		}


	}
}

if(!function_exists("nav_language")){
	function nav_language(){
		$arv = ["en" => "English", "vn" => "Vietnam"];
		foreach ($arv as $key => $value) {
			echo '<li><a href="#">'.$value.'</a></li> ';
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