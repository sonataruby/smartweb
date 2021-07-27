<?php
namespace App\Controllers;
use App\Models\DocumentModel;
use App\Libraries\Breadcrumb;
class Document extends BaseController
{
	public function index()
	{
		$post = new DocumentModel;
		$this->data["docs"] = $post->getItem($id);
		$this->layout = "layout/docs";
		$this->view = "pages/document";
	}
	
}