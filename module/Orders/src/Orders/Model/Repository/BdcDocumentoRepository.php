<?php
namespace Orders\Model\Repository;

use Util\Model\Repository\Base\AbstractRepository;
use Zend\Db\Sql\Where;

class BdcDocumentoRepository extends AbstractRepository 
{
    /**
     * @var String Name of db table
     */
    protected $_table = 'bdc_documento';

     /**
     * @var string or array of fields in table
     */
    protected $_primary = 'doc_id';
    
    /**
     * 
     * @param string $docCodigo
     * @return mixed
     */
    public function getDocumentoByDocCodigo($docCodigo = '')
    {
        $select = $this->sql->select()->from(array('t1' => 'bdc_documento'))
        ->join(array('t2' => 'bdc_tipo_documento'), 't1.tipd_id=t2.tipd_id', array('*'));
        $where = new Where();
        $where->equalTo('doc_codigo', $docCodigo);
        $select->where($where);
        return $this->fetchRow($select);
    }
    
    /**
     * 
     * @param string $search
     * @return mixed
     */
    public function getDocumento($search = '')
    {
        $select = $this->sql->select()->from(array('t1' => 'bdc_documento'))
            ->join(array('t2' => 'bdc_tipo_documento'), 't1.tipd_id=t2.tipd_id', array('*'));
        
        $where = new Where();
        $where->equalTo('doc_numero', $search);
        $select->where($where);
        return $this->fetchRow($select);
    }

}

