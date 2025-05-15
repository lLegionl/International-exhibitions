<?php
function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

function redirectIfNotLoggedIn() {
    if (!isLoggedIn()) {
        header("Location: login.php");
        exit();
    }
}

function getUserById($id) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function getExhibitions($limit = null) {
    global $pdo;
    $sql = "SELECT e.*, m.name as museum_name FROM exhibitions e JOIN museums m ON e.museum_id = m.id";
    if ($limit) {
        $sql .= " LIMIT " . intval($limit);
    }
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getMuseums() {
    global $pdo;
    $stmt = $pdo->query("SELECT * FROM museums");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getExhibitionById($id) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT e.*, m.name as museum_name, m.location as museum_location FROM exhibitions e JOIN museums m ON e.museum_id = m.id WHERE e.id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function getBookingsByUserId($user_id) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT b.*, e.title as exhibition_title, e.price as exhibition_price FROM bookings b JOIN exhibitions e ON b.exhibition_id = e.id WHERE b.user_id = ? ORDER BY b.booking_date DESC");
    $stmt->execute([$user_id]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}