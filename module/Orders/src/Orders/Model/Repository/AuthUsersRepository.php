<?php
namespace Orders\Model\Repository;

use Util\Model\Repository\Base\AbstractRepository;

class AuthUsersRepository extends AbstractRepository 
{
    /**
     * @var String Name of db table
     */
    protected $_table = 'auth_users';

     /**
     * @var string or array of fields in table
     */
    protected $_primary = 'user_id';
    
    /**
     * 
     * @param strin $email
     */
    public function getByEmail($email) 
    {
        $select = $this->sql->select($this->_table)
        ->where(array('email =?' => $email));
        return $this->fetchRow($select);
    }

}

