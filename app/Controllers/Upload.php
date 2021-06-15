<?php 

namespace App\Controllers;

use CodeIgniter\Controller;


class Upload extends BaseController

{

   

     

    public function images()

    {  

 

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
            $name = $avatar->getRandomName().".".$avatar->getClientExtension();
            if($_GET["name"] != "") $name = $_GET["name"].".".$avatar->getClientExtension();
            if(file_exists(FCPATH . 'uploads/'.$name)){
                @unlink(FCPATH . 'uploads/'.$name);
            }
            $avatar->move(FCPATH . 'uploads',$name);

            if($this->request->getVar("size")){
                list($w,$h) = explode("x",$this->request->getVar("size"));
                if($w > 0 || $h > 0){
                    $image = \Config\Services::image()
                        ->withFile(FCPATH . 'uploads/'.$name)
                        ->fit($w, $h, 'center')
                        ->save(FCPATH . 'uploads/'.$name);
                }
            }

          $data = [

 

            'name' =>  $avatar->getClientName(),
            'url' =>  "/uploads/".$name,

            'type'  => $avatar->getClientMimeType()

          ];

 



       
        }

        echo json_encode($data);

        exit();

 

    }

}
?>