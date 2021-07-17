<?php
namespace App\Controllers\Admin;
use App\Models\MenuModel;
use App\Models\WidgetModel;
use App\Libraries\Breadcrumb;
//==================================================
// Name : File Manager App
// Version : 0.1.1
// Smart Blockchain 
// Builder : v1.22.17
// Date : {date}
// Author : VO VAN KHOA
// Website : https://expressiq.co
// Update : https://expressiq.co/update?app=Menu
//==================================================
class Upload extends AdminController
{
	public function index(){
		helper(['filesystem']);
		$this->data["url_view"] = "/uploads/";
		if($this->request->getVar("path") == "templates"){
            $dir = FCPATH . "templates/assets/images";
            $url = "/templates/assets/images/";
            if(is_dir(FCPATH . "templates/themes/".getenv("templates")."/assets/images")){
                $dir = FCPATH . "templates/themes/".getenv("templates")."/assets/images";
                $url = "/templates/themes/".getenv("templates")."/assets/images/";
            }
			$path = directory_map($dir, TRUE, FALSE);
			$this->data["url_view"] = $url;
		}else{
			$path = directory_map(FCPATH . "uploads", TRUE, FALSE);
		}
		$this->data["files"] = $path;
	}

	public function info(){
		$url = $this->request->getVar("url");
		$arv = [];
		$info = \Config\Services::image()
            ->withFile(FCPATH.$url)
            ->getFile()
            ->getProperties(true);

		$arv["name"] = $url;
		$arv["width"] = $info['width'];
		$arv["height"] = $info['height'];
		echo json_encode($arv);
		exit();
	}

	public function images(){
		helper(['form', 'url']);

         

        $validated = $this->validate([

            'file' => [

                'uploaded[file]',

                'mime_in[file,image/jpg,image/jpeg,image/gif,image/png]',

                'max_size[file,4096]',

            ],

        ]);

 

       $data = [];
        

        if ($validated) {

            $avatar = $this->request->getFile('file');
            $name = basename($this->request->getVar("name"));
            $size = $this->request->getVar("size");
            if($name == "" || strpos($this->request->getVar("name"),"uploads")){
            	$path = "uploads";
            	if($name == "") {
            		$name = $avatar->getRandomName().".".$avatar->getClientExtension();
            	}
            }else{
            	$path = "templates/assets/images";

            }

            

            if(file_exists(FCPATH . $path.'/'.$name)){
                @unlink(FCPATH . $path.'/'.$name);
            }
            $avatar->move(FCPATH . $path,$name);

            if($size){
                list($w,$h) = explode("x",$size);
                if($w > 0 || $h > 0){
                    $image = \Config\Services::image()
                        ->withFile(FCPATH . $path.'/'.$name)
                        ->fit($w, $h, 'center')
                        ->save(FCPATH . $path.'/'.$name);
                }
            }

          $data = [

            'name' =>  $avatar->getClientName(),
            'url' =>  "/".$path."/".$name,

            'type'  => $avatar->getClientMimeType()

          ];
       
        }

        echo json_encode($data);

        exit();
	}
}