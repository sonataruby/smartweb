<?php
namespace App\Controllers\Admin;
use App\Models\SettingsModel;
use App\Libraries\Breadcrumb;
use App\Libraries\Migration;
//==================================================
// Name : Settings App
// Version : 0.1.1
// Smart Blockchain 
// Builder : v1.22.17
// Date : {date}
// Author : VO VAN KHOA
// Website : https://expressiq.co
// Update : https://expressiq.co/update?app=Settings
//==================================================
class Settings extends AdminController
{
	private $page = 1;
	private $per_page = 100;
	private $model;
	private $link = "/admin/settings";
	private $breadcrumb = "";
	
	function __construct()
	{
		$this->_permission();
		helper(['form', 'url']);
		$this->model = new SettingsModel();
		$this->breadcrumb = new Breadcrumb();
		$this->data["link"] = $this->link;
		$this->data["linkcache"] = $this->link;
		
	}

	//Function Dashboard
	public function index(){
		
		$search = $this->request->getVar("search");
		$math = [];
		$math2 = [];
		if(trim($search)) {
			$this->model->setSearch(["email","username","slug"],$search);
			$math["search"] = $search;
			$math2["search"] = $search;
		}
		if($this->request->getVar("page")){
			$math["page"] = $this->request->getVar("page");
			$math2["page"] = $this->request->getVar("page");
		}
		if($this->request->getVar("des") != ""){
			$math["des"] = $this->request->getVar("des");
		}
		if($this->request->getVar("short")){
			$math2["short"] = $this->request->getVar("short");
		}
		$math["short"] = "";
		$math2["des"] = "";

		$this->data["linkcache"] = $this->link."?".http_build_query($math);
		$this->data["linkcache2"] = $this->link."?".http_build_query($math2);

		$this->data["data"] = $this->model->getItems();

		$this->data["action"] = "list";
		$this->breadcrumb->add('Dashboard', '/admin');
		$this->breadcrumb->add(lang('settings.modules'), $this->link);
		$this->breadcrumb->add(lang('settings.title'), '/index');
		$this->data['breadcrumbs'] = $this->breadcrumb->render();

	}

	
	
	//Function Create Edit
	public function create($id=false){
		$this->breadcrumb->add('Dashboard', '/admin');
		$this->breadcrumb->add(lang('settings.modules'), $this->link);
		$this->breadcrumb->add(lang('settings.create'), '/index');
		$this->data['breadcrumbs'] = $this->breadcrumb->render();
		$this->data["action"] = "create";
		$this->data["item"] = $this->model->getItem($id);
		if($this->request->getVar("post")){
			if($id !== false) $this->model->updateRow($id,$this->request->getVar("post"));
			if($id == false) $this->model->createRow($this->request->getVar("post"));
			return redirect()->to($this->link);
			
		}
		
		
	}


	//Function Delete 
	public function delete($id){
		if($id > 0){
			$this->model->removeRow($id);
			
		}
		return redirect()->to($this->link);
	}


	

	//Function Permission

	public function backup(){
		$data = new Migration;
		$data->generate("*");
	}


	public function language($lang="en"){

		
		$file = glob(APPPATH . "Language/".$lang."/*.php");
		$this->data["file"] = $file;
		$this->data["langmode"] = [];
		$reFile = $this->request->getVar('file');
		$this->data["active"] = $lang;
		if($reFile != "" && file_exists(APPPATH . "Language/".$lang."/".$reFile)){
			$getInfo = require APPPATH . "Language/".$lang."/".$reFile;
			$this->data["langmode"] = $getInfo;
		}
		
		if($this->request->getVar("lang")){
			$arv = [];
			
			
			foreach ($this->request->getVar("lang") as $key => $value) {
				$arv[] = '"'.$key.'" => "'.$value.'"';
			}
			

			file_put_contents(APPPATH . "Language/".$lang."/".$_GET['file'],'<?php'."\n return [\n".implode($arv, ",\n")."\n];\n".'?>');
			session()->setFlashdata("confirm",lang("globals.update_confirm"));
			return redirect()->to("/admin/settings/language/".$lang."?file=".$_GET['file']);
		}

		
	}

	public function makelang($dir){
		if(!is_dir(APPPATH . "Language/".$dir)){
			mkdir(APPPATH . "Language/".$dir,0777,true);
		}

		$file = glob(APPPATH . "Language/en/*.php");

		foreach ($file as $key => $value) {
			copy($value, APPPATH . "Language/".$dir."/".basename($value));
		}
		session()->setFlashdata("confirm",lang("globals.update_confirm"));
		return redirect()->to("/admin/settings/language/".$dir);

	}

	
}
?>