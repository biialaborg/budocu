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
use Orders\Entity\OrdersCountry as EntityOrdersCountry;
use Zend\View\Model\JsonModel;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {        
        $this->getServiceLocator()
                ->get('ZendViewRendererPhpRenderer')
                ->headTitle('Mnemonic250 Neural Coffee, By hackers For hackers');
        
        $serviceOrderCountry = $this->getServiceLocator()
                ->get('Orders\Model\Service\OrdersCountryService');
        
        return new ViewModel(
                array(
                    'country' => 'PE',
                    'countries' => $serviceOrderCountry->getAll()
                )
            );
    }
    
    public function reportarDocumentoAction()
    {
        $this->getServiceLocator()
        ->get('ZendViewRendererPhpRenderer')
        ->headTitle('Reportar Docuemento');
    
        $serviceOrderCountry = $this->getServiceLocator()
        ->get('Orders\Model\Service\OrdersCountryService');
    
        return new ViewModel(
            array(
                'country' => 'PE',
                'countries' => $serviceOrderCountry->getAll()
            )
            );
    }   
    
    public function documentoReportadoAction()
    {
        $this->getServiceLocator()
        ->get('ZendViewRendererPhpRenderer')
        ->headTitle('Reportar Docuemento');
    
        $serviceOrderCountry = $this->getServiceLocator()
        ->get('Orders\Model\Service\OrdersCountryService');
    
        return new ViewModel(
            array(
                'country' => 'PE',
                'countries' => $serviceOrderCountry->getAll()
            )
            );
    }
    
    public function documentoNoReportadoAction()
    {
        $this->getServiceLocator()
        ->get('ZendViewRendererPhpRenderer')
        ->headTitle('Reportar Docuemento');
    
        $serviceOrderCountry = $this->getServiceLocator()
        ->get('Orders\Model\Service\OrdersCountryService');
    
        return new ViewModel(
            array(
                'country' => 'PE',
                'countries' => $serviceOrderCountry->getAll()
            )
            );
    }
    
    public function enviarAction()
    {      
        $params = $this->params()->fromPost();
        $serviceOrderOPeraciones = $this->getServiceLocator()
                ->get('Orders\Model\Service\OrdersOperacionesService');
        $response['status'] = $serviceOrderOPeraciones->setOrder($params);
        return new JsonModel($response);
    }
    
}
