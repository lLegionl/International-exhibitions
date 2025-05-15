<?php include 'includes/config.php'; ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Контакты | ArtExpo</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/contacts.css">
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

    <main class="contacts-page">
        <div class="container">
            <h1>Свяжитесь с нами</h1>
            
            <div class="contact-container">
                <div class="contact-info">
                    <div class="info-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <h3>Адрес</h3>
                        <p>г. Москва, ул. Примерная, д. 123</p>
                    </div>
                    <div class="info-item">
                        <i class="fas fa-phone-alt"></i>
                        <h3>Телефон</h3>
                        <p>+7 (123) 456-78-90</p>
                    </div>
                    <div class="info-item">
                        <i class="fas fa-envelope"></i>
                        <h3>Email</h3>
                        <p>info@artexpo.ru</p>
                    </div>
                    <div class="info-item">
                        <i class="fas fa-clock"></i>
                        <h3>Часы работы</h3>
                        <p>Пн-Пт: 9:00 - 18:00</p>
                        <p>Сб-Вс: 10:00 - 16:00</p>
                    </div>
                </div>                
            </div>
            
            <div class="map-container">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2245.3737891357335!2d37.617633315829034!3d55.75582600000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46b54a5a738fa419%3A0x7c347d506f52311f!2z0JrRgNCw0YHQvdCw0Y8g0J_RgNC10YHQvdC40LbQsNGA0LjRjw!5e0!3m2!1sru!2sru!4v1620000000000!5m2!1sru!2sru" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </main>

    <footer>
        <div class="container">
            <p>&copy; 2025 ArtExpo. Все права защищены.</p>
        </div>
    </footer>

    <script src="assets/js/main.js"></script>
    <script src="assets/js/contacts.js"></script>
</body>
</html>