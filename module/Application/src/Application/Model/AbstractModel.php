<?php
namespace Application\Model;
use PDO;

abstract class AbstractModel 
{
	protected $config;
	protected $cwd;
	protected $dbCon;
	
    public function __construct()
    {
		$this->cwd = getcwd();
		$jsonDataArr = json_decode(file_get_contents('./config/data.json'));
		if ($jsonDataArr->ENV == 'DEVELOPMENT')
		{
			$this->config = $jsonDataArr->DEVELOPMENT;
		}
		elseif ($jsonDataArr->ENV == 'STAGING')
		{
			$this->config = $jsonDataArr->STAGING;
		}
		else
		{
			$this->config = $jsonDataArr->PRODUCTION;
		}
		
		switch ($this->config->db1->dbType)
		{
			case 'sqlite':
				try
				{
					$this->dbCon = new PDO('sqlite:' . getcwd() . '/' . $this->config->db1->dbFile);
					$this->dbCon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				}
				catch (Exception $ex)
				{
					print_r($ex);
					die('');
				}	
			break;
			case 'mysql':
				/**
				 * @ToDo
				 */
			break;
		}
    }
	
	protected function log($msg, $type = '')
	{
		if ($type == 'error')
		{
			$writer = new \Zend\Log\Writer\Stream($this->cwd . '/logs/error.log');
		}
		else
		{
			$writer = new \Zend\Log\Writer\Stream($this->cwd . '/logs/application.log');
		}
		$logger = new \Zend\Log\Logger();
		$logger->addWriter($writer);
		$logger->info($msg);
	}
}
