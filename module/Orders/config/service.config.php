<?php

return array(
    'factories' => array(
        'Orders\Model\Service\OrdersOperacionesService' => 'Orders\Model\Service\Factory\OrdersOperacionesFactory',
        'Orders\Model\Service\OrdersCountryService' => 'Orders\Model\Service\Factory\OrdersCountryFactory',
        'Orders\Model\Service\BdcDocumentoService' => 'Orders\Model\Service\Factory\BdcDocumentoFactory',
        'Orders\Model\Service\BdcTipoDocumentoService' => 'Orders\Model\Service\Factory\BdcTipoDocumentoFactory',
    ),
    
    'invokables' => array(
    ),
);