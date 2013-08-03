<?php
namespace Application\Model;

abstract class AbstractModel 
{
	protected $config;
	protected $cwd;
	
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
