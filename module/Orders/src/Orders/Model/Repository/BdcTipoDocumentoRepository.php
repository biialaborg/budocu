<?php
namespace Orders\Model\Repository;

use Util\Model\Repository\Base\AbstractRepository;

class BdcTipoDocumentoRepository extends AbstractRepository 
{
    /**
     * @var String Name of db table
     */
    protected $_table = 'bdc_tipo_documento';

     /**
     * @var string or array of fields in table
     */
    protected $_primary = 'tipd_id';

}

