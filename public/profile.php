<?php 
include 'includes/config.php';

// Проверка авторизации
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Получаем данные пользователя
$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$user_id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

// Получаем бронирования пользователя
$stmt = $pdo->prepare("SELECT b.*, e.title as exhibition_title, e.image as exhibition_image, e.price as ticket_price 
                      FROM bookings b 
                      JOIN exhibitions e ON b.exhibition_id = e.id 
                      WHERE b.user_id = ? 
                      ORDER BY b.booking_date DESC");
$stmt->execute([$user_id]);
$bookings = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Мой профиль | ArtExpo</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/profile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
                    <li><a href="profile.php">Профиль</a></li>
                    <li><a href="logout.php">Выход</a></li>
                </ul>
                <div class="burger">
                    <div class="line1"></div>
                    <div class="line2"></div>
                    <div class="line3"></div>
                </div>
            </nav>
        </div>
    </header>

    <main class="profile-page">
        <div class="container">
            <h1>Мой профиль</h1>
            
            <div class="profile-container">
                <div class="user-info">
                    <div class="user-card">
                        <div class="user-avatar">
                            <i class="fas fa-user-circle"></i>
                        </div>
                        <h2><?php echo htmlspecialchars($user['username']); ?></h2>
                        <p class="user-email"><?php echo htmlspecialchars($user['email']); ?></p>
                        
                        <div class="user-stats">
                            <div class="stat-item">
                                <i class="fas fa-ticket-alt"></i>
                                <span><?php echo count($bookings); ?> бронирований</span>
                            </div>
                            <div class="stat-item">
                                <i class="fas fa-calendar-alt"></i>
                                <span>Участник с <?php echo date('d.m.Y', strtotime($user['created_at'])); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="bookings-section">
                    <h2>Мои бронирования</h2>
                    
                    <?php if (empty($bookings)): ?>
                        <div class="no-bookings">
                            <i class="fas fa-ticket-alt"></i>
                            <p>У вас пока нет бронирований</p>
                            <a href="exhibitions.php" class="btn">Посмотреть выставки</a>
                        </div>
                    <?php else: ?>
                        <div class="bookings-list">
                            <?php foreach ($bookings as $booking): ?>
                                <div class="booking-card">
                                    <div class="booking-image" style="background-image: url('assets/images/<?php echo htmlspecialchars($booking['exhibition_image']); ?>')"></div>
                                    <div class="booking-details">
                                        <h3><?php echo htmlspecialchars($booking['exhibition_title']); ?></h3>
                                        <div class="detail-row">
                                            <span class="detail-label">Номер бронирования:</span>
                                            <span class="detail-value">#<?php echo $booking['id']; ?></span>
                                        </div>
                                        <div class="detail-row">
                                            <span class="detail-label">Дата бронирования:</span>
                                            <span class="detail-value"><?php echo date('d.m.Y H:i', strtotime($booking['booking_date'])); ?></span>
                                        </div>
                                        <div class="detail-row">
                                            <span class="detail-label">Билетов:</span>
                                            <span class="detail-value"><?php echo $booking['tickets']; ?></span>
                                        </div>
                                        <div class="detail-row">
                                            <span class="detail-label">Сумма:</span>
                                            <span class="detail-value"><?php echo ($booking['ticket_price'] * $booking['tickets']); ?> €</span>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </main>

    <footer>
        <div class="container">
            <p>&copy; 2023 ArtExpo. Все права защищены.</p>
        </div>
    </footer>

    <script src="assets/js/main.js"></script>
    <script src="assets/js/profile.js"></script>
</body>
</html>