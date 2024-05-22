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

    public function addOrder($orderedDate, $orderId, $orderStatus) {
        $stmt = $this->conn->prepare("INSERT INTO orders (ordered_date, order_id, order_status) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $orderedDate, $orderId, $orderStatus);
        return $stmt->execute();
    }

    public function deleteOrder($orderId) {
        $stmt = $this->conn->prepare("DELETE FROM orders WHERE order_id = ?");
        $stmt->bind_param("s", $orderId);
        return $stmt->execute();
    }

    public function addProduct($productId, $productName, $productStatus, $productPrice) {
        $stmt = $this->conn->prepare("INSERT INTO products (product_id, product_name, product_status, product_price) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $productId, $productName, $productStatus, $productPrice);
        return $stmt->execute();
    }
    

    public function deleteProduct($productId) {
        $stmt = $this->conn->prepare("DELETE FROM products WHERE product_id = ?");
        $stmt->bind_param("s", $productId);
        return $stmt->execute();
    }

    public function addReview($userName, $userEmail, $phoneNumber, $message) {
        $stmt = $this->conn->prepare("INSERT INTO reviews (user_name, user_email, phone_number, message) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $userName, $userEmail, $phoneNumber, $message);
        return $stmt->execute();
    }

    public function getReviews() {
        $reviews = array();

        $sql = "SELECT user_name, user_email, phone_number, message FROM reviews ORDER BY id DESC LIMIT 10";
        $result = $this->conn->query($sql);

        if ($result) {
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $reviews[] = $row;
                }
            }
        } else {
            echo "Error retrieving reviews: " . $this->conn->error;
        }

        return $reviews;
    }

    public function addSupport($userName, $message) {
        $stmt = $this->conn->prepare("INSERT INTO support (userName, message) VALUES (?, ?)");
        $stmt->bind_param("ss", $userName, $message);
        return $stmt->execute();
    }

}
?>
