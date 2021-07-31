<?php
namespace App\Controllers;
use App\Models\PagesModel;
use App\Libraries\Breadcrumb;
class Pages extends BaseController
{
	public function index($id)
	{
		$post = new PagesModel;
		$this->data["page"] = $post->getItem($id);
		$this->setSEO(["title" => $this->data["pages"]->title, "image" => $this->data["pages"]->image]);
		$this->layout = "layout/blog";
		$this->view = "pages/page";
	}

}