<?php
namespace App\Controllers;
use App\Models\PostsModel;
use App\Libraries\Breadcrumb;
class Posts extends BaseController
{
	public function index()
	{
		$post = new PostsModel;
		$this->data["posts"] = $post->getItems();
		$this->layout = "layout/blog";
		$this->view = "pages/posts";
	}

	public function info($id="")
	{
		
		$post = new PostsModel;
		$this->data["posts"] = $post->getItem($id);
		$this->setSEO(["title" => $this->data["posts"]->title, "image" => $this->data["posts"]->image]);
		$this->layout = "layout/blog";
		$this->view = "pages/posts-info";
	}

}