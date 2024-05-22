<?php
class OrderModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function addOrder($orderedDate, $orderId, $orderStatus) {
        $stmt = $this->conn->prepare("INSERT INTO orders (ordered_date, order_id, order_status) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $orderedDate, $orderId, $orderStatus);
        return $stmt->execute();
    }

    public function getAllOrders() {
        $result = $this->conn->query("SELECT * FROM orders");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function editOrder($orderId, $orderedDate, $orderStatus) {
        $stmt = $this->conn->prepare("UPDATE orders SET ordered_date = ?, order_status = ? WHERE order_id = ?");
        $stmt->bind_param("sss", $orderedDate, $orderStatus, $orderId);
        return $stmt->execute();
    }

    public function deleteOrder($orderId) {
        $stmt = $this->conn->prepare("DELETE FROM orders WHERE order_id = ?");
        $stmt->bind_param("s", $orderId);
        return $stmt->execute();
    }
}
?>
