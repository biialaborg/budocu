<?php

namespace Orders\Model\Service\Factory;

use Zend\ServiceManager\ServiceLocatorInterface,
    Zend\ServiceManager\FactoryInterface;
use Orders\Model\Service\AuthUsersService;
use Orders\Model\Repository\AuthUsersRepository;

class AuthUsersFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $adapter = $serviceLocator->get('dbAdapter');
        $repository = new AuthUsersRepository($adapter);
        
        //$cache = $serviceLocator->get('cache'); 
        //$repository->setCache($cache);
        
        return new AuthUsersService($repository);
    }
}