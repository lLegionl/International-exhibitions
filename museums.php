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

    <main class="museums-page">
        <div class="container">
            <h1>Наши музеи-партнёры</h1>
            
            <div class="museums-grid">
                <?php
                $stmt = $pdo->query("SELECT * FROM museums");
                while ($museum = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo '<div class="museum-card">
                        <div class="museum-image" style="background-image: url(assets/images/'.$museum['image'].')"></div>
                        <div class="museum-info">
                            <h2>'.$museum['name'].'</h2>
                            <p class="location"><i class="fas fa-map-marker-alt"></i> '.$museum['location'].'</p>
                            <p class="description">'.substr($museum['description'], 0, 150).'...</p>
                            <a href="museum.php?id='.$museum['id'].'" class="btn">Подробнее</a>
                        </div>
                    </div>';
                }
                ?>
            </div>
        </div>
    </main>

    <footer>
        <div class="container">
            <p>&copy; 2023 ArtExpo. Все права защищены.</p>
        </div>
    </footer>

    <script src="assets/js/main.js"></script>
    <script src="assets/js/museums.js"></script>
</body>
</html>