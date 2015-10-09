<?php
namespace Util;
use Zend\ServiceManager\ServiceLocatorInterface;
return array(    
    'factories' => array(
        'server' => function(ServiceLocatorInterface $sm) {
            $config = $sm->getServiceLocator()->get('config');
            $servers = $config['servers'];
            
            return new \Util\View\Helper\Server($servers);
        },
    ),
);
