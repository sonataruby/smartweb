<?php
namespace App\Controllers\Admin;
//use App\Controllers\Admin\AdminController
class Application extends AdminController
{
	public function index(){
		$appModel = $this->getAppItems();
	}

	private function getAppItems(){
		$ingore = [
			"AdminController.php",
			"Build.php",
			"Dashboard.php",
			"Settings.php",
			"Users.php",
			"Application.php",
		];
		$variable = glob ( __DIR__ . "/*.php");
		$appList = [];
		foreach ($variable as $key => $value) {
			if(!in_array(basename($value),$ingore)){
				$data = explode("//==================================================",file_get_contents($value));
				$line = explode("\n",$data[1]);
				foreach ($line as $key2 => $value2) {
					list($k,$v) = explode(":", $value2);
					$k = str_replace("//","",$k);
					
					if(strpos($k,"Name") !== false){
						$ar = [];
						$ar["name"] = $v;
						$ar["path"] = basename($value);
						$ar["urladmin"] = "/admin/".str_replace(".php","",strtolower($ar["path"]));
						$appList[] = $ar;
					}
					
				}
			}
		}
		$this->data["app"] = $appList;
	}
}
