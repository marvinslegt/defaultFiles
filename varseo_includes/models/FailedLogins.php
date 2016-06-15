<?php
class FailedLogins extends Connection{
    /*
     * Insert ip address of failed login user
     */

    public function InsertFailedLoginAttempt($ip,$user)
    {
        $sql = "INSERT INTO failed_logins (user_username,ip_address,attempted) VALUES (:user,:ip,:date)";
        $q = $this->conn->prepare($sql);
        $q -> bindParam(':ip', $ip);
        $q -> bindParam(':user', $user);
        $q -> bindParam(':date', date("Y-m-d H:i:s"));
        return $q -> execute();
    }

    /*
     * Select username from failed atempts to check how many fails he has in the last 10 minutes
     */
    public function SelectCount($user)
    {
        $sql = "SELECT COUNT(user_username) FROM failed_logins WHERE user_username = :user AND attempted > Date_sub(Now(), INTERVAL 5 minute)";
        $q = $this->conn->prepare($sql);
        $q -> bindParam(':user', $user);
        $q -> execute();
        return $q->fetchColumn();
    }
}