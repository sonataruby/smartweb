<?php
namespace App\Controllers\Admin;
//use App\Controllers\Admin\AdminController
class Templates extends AdminController
{
	private $server = "https://expressiq.co/service/templates";
	//private $server = "http://token.ico/service/templates";
	public function index(){

		$getdata = file_get_contents($this->server."?domain=".base_url());
		
		$app  = json_decode($getdata);
		$this->data["local"]  = $this->getTemplateItems();
		$arvApp = [];
		foreach ($app as $key => $value) {
			if(!in_array($value->name,$this->data["local"])){
				$arvApp[] = $value;
			}
		}
		$this->data["app"] = $arvApp;
	}

	public function getTemplateItems(){
		helper(['filesystem']);

		$path = directory_map(FCPATH . "templates/themes", TRUE, FALSE);
		$arv = [];
		foreach ($path as $key => $value) {
			if(file_exists(FCPATH . "templates/themes/".$value."/info.json")){
				$arv[] = str_replace('/','',$value);
			}
		}
		
		return $arv;
		
	}

	public function install($theme=""){
		if($this->request->getVar("validate") == "true"){
			putenv('templates='.$theme);
		}
		$this->data["install_url"] = "admin/templates/install/".$theme;
		$this->data["info"] = json_decode(file_get_contents(FCPATH . "templates/themes/".$theme."/info.json"));

	}

	public function download($name){
		$getdata = file_get_contents($this->server."?name={$name}|download|".base_url());

		$extract = json_decode($getdata);
		
		$sname = $extract->name;
		$img = FCPATH . "/templates/themes/{$sname}/assets/images";
		$css = FCPATH . "/templates/themes/{$sname}/assets/css";
		$js = FCPATH . "/templates/themes/{$sname}/assets/js";
		$layout = FCPATH . "/templates/themes/{$sname}/layout";
		$root = FCPATH . "templates/themes/".$sname;
		if($sname){
			if(!is_dir($root)) mkdir($root,0777,true);
			if(!is_dir($img)) mkdir($img,0777,true);
			if(!is_dir($css)) mkdir($css,0777,true);
			if(!is_dir($js)) mkdir($js,0777,true);
			if(!is_dir($layout)) mkdir($layout,0777,true);
			foreach ($extract->file as $key => $value) {
				file_put_contents(FCPATH . "templates/themes/".$sname."/".$value, file_get_contents("https://expressiq.co/service/sendfile?file=".$sname."/".$value));
			}
		}
	}


	public function develop(){
		helper(['filesystem','html']);
		if($this->request->getVar("code") && $this->request->getVar("file")){
			$filename = FCPATH . "templates/".$this->request->getVar("file");
			file_put_contents($filename, $this->request->getVar("code"));
			 session()->setFlashdata("confirm",lang("globals.update_confirm"));
			 return redirect()->to("/admin/templates/develop?file=".$this->request->getVar("file"));
		}
		$path = directory_map(FCPATH . "templates/", false, FALSE);
		$this->data["file"] = $path;
	}
}