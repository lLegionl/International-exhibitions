<?php include 'includes/config.php';?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Международные выставки</title>
    <link rel="stylesheet" href="assets/css/style.css">
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

    <section class="hero">
        <div class="hero-content">
            <h1 class="animated-text">Международные выставки</h1>
            <p>Откройте для себя мир искусства через наши уникальные выставки</p>
            <a href="#featured" class="btn">Исследовать</a>
        </div>
    </section>

    <section id="featured" class="featured-exhibitions">
        <div class="container">
            <h2>Рекомендуемые выставки</h2>
            <div class="exhibitions-grid">
                <?php
                $stmt = $pdo->query("SELECT e.*, m.name as museum_name FROM exhibitions e JOIN museums m ON e.museum_id = m.id LIMIT 3");
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                    <div class="exhibition-card" data-id="<?=$row['id']?>">
                        <div class="card-image" style="background-image: url(assets/images/<?=$row['image']?>)"></div>
                        <div class="card-content">
                            <h3><?=$row['title']?></h3>
                            <p class="museum"><?=$row['museum_name']?></p>
                            <p class="date"><?=date('d.m.Y', strtotime($row['start_date'])).' - '.date('d.m.Y', strtotime($row['end_date']))?></p>
                            <p class="price"><?=$row['price']?> €</p>
                            <a href="<?php if (!empty($_SESSION['user_id'])) { echo 'exhibition.php?id='.$row['id'];} else echo 'login.php';?>" class="btn">Подробнее</a>
                        </div>
                    </div>;
               <?php } ?>
                
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <p>&copy; 2025 ArtExpo. Все права защищены.</p>
        </div>
    </footer>

    <script src="assets/js/main.js"></script>
</body>
</html>