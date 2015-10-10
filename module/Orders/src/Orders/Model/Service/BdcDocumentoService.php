<?php

namespace Orders\Model\Service;
use Util\Model\Service\Base\AbstractService;

class BdcDocumentoService extends AbstractService 
{
    /**
     * 
     * @param string $search
     */
    public function buscarDocumento($search = '')
    {
        $response = FALSE;
        $dataDocuemnto = $this->getRepository()->getDocumento($search);
        if(!empty($dataDocuemnto)) {
            $response = TRUE;
        }
        return array('status' => $response, 'data' => $dataDocuemnto);
    }
    
    /**
     * 
     * @param string $codigo
     */
    public function getDocumentoByDocCodigo($codigo = '')
    {
        $response = FALSE;
        $dataDocuemnto = $this->getRepository()->getDocumentoByDocCodigo($codigo);
        if(!empty($dataDocuemnto)) {
            $response = TRUE;
        }
        return array('status' => $response, 'data' => $dataDocuemnto);
    }
    
    
    public function getAll()
    {
        return $this->_repository->getAll();
    }
    
}