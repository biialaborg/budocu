<?php

namespace Orders\Model\Service;
use Util\Model\Service\Base\AbstractService;

class OrdersOperacionesService extends AbstractService 
{
    public function setOrder($params)
    {
        try {
            $this->_repository->insert(
                array(
                    'ope_nombres' => $params['nombres'],
                    'ope_direccion' => $params['direccion'],
                    'ope_email' => $params['email'],
                    'ope_pais' => $params['pais'],
                    'ope_ciudad' => $params['ciudad'],
                    'ope_cantidad' => $params['cajas'],
                    'ope_estado' => 1,
                    'ope_telefono' => $params['telefono'],
                    'fecha_registro' => date('Y-m-d H:i:s')
                )
            );
        } catch (\Exception $ex) {
            var_dump($ex->__toString());
            return false;
        }
        
        return true;
    }
    
}