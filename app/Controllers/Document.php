<?php
namespace App\Controllers;
use App\Models\DocumentModel;
use App\Libraries\Breadcrumb;
class Document extends BaseController
{
	public function index()
	{
		$post = new DocumentModel;
		$this->data["docs"] = $post->getItems();
		$this->data["listdoc"] = $post->getItems();
		$this->setSEO(["title" => "Document"]);
		$this->layout = "layout/docs";
		$this->view = "pages/document";
	}

	public function info($id){
		$post = new DocumentModel;
		$this->data["docs"] = $post->getItem($id);
		$this->setSEO(["title" => $this->data["docs"]->title, "image" => $this->data["docs"]->image]);
		$this->data["listdoc"] = $post->getItems();
		$this->layout = "layout/docs";
		$this->view = "pages/document-info";
	}
	
}