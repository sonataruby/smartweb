<?php
namespace App\Controllers\Admin;
use App\Models\DocumentModel;
use App\Libraries\Breadcrumb;
//==================================================
// Name : Document App
// Version : 0.1.1
// Smart Blockchain 
// Builder : v1.22.17
// Date : {date}
// Author : VO VAN KHOA
// Website : https://expressiq.co
// Update : https://expressiq.co/update?app=Document
//==================================================
class Document extends AdminController
{
	private $page = 1;
	private $per_page = 20;
	private $model;
	private $link = "/admin/document";
	private $breadcrumb = "";
	
	function __construct()
	{
		
		$this->model = new DocumentModel();
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
		$this->breadcrumb->add(lang('document.modules'), $this->link);
		$this->breadcrumb->add(lang('document.title'), '/index');
		$this->data['breadcrumbs'] = $this->breadcrumb->render();

	}

	
	
	//Function Create Edit
	public function create($id=false){
		$this->breadcrumb->add('Dashboard', '/admin');
		$this->breadcrumb->add(lang('document.modules'), $this->link);
		$this->breadcrumb->add(lang('document.create'), '/index');
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


	
}
?>