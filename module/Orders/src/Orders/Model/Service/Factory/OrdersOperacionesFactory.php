<?php

namespace Orders\Model\Service\Factory;

use Zend\ServiceManager\ServiceLocatorInterface,
    Zend\ServiceManager\FactoryInterface;
use Orders\Model\Service\OrdersOperacionesService;
use Orders\Model\Repository\OrdersOperacionesRepository;

class OrdersOperacionesFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $adapter = $serviceLocator->get('dbAdapter');
        $repository = new OrdersOperacionesRepository($adapter);
        
        //$cache = $serviceLocator->get('cache'); 
        //$repository->setCache($cache);
        
        return new OrdersOperacionesService($repository);
    }
}