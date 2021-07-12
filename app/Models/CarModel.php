<?php
namespace App\Models;
use CodeIgniter\Model;
class CarModel extends Model{
	protected $table = 'cars';
	protected $primaryKey = 'carid';
	protected $allowedFields=['model', 'company', 'type', 'fuel', 'warranty','slug'];
	public function getCars($carid = NULL)
	{
	    if ($carid === NULL)
	    {
	        return $this->findAll();
	    }

	    return $this->asArray()
	                ->where(['carid' => $carid])
	                ->first();
	}

}