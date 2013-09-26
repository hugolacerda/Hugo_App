<?php

class Getuser extends MY_Model {
    
    const DB_TABLE = 'users';
    const DB_TABLE_PK = 'user_id';
    

     public $user_id;

    /**
     * Publication unique identifier.
     * @var int
     */
    public $username;
    
    /**
     * Publication name.
     * @var string
     */
    public $password;
}