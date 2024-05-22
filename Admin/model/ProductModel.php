<?php
class ProductModel {
    private $conn;

    public function __construct() {
        // Database configuration
        $dbHost = 'localhost';
        $dbUsername = 'root';
        $dbPassword = '';
        $dbName = 'my_app';

        // Create connection
        $this->conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

        // Check connection
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function addProduct($productName, $description, $price) {
        $sql = "INSERT INTO product (product_name, description, price) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssd", $productName, $description, $price);
        $stmt->execute();
        $stmt->close();
    }

    public function deleteProduct($productId) {
        $sql = "DELETE FROM product WHERE product_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $productId);
        $stmt->execute();
        $stmt->close();
    }

    public function getAllProducts() {
        $sql = "SELECT * FROM product";
        $result = $this->conn->query($sql);
        $products = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $products[] = $row;
            }
        }
        return $products;
    }
}
?>
