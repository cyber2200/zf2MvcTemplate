<?php
namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class TestController extends AbstractActionController 
{
    public function indexAction()
    {
		$viewModel = new ViewModel();
		return $viewModel;
    }
}