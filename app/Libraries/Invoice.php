<?php
namespace App\Libraries;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class Invoice extends Model{
	protected $table      = 'users_invoices';
    protected $primaryKey = 'id';
    protected $returnType     = 'object';
    protected $allowedFields = [
            "user_id","invoice_id","payment_id","type","status","amount","items","created_at","updated_at"
    ];


    public function create(){
    	$arv = [];
    	$this->insert($arv);
    }
}
?>