<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Global Expo - Международные выставки</title>
    <style>
        /* Общие стили */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }
        
        body {
            line-height: 1.6;
            color: #333;
        }
        
        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
        }
        
        /* Шапка сайта */
        header {
            background-color: #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
        }
        
        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 0;
        }
        
        .logo {
            font-size: 24px;
            font-weight: bold;
            color: #2c3e50;
        }
        
        .logo span {
            color: #e74c3c;
        }
        
        nav ul {
            display: flex;
            list-style: none;
        }
        
        nav ul li {
            margin-left: 30px;
        }
        
        nav ul li a {
            text-decoration: none;
            color: #2c3e50;
            font-weight: 500;
            transition: color 0.3s;
        }
        
        nav ul li a:hover {
            color: #e74c3c;
        }
        
        .account-btn {
            background-color: #e74c3c;
            color: white;
            padding: 8px 15px;
            border-radius: 5px;
            font-weight: bold;
        }
        
        .account-btn:hover {
            background-color: #c0392b;
            color: white;
        }
        
        /* Герой-секция */
        .hero {
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('https://via.placeholder.com/1920x1080') no-repeat center center/cover;
            height: 80vh;
            display: flex;
            align-items: center;
            text-align: center;
            color: white;
            margin-top: 60px;
        }
        
        .hero-content {
            max-width: 800px;
            margin: 0 auto;
        }
        
        .hero h1 {
            font-size: 48px;
            margin-bottom: 20px;
        }
        
        .hero p {
            font-size: 20px;
            margin-bottom: 30px;
        }
        
        .btn {
            display: inline-block;
            background-color: #e74c3c;
            color: white;
            padding: 12px 30px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s;
        }
        
        .btn:hover {
            background-color: #c0392b;
        }
        
        /* О нас */
        .about {
            padding: 80px 0;
            background-color: #f9f9f9;
        }
        
        .section-title {
            text-align: center;
            margin-bottom: 50px;
            font-size: 36px;
            color: #2c3e50;
        }
        
        .about-content {
            display: flex;
            align-items: center;
            gap: 50px;
        }
        
        .about-text {
            flex: 1;
        }
        
        .about-text h3 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #e74c3c;
        }
        
        .about-text p {
            margin-bottom: 15px;
        }
        
        .about-image {
            flex: 1;
        }
        
        .about-image img {
            width: 100%;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        /* Популярные выставки */
        .exhibitions {
            padding: 80px 0;
        }
        
        .exhibitions-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 30px;
        }
        
        .exhibition-card {
            background-color: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }
        
        .exhibition-card:hover {
            transform: translateY(-10px);
        }
        
        .exhibition-image {
            height: 200px;
            overflow: hidden;
        }
        
        .exhibition-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s;
        }
        
        .exhibition-card:hover .exhibition-image img {
            transform: scale(1.1);
        }
        
        .exhibition-info {
            padding: 20px;
        }
        
        .exhibition-info h3 {
            font-size: 20px;
            margin-bottom: 10px;
            color: #2c3e50;
        }
        
        .exhibition-info p {
            margin-bottom: 15px;
            color: #7f8c8d;
        }
        
        .exhibition-meta {
            display: flex;
            justify-content: space-between;
            color: #e74c3c;
            font-weight: bold;
        }
        
        /* Контакты */
        .contacts {
            padding: 80px 0;
            background-color: #f9f9f9;
        }
        
        .contacts-container {
            display: flex;
            gap: 50px;
        }
        
        .contact-info {
            flex: 1;
        }
        
        .contact-info h3 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #e74c3c;
        }
        
        .contact-info p {
            margin-bottom: 15px;
        }
        
        .contact-info ul {
            list-style: none;
            margin-top: 20px;
        }
        
        .contact-info ul li {
            margin-bottom: 10px;
            display: flex;
            align-items: center;
        }
        
        .contact-info ul li i {
            margin-right: 10px;
            color: #e74c3c;
        }
        
        .contact-form {
            flex: 1;
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        
        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        
        .form-group textarea {
            height: 150px;
        }
        
        /* Подвал */
        footer {
            background-color: #2c3e50;
            color: white;
            padding: 30px 0;
            text-align: center;
        }
        
        .footer-links {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }
        
        .footer-links a {
            color: white;
            margin: 0 15px;
            text-decoration: none;
        }
        
        .footer-links a:hover {
            text-decoration: underline;
        }
        
        .social-icons {
            margin-bottom: 20px;
        }
        
        .social-icons a {
            color: white;
            margin: 0 10px;
            font-size: 20px;
        }
        
        .copyright {
            font-size: 14px;
            color: #bdc3c7;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    <!-- Шапка сайта -->
    <header>
        <div class="container header-container">
            <div class="logo">Global<span>Expo</span></div>
            <nav>
                <ul>
                    <li><a href="#">Главная</a></li>
                    <li><a href="#">Выставки</a></li>
                    <li><a href="#">О нас</a></li>
                    <li><a href="#">Контакты</a></li>
                    <li><a href="account.php" class="account-btn">Аккаунт</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Герой-секция -->
    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <h1>Международные выставки мирового уровня</h1>
                <p>Откройте для себя лучшие отраслевые события по всему миру. Найдите идеальную выставку для вашего бизнеса.</p>
                <a href="#" class="btn">Посмотреть выставки</a>
            </div>
        </div>
    </section>

    <!-- О нас -->
    <section class="about">
        <div class="container">
            <h2 class="section-title">О нас</h2>
            <div class="about-content">
                <div class="about-text">
                    <h3>GlobalExpo - ваш гид по международным выставкам</h3>
                    <p>Мы являемся ведущей платформой для поиска и организации участия в международных выставках по всему миру. Наша миссия - соединять бизнесы с возможностями для роста и развития.</p>
                    <p>С 2010 года мы помогаем компаниям находить наиболее релевантные отраслевые мероприятия, планировать участие и максимизировать возврат от инвестиций в выставки.</p>
                    <p>Наша команда экспертов обладает глубокими знаниями в различных отраслях и готова предоставить персонализированные рекомендации для вашего бизнеса.</p>
                </div>
                <div class="about-image">
                    <img src="https://via.placeholder.com/600x400" alt="О нас">
                </div>
            </div>
        </div>
    </section>

    <!-- Популярные выставки -->
    <section class="exhibitions">
        <div class="container">
            <h2 class="section-title">Популярные выставки</h2>
            <div class="exhibitions-grid">
                <!-- Карточка выставки 1 -->
                <div class="exhibition-card">
                    <div class="exhibition-image">
                        <img src="https://via.placeholder.com/400x300" alt="CES 2024">
                    </div>
                    <div class="exhibition-info">
                        <h3>CES 2024</h3>
                        <p>Крупнейшая в мире выставка потребительской электроники в Лас-Вегасе</p>
                        <div class="exhibition-meta">
                            <span>9-12 Января</span>
                            <span>Лас-Вегас, США</span>
                        </div>
                    </div>
                </div>
                
                <!-- Карточка выставки 2 -->
                <div class="exhibition-card">
                    <div class="exhibition-image">
                        <img src="https://via.placeholder.com/400x300" alt="Hannover Messe 2024">
                    </div>
                    <div class="exhibition-info">
                        <h3>Hannover Messe 2024</h3>
                        <p>Ведущая мировая выставка промышленных технологий</p>
                        <div class="exhibition-meta">
                            <span>22-26 Апреля</span>
                            <span>Ганновер, Германия</span>
                        </div>
                    </div>
                </div>
                
                <!-- Карточка выставки 3 -->
                <div class="exhibition-card">
                    <div class="exhibition-image">
                        <img src="https://via.placeholder.com/400x300" alt="Canton Fair 2024">
                    </div>
                    <div class="exhibition-info">
                        <h3>Canton Fair 2024</h3>
                        <p>Крупнейшая китайская ярмарка товаров народного потребления</p>
                        <div class="exhibition-meta">
                            <span>15 Апреля - 5 Мая</span>
                            <span>Гуанчжоу, Китай</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Контакты -->
    <section class="contacts">
        <div class="container">
            <h2 class="section-title">Контакты</h2>
            <div class="contacts-container">
                <div class="contact-info">
                    <h3>Свяжитесь с нами</h3>
                    <p>Если у вас есть вопросы о выставках или вам нужна помощь в организации участия, наша команда всегда готова помочь.</p>
                    <ul>
                        <li><i class="fas fa-map-marker-alt"></i> Москва, ул. Тверская, 18</li>
                        <li><i class="fas fa-phone"></i> +7 (495) 123-45-67</li>
                        <li><i class="fas fa-envelope"></i> info@globalexpo.ru</li>
                        <li><i class="fas fa-clock"></i> Пн-Пт: 9:00 - 18:00</li>
                    </ul>
                </div>
                <div class="contact-form">
                    <form>
                        <div class="form-group">
                            <label for="name">Ваше имя</label>
                            <input type="text" id="name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" required>
                        </div>
                        <div class="form-group">
                            <label for="message">Сообщение</label>
                            <textarea id="message" required></textarea>
                        </div>
                        <button type="submit" class="btn">Отправить</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Подвал -->
    <footer>
        <div class="container">
            <div class="footer-links">
                <a href="#">Главная</a>
                <a href="#">Выставки</a>
                <a href="#">О нас</a>
                <a href="#">Контакты</a>
                <a href="#">Политика конфиденциальности</a>
            </div>
            <div class="social-icons">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
            </div>
            <div class="copyright">
                &copy; 2024 GlobalExpo. Все права защищены.
            </div>
        </div>
    </footer>
</body>
</html>