<?php 
include 'includes/config.php';

if (!isset($_SESSION['booking_success']) || !isset($_GET['booking_id'])) {
    header("Location: index.php");
    exit();
}

unset($_SESSION['booking_success']);

$booking_id = intval($_GET['booking_id']);
$user_id = $_SESSION['user_id'];

// Получаем данные о бронировании
$stmt = $pdo->prepare("SELECT b.*, e.title as exhibition_title, e.price as exhibition_price FROM bookings b JOIN exhibitions e ON b.exhibition_id = e.id WHERE b.id = ? AND b.user_id = ?");
$stmt->execute([$booking_id, $user_id]);
$booking = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$booking) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Бронирование успешно | ArtExpo</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/booking-success.css">
</head>
<body>
    <header class="animated-header">
        <div class="container">
            <nav>
                <a href="index.php" class="logo">ArtExpo</a>
                <ul class="nav-links">
                    <li><a href="index.php">Главная</a></li>
                    <li><a href="exhibitions.php">Выставки</a></li>
                    <li><a href="contacts.php">Контакты</a></li>
                    <?php if (!empty($_SESSION['user_id'])) {?>
                    <li><a href="profile.php">Профиль</a></li>
                    <?php } else {?>
                    <li><a href="login.php">Вход</a></li>
                    <li><a href="register.php">Регистрация</a></li>
                    <?php } ?>
                </ul>
                <div class="burger">
                    <div class="line1"></div>
                    <div class="line2"></div>
                    <div class="line3"></div>
                </div>
            </nav>
        </div>
    </header>

    <main class="booking-success">
        <div class="container">
            <div class="success-card">
                <div class="success-icon">
                    <i class="fas fa-check-circle"></i>
                </div>
                <h1>Бронирование успешно завершено!</h1>
                <p>Спасибо за ваше бронирование. Ниже приведены детали вашего заказа.</p>
                
                <div class="booking-details">
                    <h2>Детали бронирования</h2>
                    <div class="detail-row">
                        <span class="detail-label">Номер бронирования:</span>
                        <span class="detail-value">#<?php echo $booking['id']; ?></span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Выставка:</span>
                        <span class="detail-value"><?php echo htmlspecialchars($booking['exhibition_title']); ?></span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Количество билетов:</span>
                        <span class="detail-value"><?php echo $booking['tickets']; ?></span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Сумма:</span>
                        <span class="detail-value"><?php echo ($booking['exhibition_price'] * $booking['tickets']); ?> €</span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Дата бронирования:</span>
                        <span class="detail-value"><?php echo date('d.m.Y H:i', strtotime($booking['booking_date'])); ?></span>
                    </div>
                </div>
                
                <div class="actions">
                    <a href="index.php" class="btn">На главную</a>
                    <a href="profile.php" class="btn outline">Мои бронирования</a>
                </div>
            </div>
        </div>
    </main>

    <footer>
        <div class="container">
            <p>&copy; 2025 ArtExpo. Все права защищены.</p>
        </div>
    </footer>

    <script src="assets/js/main.js"></script>
</body>
</html>