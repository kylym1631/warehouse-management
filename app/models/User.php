<?php

class User extends Model{

    public function createUser($data) {
        $this->db->query("INSERT INTO users(name, surname, email,password) VALUES (:name, :surname,:email, :password)");
        //bind values
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':surname', $data['surname']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);
        //Execute
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function checkUserExist($data)
    {
        $this->db->query( "SELECT * FROM users WHERE email = :email");
        $this->db->bind(':email', $data['email']);

        $resultEmail = $this->db->resultSet();
        return $resultEmail;
    }



    public static function getInstance($user) {
        $User = new User();
        if ($User->findUser($user)->exists()) {
            return $User;
        }
        return null;
    }

    public function findUser($user) {
        $field = filter_var($user, FILTER_VALIDATE_EMAIL) ? "email" : (is_numeric($user) ? "id" : "username");
        return($this->find("users", [$field, "=", $user]));
    }

    public function updateUser(array $fields, $userID = null) {
        if (!$this->update("users", $fields, $userID)) {
            throw new Exception('User update exception');
        }
    }



}