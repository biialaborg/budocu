<?php

namespace Orders\Model\Service\Factory;

use Zend\ServiceManager\ServiceLocatorInterface,
    Zend\ServiceManager\FactoryInterface;
use Orders\Model\Service\OrdersCountryService;
use Orders\Model\Repository\OrdersCountryRepository;

class OrdersCountryFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $adapter = $serviceLocator->get('dbAdapter');
        $repository = new OrdersCountryRepository($adapter);
        
        //$cache = $serviceLocator->get('cache'); 
        //$repository->setCache($cache);
        
        return new OrdersCountryService($repository);
    }
}