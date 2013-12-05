<?php
namespace Application\Model;

use Application\Model\AbstractModel;

class Test1Model extends AbstractModel
{
	public function modelTest()
	{
		$this->log("Log testing..");
		$this->log("Error log testing..", 'error');
		return("Model test");
	}
	
	public function getFromDbByKey($key)
	{
		$stmt = $this->dbCon->prepare("SELECT * FROM `testtbl` WHERE `k` = :key");
		$stmt->bindParam(':key', $key);
		$stmt->execute();
		$t = $stmt->fetchAll();
		
		if (isset($t[0]['v']))
		{
			return($t[0]['v']);
		}
		else
		{
			return "Can't find this value";
		}
	}
}
