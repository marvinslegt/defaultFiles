<?php
/**
 * Created by PhpStorm.
 * User: marvinslegt
 * Date: 23/05/16
 * Time: 19:07
 */

class UserModel extends Connection{
    /*
     * Get all information about the student
     */
    public function getAllDetails($name,$token)
    {
        $sql = "SELECT * FROM authentication WHERE user_username = :username AND token = :token";
        $q = $this->conn->prepare($sql);
        $q -> bindParam(':username', $name);
        $q -> bindParam(':token', $token);
        $q -> execute();
        return $q->fetchAll();
    }
}