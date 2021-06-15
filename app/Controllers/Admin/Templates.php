<?php
namespace App\Controllers\Admin;
//use App\Controllers\Admin\AdminController
class Templates extends AdminController
{
	public function index(){
		$this->data["app"]  = $this->getTemplateItems();
		
	}

	public function getTemplateItems(){
		helper(['filesystem']);
		$path = directory_map(FCPATH . "templates", TRUE, FALSE);
		$arv = [];
		foreach ($path as $key => $value) {
			if(is_dir(FCPATH . "templates/".$value)){
				$arv[] = $value;
			}
		}
		
		return $arv;
		
	}

	public function install($theme=""){
		$this->data["install_url"] = "/admin/templates/install/".$theme;
	}
}