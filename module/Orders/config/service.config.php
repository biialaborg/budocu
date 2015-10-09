<?php

return array(
    'factories' => array(
        'Orders\Model\Service\OrdersOperacionesService' => 'Orders\Model\Service\Factory\OrdersOperacionesFactory',
        'Orders\Model\Service\OrdersCountryService' => 'Orders\Model\Service\Factory\OrdersCountryFactory',
    ),
    
    'invokables' => array(
    ),
);