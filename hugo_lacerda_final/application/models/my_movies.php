<?php

class My_movies extends MY_Model {

    const DB_TABLE = 'movies';
    const DB_TABLE_PK = 'movie_id';
    

     public $movie_id;
    /**
     * Issue unique identifier.
     * @var int 
     */
    public $movie_name;
    
    /**
     * Publication unifying record.
     * @var int
     */
    public $movie_number;
    
    /**
     * Publisher assigned issue number.
     * @var int 
     */
    public $movie_description;

    public $rotten_key;

    public $list_id;

    public function getList($list_id) {
        if ($list_id) {
            $query = $this->db->get_where($this::DB_TABLE, array('list_id' => $list_id) );
        }
        else {
            $query = $this->db->get($this::DB_TABLE);
        }
        $ret_val = array();
        $class = get_class($this);
        foreach ($query->result() as $row) {
            $model = new $class;
            $model->populate($row);
            $ret_val[$row->{$this::DB_TABLE_PK}] = $model;
        }
        return $ret_val;
    }
    
}