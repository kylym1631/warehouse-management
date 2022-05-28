<?php
class  Model{
    protected $db;
    protected $data=[];

    public function __construct(){
        $this->db = new Database();
    }

//    protected function create($data) {
////        return($this->db->insert($table, $fields));
//        $this->db->query("INSERT INTO users(name, surname, email,password) VALUES (:name, :surname, :password,:values)");
//        //bind values
//        $this->db->bind(':name', $data['name']);
//        $this->db->bind(':surname', $data['surname']);
//        $this->db->bind(':email', $data['email']);
//        $this->db->bind(':password', $data['password']);
//        //Execute
//        if($this->db->execute()){
//            return true;
//        }else{
//            return false;
//        }
//    }

    public function data() {
        return($this->data);
    }

    public function exists() {
        return(!empty($this->data));
    }

    protected function find($table, array $where = []) {
        $data = $this->db->select($table, $where);
        if ($data->count()) {
            $this->data = $data->first();
        }
        return $this;
    }

    protected function update($table, array $fields, $recordID = null) {
        if (!$recordID and $this->exists()) {
            $recordID = $this->data()->id;
        }
        return(!$this->db->update($table, $recordID, $fields));
    }
}