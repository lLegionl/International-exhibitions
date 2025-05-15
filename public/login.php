<?php 
include 'includes/config.php';

// Если пользователь уже авторизован, перенаправляем его
if (isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

// Обработка формы входа
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    
    // Проверяем пользователя
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ? OR email = ?");
    $stmt->execute([$username, $username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($user && password_verify($password, $user['password'])) {
        // Успешный вход
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        
        // Перенаправляем на страницу, с которой пришли, или на главную
        $redirect = isset($_GET['redirect']) ? urldecode($_GET['redirect']) : 'index.php';
        header("Location: $redirect");
        exit();
    } else {
        $error = "Неверное имя пользователя или пароль";
    }
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вход | ArtExpo</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/auth.css">
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

    <main class="auth-page">
        <div class="container">
            <div class="auth-form">
                <h1>Вход в систему</h1>
                
                <?php if (isset($error)): ?>
                    <div class="alert error"><?php echo $error; ?></div>
                <?php endif; ?>
                
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="username">Имя пользователя или Email</label>
                        <input type="text" id="username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Пароль</label>
                        <input type="password" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn">Войти</button>
                </form>
                
                <div class="auth-links">
                    <p>Ещё нет аккаунта? <a href="register.php">Зарегистрируйтесь</a></p>
                    <p><a href="forgot-password.php">Забыли пароль?</a></p>
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
    <script src="assets/js/auth.js"></script>
</body>
</html>