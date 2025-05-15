<?php 
include 'includes/config.php';

// Проверка авторизации
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php?redirect=booking&exhibition_id=".$_GET['exhibition_id']);
    exit();
}

if (!isset($_GET['exhibition_id'])) {
    header("Location: index.php");
    exit();
}

$exhibition_id = intval($_GET['exhibition_id']);
$user_id = $_SESSION['user_id'];

// Получаем данные о выставке
$stmt = $pdo->prepare("SELECT * FROM exhibitions WHERE id = ?");
$stmt->execute([$exhibition_id]);
$exhibition = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$exhibition) {
    header ("Location: index.php");
    exit();
}

// Обработка формы бронирования
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tickets = intval($_POST['tickets']);
    $booking_date = date('Y-m-d H:i:s');
    
    try {
        $stmt = $pdo->prepare("INSERT INTO bookings (user_id, exhibition_id, booking_date, tickets) VALUES (?, ?, ?, ?)");
        $stmt->execute([$user_id, $exhibition_id, $booking_date, $tickets]);
        
        $_SESSION['booking_success'] = true;
        header("Location: booking-success.php?booking_id=".$pdo->lastInsertId());
        exit();
    } catch (PDOException $e) {
        $error = "Ошибка при бронировании: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Бронирование | <?php echo htmlspecialchars($exhibition['title']); ?></title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/booking.css">
</head>
<body>
    <header class="animated-header">
        <div class="container">
            <nav>
                <a href="index.php" class="logo">ArtExpo</a>
                <ul class="nav-links">
                    <li><a href="index.php">Главная</a></li>
                    <li><a href="museums.php">Музеи</a></li>
                    <li><a href="contacts.php">Контакты</a></li>
                    <li><a href="login.php">Вход</a></li>
                    <li><a href="register.php">Регистрация</a></li>
                </ul>
                <div class="burger">
                    <div class="line1"></div>
                    <div class="line2"></div>
                    <div class="line3"></div>
                </div>
            </nav>
        </div>
    </header>

    <main class="booking-page">
        <div class="container">
            <h1>Бронирование билетов</h1>
            
            <div class="booking-container">
                <div class="exhibition-summary">
                    <h2><?php echo htmlspecialchars($exhibition['title']); ?></h2>
                    <div class="summary-image" style="background-image: url('assets/images/<?php echo htmlspecialchars($exhibition['image']); ?>')"></div>
                    <p class="date"><?php echo date('d.m.Y', strtotime($exhibition['start_date'])); ?> - <?php echo date('d.m.Y', strtotime($exhibition['end_date'])); ?></p>
                    <p class="price">Цена за билет: <?php echo htmlspecialchars($exhibition['price']); ?> €</p>
                </div>
                
                <div class="booking-form">
                    <h2>Данные бронирования</h2>
                    
                    <?php if (isset($error)): ?>
                        <div class="alert error"><?php echo $error; ?></div>
                    <?php endif; ?>
                    
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="tickets">Количество билетов</label>
                            <select name="tickets" id="tickets" required>
                                <?php for ($i = 1; $i <= 10; $i++): ?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label>Итого к оплате</label>
                            <div class="total-price" id="totalPrice"><?php echo htmlspecialchars($exhibition['price']); ?> €</div>
                        </div>
                        
                        <button type="submit" class="btn">Подтвердить бронирование</button>
                    </form>
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
    <script src="assets/js/booking.js"></script>
</body>
</html>