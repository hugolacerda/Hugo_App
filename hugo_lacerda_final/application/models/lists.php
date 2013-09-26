<?php

class Lists extends MY_Model {
    
    const DB_TABLE = 'lists';
    const DB_TABLE_PK = 'list_id';
    

     public $list_id;

    /**
     * Publication unique identifier.
     * @var int
     */
    public $user_id;
    
    /**
     * Publication name.
     * @var string
     */

    public $list_name;


}