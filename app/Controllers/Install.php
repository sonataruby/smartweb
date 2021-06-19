<?php
namespace App\Controllers;
use App\Libraries\Users;
class Install extends BaseController
{
	public function index()
	{
		helper(["form"]);
		$server = $this->request->getVar("server");
		$databasename = $this->request->getVar("databasename");
		$databaseuser = $this->request->getVar("databaseuser");
		$databasepassword = $this->request->getVar("databasepassword");
		$adminemail = $this->request->getVar("adminemail");
		$adminpassword = $this->request->getVar("adminpassword");

		if($server){
			$getenv = file_get_contents(FCPATH . "env");

			

			$getenv = str_replace([
				"# CI_ENVIRONMENT = production",
				"# database.default.hostname = localhost",
				"# database.default.database = smart_token",
				"# database.default.username = root",
				"# database.default.password = root",
				"# database.default.DBDriver = MySQLi",
				"# database.default.DBPrefix ="
			],[
				"CI_ENVIRONMENT = production\nINSTALL=true",
				"database.default.hostname = localhost",
				"database.default.database = ".$databasename,
				"database.default.username = ".$databaseuser,
				"database.default.password = ".$databasepassword,
				"database.default.DBDriver = MySQLi",
				"database.default.DBPrefix ="
			],$getenv);
			file_put_contents(FCPATH.".env",$getenv);


			//$db = \Config\Database::connect(["username" => $databaseuser, "password" => $databasepassword, "database" => $databasename]);
			$db = new \mysqli("localhost",$databaseuser,$databasepassword,$databasename);
			$templine = '';
		    // Read in entire file
		    $query = file(APPPATH."Database/install.sql");
		    foreach ($query as $line)
			{
			    if (substr($line, 0, 2) == '--' || $line == '')//This IF Remove Comment Inside SQL FILE
			    {
			        continue;
			    }
			    $op_data .= $line;
			    if (substr(trim($line), -1, 1) == ';')//Breack Line Upto ';' NEW QUERY
			    {
			        $db->query($op_data);
			        $op_data = '';
			    }
			}
		    //$db->query($query);
		    //Create User 
		    $hash = new Users;
			$createMemberSQL = "INSERT INTO users SET `email` = '".$adminemail."', `password` = '".$hash->hash($adminpassword)."', `email_status` = '1'";
			$db->query($createMemberSQL);
		}
	}
}
