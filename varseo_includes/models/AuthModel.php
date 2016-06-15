<?php
class AuthModel extends Connection{

    private $checkUserQuery = 'SELECT * FROM authentication WHERE user_username = :username';

    /*
     * Sign in
     */
    function Auth($username)
    {
        $q = $this->conn->prepare($this->checkUserQuery);
        $q -> BindParam(':username',$username);
        $q -> execute();
        $row = $q->fetchAll();

        if ($row == true){
            return $row[0]['user_password'];
        }else{
            return false;
        }
    }

    /*
     * Session token *Security
     */
    public function setToken($token,$username)
    {
        $sql = "UPDATE authentication SET token = :token WHERE user_username = :username";
        $q = $this->conn->prepare($sql);
        $q -> BindParam(':token',$token);
        $q -> BindParam(':username',$username);
        return $q -> execute();
    }

    /*
     * Get all information of logged in user
     */
    public function getTokenInformation($username)
    {
        $sql = "SELECT * FROM authentication WHERE user_username = :username";
        $q = $this->conn->prepare($sql);
        $q -> BindParam(':username',$username);
        $q -> execute();
        $row = $q->fetchAll();

        if ($row == true){
            return $row[0]['token'];
        }else{
            return false;
        }
    }

}