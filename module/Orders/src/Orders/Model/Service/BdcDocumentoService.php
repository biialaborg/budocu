<?php

namespace Orders\Model\Service;
use Util\Model\Service\Base\AbstractService;
use Orders\Entity\BdcDocumento;

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
        $dataDocuemnto = $this->getRepository()
                            ->getDocumentoByDocCodigo($codigo);
        if(!empty($dataDocuemnto)) {
            $response = TRUE;
        }
        return array('status' => $response, 'data' => $dataDocuemnto);
    }
    
    /**
     * 
     * @param string $tipoDocumento
     * @param string $numeroDocumento
     * @param string $email
     * @param string $telefono
     */
    public function guardarDocumento(
            $tipoDocumento, 
            $numeroDocumento,
            $email, 
            $telefono,
            $reportado = BdcDocumento::DOCUMENTO_REPORTADO_ENCONTRADO
        )
    {
        $response = array('status' => 1);
        try {
            $userId = NULL;
            $dataUsuario = $this->getAuthUsersService()
                ->getRepository()->getByEmail($email);
            if(empty($dataUsuario)) {
                $userId = $this->getAuthUsersService()
                    ->getRepository()->insert(
                        array(
                            'email' => $email,
                            'creation_date' => date('Y-m-d H:i:s'),
                        )
                    );
            }
            else {
                $userId = $dataUsuario['user_id'];
            }
            $this->getRepository()->insert(
                array(
                    'user_id' => $userId,
                    'doc_estado' => 1,
                    'doc_codigo' => uniqid(),
                    'fecha_registro' => date('Y-m-d H:i:s'),
                    'tipd_id' => $tipoDocumento,
                    'doc_numero' => $numeroDocumento,
                    'doc_telefono' => $telefono,
                    'doc_coordenadas' => NULL,
                    'doc_reportado' => $reportado
                )
            );
            return $response;
            
        } catch (\Exception $e) {
            return array(
                'status' => -1,
                'message' => $e->__toString()
            );
        }
    }

    /**
     *
     * @return \Orders\Model\Service\AuthUsersService
     */
    public function getAuthUsersService()
    {
        return $this->getServiceLocator()->get('Orders\Model\Service\AuthUsersService');
    }
    
    public function getAll()
    {
        return $this->getRepository()->getAll();
    }
    
}