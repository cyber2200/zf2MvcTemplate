<?php
namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Model\Test1Model;

class IndexController extends AbstractActionController 
{
    public function indexAction()
    {
		$test1Model = new Test1Model();
		
		
		$viewModel = new ViewModel();
		$viewModel->setVariable("modelOutput", $test1Model->modelTest());
		$viewModel->setVariable("dbTest", $test1Model->getFromDbByKey('test1'));
		return $viewModel;
    }
	
	public function testAction()
	{
		return new ViewModel();
	}
}
