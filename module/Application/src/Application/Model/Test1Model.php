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
}
