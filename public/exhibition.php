<?php 
include 'includes/config.php';

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$exhibition_id = intval($_GET['id']);
$stmt = $pdo->prepare("SELECT e.*, m.name as museum_name, m.location as museum_location, m.working_hours as working_hours FROM exhibitions e JOIN museums m ON e.museum_id = m.id WHERE e.id = ?");
$stmt->execute([$exhibition_id]);
$exhibition = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$exhibition) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($exhibition['title']); ?> | ArtExpo</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/exhibition.css">
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

    <main class="exhibition-details">
        <div class="container">
            <div class="exhibition-header">
                <div class="exhibition-image" style="background-image: url('assets/images/<?php echo htmlspecialchars($exhibition['image']); ?>')"></div>
                <div class="exhibition-info">
                    <h1><?php echo htmlspecialchars($exhibition['title']); ?></h1>
                    <p class="museum"><?php echo htmlspecialchars($exhibition['museum_name']); ?>, <?php echo htmlspecialchars($exhibition['museum_location']); ?></p>
                    <p class="date"><?php echo date('d.m.Y', strtotime($exhibition['start_date'])); ?> - <?php echo date('d.m.Y', strtotime($exhibition['end_date'])); ?></p>
                    <p class="price"><?php echo htmlspecialchars($exhibition['price']); ?> €</p>
                    <a href="<?php if (!empty($_SESSION['user_id'])) { echo 'booking.php?id='.$row['id'];} else echo 'login.php';?>" class="btn">Забронировать билет</a>
                </div>
            </div>

            <div class="exhibition-content">
                <h2>О выставке</h2>
                <p><?php echo nl2br(htmlspecialchars($exhibition['description'])); ?></p>

                <div class="details-grid">
                    <div class="detail-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <h3>Местоположение</h3>
                        <p><?php echo htmlspecialchars($exhibition['museum_location']); ?></p>
                    </div>
                    <div class="detail-item">
                        <i class="fas fa-calendar-alt"></i>
                        <h3>Даты проведения</h3>
                        <p><?php echo date('d.m.Y', strtotime($exhibition['start_date'])); ?> - <?php echo date('d.m.Y', strtotime($exhibition['end_date'])); ?></p>
                    </div>
                    <div class="detail-item">
                        <i class="fas fa-clock"></i>
                        <h3>Часы работы</h3>
                        <p><?php echo htmlspecialchars($exhibition['working_hours']); ?></p>
                    </div>
                    <div class="detail-item">
                        <i class="fas fa-ticket-alt"></i>
                        <h3>Стоимость</h3>
                        <p><?php echo htmlspecialchars($exhibition['price']); ?> €</p>
                    </div>
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
    <script src="assets/js/exhibition.js"></script>
</body>
</html>