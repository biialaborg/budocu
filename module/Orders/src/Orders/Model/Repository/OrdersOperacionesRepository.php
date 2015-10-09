<?php
namespace Orders\Model\Repository;

use Util\Model\Repository\Base\AbstractRepository;

class OrdersOperacionesRepository extends AbstractRepository 
{
    /**
     * @var String Name of db table
     */
    protected $_table = 'orders_operaciones';

     /**
     * @var string or array of fields in table
     */
    protected $_primary = 'ope_id';

}

