<?php
$zfPath = 'vendor/ZF2';
if (is_dir($zfPath))
{
    include $zfPath . '/Zend/Loader/AutoloaderFactory.php';
    Zend\Loader\AutoloaderFactory::factory(array(
	'Zend\Loader\StandardAutoloader' => array(
	    'autoregister_zf' => true
        )
    ));
}

if (!class_exists('Zend\Loader\AutoloaderFactory')) 
{
    die('Unable to load ZF.');
}
