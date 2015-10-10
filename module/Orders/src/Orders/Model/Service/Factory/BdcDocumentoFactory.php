<?php

namespace Orders\Model\Service\Factory;

use Zend\ServiceManager\ServiceLocatorInterface,
    Zend\ServiceManager\FactoryInterface;
use Orders\Model\Service\BdcDocumentoService;
use Orders\Model\Repository\BdcDocumentoRepository;

class BdcDocumentoFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $adapter = $serviceLocator->get('dbAdapter');
        $repository = new BdcDocumentoRepository($adapter);
        
        //$cache = $serviceLocator->get('cache'); 
        //$repository->setCache($cache);
        
        return new BdcDocumentoService($repository);
    }
}