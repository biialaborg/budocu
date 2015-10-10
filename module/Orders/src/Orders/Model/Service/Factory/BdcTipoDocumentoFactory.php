<?php

namespace Orders\Model\Service\Factory;

use Zend\ServiceManager\ServiceLocatorInterface,
    Zend\ServiceManager\FactoryInterface;
use Orders\Model\Service\BdcTipoDocumentoService;
use Orders\Model\Repository\BdcTipoDocumentoRepository;

class BdcTipoDocumentoFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $adapter = $serviceLocator->get('dbAdapter');
        $repository = new BdcTipoDocumentoRepository($adapter);
        
        //$cache = $serviceLocator->get('cache'); 
        //$repository->setCache($cache);
        
        return new BdcTipoDocumentoService($repository);
    }
}