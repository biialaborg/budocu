<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;
use Orders\Entity\BdcDocumento;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {        
        $this->getServiceLocator()
                ->get('ZendViewRendererPhpRenderer')
                ->headTitle('Budocu');
        $isDocumento = FALSE;
        if($this->getRequest()->isPost()) {
            $search = $this->params()->fromPost('search');
            $isDocumento = $this->getBdcDocumentoService()->buscarDocumento($search);
            if(!$isDocumento['status']) {
                return $this->redirect()->toUrl('/documento-no-reportado/' . $search);
            }
            else{
               return  $this->redirect()
                ->toUrl('/documento-reportado/' . $isDocumento['data']['doc_codigo']);
            }
        }
        return new ViewModel();
    }
    
    public function reportarDocumentoAction()
    {
        $this->getServiceLocator()
        ->get('ZendViewRendererPhpRenderer')
        ->headTitle('Reportar Documento');
        $tiposDocuemento = $this->getBdcTipoDocumentoService()->getAll();
        return new ViewModel(
            array(
                'tiposDocuemntos' => $tiposDocuemento,
                )
            );
    }   
    public function guardarDocumentoAction()
    {
        $params = $this->params()->fromPost();
        $reportado = BdcDocumento::DOCUMENTO_REPORTADO_ENCONTRADO;
        if(isset($params['tipo'])){
            $reportado = BdcDocumento::DOCUMENTO_REPORTADO_PERDIDO;
            $params['tipdoc'] = NULL;
        }
        
        $response = $this->getBdcDocumentoService()
                        ->guardarDocumento(
                            $params['tipdoc'],
                            $params['numdoc'],
                            $params['email'],
                            $params['movil'],
                            $reportado
                            );
        return new JsonModel($response);
    }
    
    public function documentoReportadoAction()
    {
        $this->getServiceLocator()
        ->get('ZendViewRendererPhpRenderer')
        ->headTitle('Documento Reportado');
        $documento = $this->params()->fromRoute('documento', NULL);
        $dataDocumento = $this->getBdcDocumentoService()->getDocumentoByDocCodigo($documento);
        if(empty($dataDocumento)) {
            return $this->redirect()->toUrl('/');
        }
        return new ViewModel(
            array(
                'data' => $dataDocumento['data'],
                )
            );
    }
    
    public function documentoNoReportadoAction()
    {
        $this->getServiceLocator()
            ->get('ZendViewRendererPhpRenderer')
            ->headTitle('Reportar Docuemento');
    
        $documento = $this->params()->fromRoute('documento', NULL);
        
        return new ViewModel(
                array(
                    'numdoc' => $documento
                )
            );
    }
    
    /**
     * 
     * @return \Orders\Model\Service\BdcDocumentoService
     */
    public function getBdcDocumentoService()
    {
        return $this->getServiceLocator()->get('Orders\Model\Service\BdcDocumentoService');
    }
    
    /**
     * 
     * @return \Orders\Model\Service\BdcTipoDocumentoService
     */
    public function getBdcTipoDocumentoService()
    {
        return $this->getServiceLocator()->get('Orders\Model\Service\BdcTipoDocumentoService');
    }
    
}
