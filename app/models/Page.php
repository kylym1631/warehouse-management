<?php
    class Page{
    private $db;
    public function __construct(){
        $this->db = new Database;
    }

    public function getTools()
    {
        $this->db->query("SELECT d.id,
        dc.name as category_name,
        d.name,
        d.created_at,
        d.available
        from devices d
        INNER JOIN device_categories dc
        on dc.id = d.category_id
        ORDER BY d.id;");
        $resultsTools = $this->db->resultSet();
        return $resultsTools;
    }

    public function changeQuantity($data){
        $this->db->query("update devices set available = :quantity where id = :id;");
        $this->db->bind(':quantity', $data['quantity']);
        $this->db->bind(':id', $data['id']);
        //Execute
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }

    }
}