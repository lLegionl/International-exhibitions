<?php include 'includes/config.php'; ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Музеи | ArtExpo</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/museums.css">
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

    <main class="museums-page">
        <div class="container">
            <h1>Представленные выставки</h1>
            
            <div class="museums-grid">
                <?php
                $stmt = $pdo->query("SELECT e.*, m.name as museum_name, m.location as museum_location, m.working_hours as working_hours FROM exhibitions e JOIN museums m");
                while ($exhibitions = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo '<div class="museum-card">
                        <div class="museum-image" style="background-image: url(assets/images/'.$exhibitions['image'].')"></div>
                        <div class="museum-info">
                            <h2>'.$exhibitions['title'].'</h2>
                            <p class="location"><i class="fas fa-map-marker-alt"></i> '.$exhibitions['museum_location'].'</p>
                            <p class="description">'.substr($exhibitions['description'], 0, 150).'...</p>
                            <a href="exhibition.php?id='.$exhibitions['id'].'" class="btn">Подробнее</a>
                        </div>
                    </div>';
                }
                ?>
            </div>
        </div>
    </main>

    <footer>
        <div class="container">
            <p>&copy; 2025 ArtExpo. Все права защищены.</p>
        </div>
    </footer>

    <script src="assets/js/main.js"></script>
    <script src="assets/js/museums.js"></script>
</body>
</html>