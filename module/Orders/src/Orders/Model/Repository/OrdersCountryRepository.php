<?php
namespace Orders\Model\Repository;

use Util\Model\Repository\Base\AbstractRepository;

class OrdersCountryRepository extends AbstractRepository 
{
    /**
     * @var String Name of db table
     */
    protected $_table = 'orders_country';

     /**
     * @var string or array of fields in table
     */
    protected $_primary = 'country_id';

}

