<?php
class UserModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function createUser($username, $password, $dob, $mobile, $email, $security_question, $security_answer) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->conn->prepare("INSERT INTO admins (username, password, dob, mobile, email, security_question, security_answer) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssss", $username, $hashed_password, $dob, $mobile, $email, $security_question, $security_answer);
        return $stmt->execute();
    }

    public function getUser($username) {
        $stmt = $this->conn->prepare("SELECT * FROM admins WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function updateUser($username, $dob, $mobile, $email) {
        $stmt = $this->conn->prepare("UPDATE admins SET dob = ?, mobile = ?, email = ? WHERE username = ?");
        $stmt->bind_param("ssss", $dob, $mobile, $email, $username);
        return $stmt->execute();
    }

    public function updatePassword($username, $newPassword) {
        $hashed_password = password_hash($newPassword, PASSWORD_DEFAULT);
        $stmt = $this->conn->prepare("UPDATE admins SET password = ? WHERE username = ?");
        $stmt->bind_param("ss", $hashed_password, $username);
        return $stmt->execute();
    }

    public function updateProfile($username, $dob, $mobile_number, $email) {
        $stmt = $this->conn->prepare("UPDATE admins SET dob = ?, mobile = ?, email = ? WHERE username = ?");
        $stmt->bind_param("ssss", $dob, $mobile_number, $email, $username);
        return $stmt->execute();
    }
}
?>