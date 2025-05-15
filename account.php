<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Мой аккаунт - Global Expo</title>
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
            background-color: #f5f5f5;
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
        
        /* Основное содержимое */
        main {
            margin-top: 80px;
            padding: 40px 0;
        }
        
        .account-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }
        
        .account-title {
            font-size: 28px;
            color: #2c3e50;
        }
        
        .account-tabs {
            display: flex;
            border-bottom: 1px solid #ddd;
            margin-bottom: 30px;
        }
        
        .tab {
            padding: 10px 20px;
            cursor: pointer;
            border-bottom: 3px solid transparent;
            font-weight: 500;
        }
        
        .tab.active {
            border-bottom: 3px solid #e74c3c;
            color: #e74c3c;
        }
        
        .tab-content {
            display: none;
        }
        
        .tab-content.active {
            display: block;
        }
        
        /* Профиль */
        .profile-form {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        .form-row {
            display: flex;
            gap: 20px;
            margin-bottom: 20px;
        }
        
        .form-group {
            flex: 1;
            margin-bottom: 15px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: 500;
        }
        
        .form-group input, 
        .form-group select, 
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        
        .form-actions {
            display: flex;
            justify-content: flex-end;
            margin-top: 20px;
        }
        
        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s;
        }
        
        .btn-primary {
            background-color: #e74c3c;
            color: white;
        }
        
        .btn-primary:hover {
            background-color: #c0392b;
        }
        
        .btn-secondary {
            background-color: #ddd;
            color: #333;
            margin-right: 10px;
        }
        
        .btn-secondary:hover {
            background-color: #ccc;
        }
        
        /* Заявки */
        .bookings-list {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        
        .booking-item {
            display: flex;
            padding: 20px;
            border-bottom: 1px solid #eee;
            align-items: center;
        }
        
        .booking-item:last-child {
            border-bottom: none;
        }
        
        .booking-image {
            width: 100px;
            height: 70px;
            border-radius: 5px;
            overflow: hidden;
            margin-right: 20px;
        }
        
        .booking-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .booking-info {
            flex: 1;
        }
        
        .booking-title {
            font-weight: bold;
            margin-bottom: 5px;
            color: #2c3e50;
        }
        
        .booking-meta {
            display: flex;
            gap: 15px;
            color: #7f8c8d;
            font-size: 14px;
        }
        
        .booking-status {
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 12px;
            font-weight: bold;
            text-transform: uppercase;
        }
        
        .status-confirmed {
            background-color: #d4edda;
            color: #155724;
        }
        
        .status-pending {
            background-color: #fff3cd;
            color: #856404;
        }
        
        .status-cancelled {
            background-color: #f8d7da;
            color: #721c24;
        }
        
        .booking-actions {
            margin-left: 20px;
        }
        
        .btn-cancel {
            background-color: #f8d7da;
            color: #721c24;
            padding: 8px 15px;
            border-radius: 5px;
            font-weight: bold;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        
        .btn-cancel:hover {
            background-color: #f1b0b7;
        }
        
        .no-bookings {
            padding: 30px;
            text-align: center;
            color: #7f8c8d;
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
                    <li><a href="index.html">Главная</a></li>
                    <li><a href="#">Выставки</a></li>
                    <li><a href="#">О нас</a></li>
                    <li><a href="#">Контакты</a></li>
                    <li><a href="account.html" class="account-btn">Аккаунт</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Основное содержимое -->
    <main>
        <div class="container">
            <div class="account-header">
                <h1 class="account-title">Мой аккаунт</h1>
                <div>
                    <span>Добро пожаловать, <strong>Иван Иванов</strong></span>
                </div>
            </div>
            
            <div class="account-tabs">
                <div class="tab active" data-tab="profile">Профиль</div>
                <div class="tab" data-tab="bookings">Мои заявки</div>
            </div>
            
            <!-- Профиль -->
            <div class="tab-content active" id="profile">
                <form class="profile-form">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="first-name">Имя</label>
                            <input type="text" id="first-name" value="Иван">
                        </div>
                        <div class="form-group">
                            <label for="last-name">Фамилия</label>
                            <input type="text" id="last-name" value="Иванов">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" value="ivanov@example.com">
                        </div>
                        <div class="form-group">
                            <label for="phone">Телефон</label>
                            <input type="tel" id="phone" value="+7 (123) 456-78-90">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="company">Компания</label>
                        <input type="text" id="company" value="ООО 'Рога и копыта'">
                    </div>
                    
                    <div class="form-group">
                        <label for="position">Должность</label>
                        <input type="text" id="position" value="Директор по маркетингу">
                    </div>
                    
                    <div class="form-group">
                        <label for="country">Страна</label>
                        <select id="country">
                            <option value="RU" selected>Россия</option>
                            <option value="KZ">Казахстан</option>
                            <option value="BY">Беларусь</option>
                            <option value="US">США</option>
                            <option value="DE">Германия</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="about">О себе</label>
                        <textarea id="about" rows="4">Занимаюсь организацией участия компании в международных выставках с 2015 года.</textarea>
                    </div>
                    
                    <div class="form-actions">
                        <button type="button" class="btn btn-secondary">Отменить</button>
                        <button type="submit" class="btn btn-primary">Сохранить изменения</button>
                    </div>
                </form>
            </div>
            
            <!-- Заявки -->
            <div class="tab-content" id="bookings">
                <div class="bookings-list">
                    <!-- Заявка 1 -->
                    <div class="booking-item">
                        <div class="booking-image">
                            <img src="https://via.placeholder.com/100x70" alt="CES 2024">
                        </div>
                        <div class="booking-info">
                            <div class="booking-title">CES 2024 - Международная выставка электроники</div>
                            <div class="booking-meta">
                                <span>9-12 Января 2024</span>
                                <span>Лас-Вегас, США</span>
                                <span>2 участника</span>
                            </div>
                        </div>
                        <div class="booking-status status-confirmed">Подтверждено</div>
                        <div class="booking-actions">
                            <button class="btn-cancel">Отменить</button>
                        </div>
                    </div>
                    
                    <!-- Заявка 2 -->
                    <div class="booking-item">
                        <div class="booking-image">
                            <img src="https://via.placeholder.com/100x70" alt="Hannover Messe 2024">
                        </div>
                        <div class="booking-info">
                            <div class="booking-title">Hannover Messe 2024 - Промышленная выставка</div>
                            <div class="booking-meta">
                                <span>22-26 Апреля 2024</span>
                                <span>Ганновер, Германия</span>
                                <span>1 участник</span>
                            </div>
                        </div>
                        <div class="booking-status status-pending">На рассмотрении</div>
                        <div class="booking-actions">
                            <button class="btn-cancel">Отменить</button>
                        </div>
                    </div>
                    
                    <!-- Заявка 3 -->
                    <div class="booking-item">
                        <div class="booking-image">
                            <img src="https://via.placeholder.com/100x70" alt="Canton Fair 2023">
                        </div>
                        <div class="booking-info">
                            <div class="booking-title">Canton Fair 2023 - Торговая ярмарка</div>
                            <div class="booking-meta">
                                <span>15-30 Октября 2023</span>
                                <span>Гуанчжоу, Китай</span>
                                <span>4 участника</span>
                            </div>
                        </div>
                        <div class="booking-status status-cancelled">Отменено</div>
                        <div class="booking-actions">
                            <button class="btn-cancel" disabled>Отменить</button>
                        </div>
                    </div>
                </div>
                
                <!-- Пустой список -->
                <!-- <div class="no-bookings">
                    <p>У вас пока нет заявок на выставки</p>
                    <a href="#" class="btn btn-primary" style="margin-top: 15px;">Посмотреть выставки</a>
                </div> -->
            </div>
        </div>
    </main>

    <!-- Подвал -->
    <footer>
        <div class="container">
            <div class="footer-links">
                <a href="index.html">Главная</a>
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

    <script>
        // Переключение между вкладками
        document.querySelectorAll('.tab').forEach(tab => {
            tab.addEventListener('click', () => {
                // Удаляем активный класс у всех вкладок и контента
                document.querySelectorAll('.tab').forEach(t => t.classList.remove('active'));
                document.querySelectorAll('.tab-content').forEach(c => c.classList.remove('active'));
                
                // Добавляем активный класс текущей вкладке и соответствующему контенту
                tab.classList.add('active');
                const tabId = tab.getAttribute('data-tab');
                document.getElementById(tabId).classList.add('active');
            });
        });
        
        // Обработка отмены бронирования
        document.querySelectorAll('.btn-cancel:not(:disabled)').forEach(btn => {
            btn.addEventListener('click', function() {
                const bookingItem = this.closest('.booking-item');
                const bookingTitle = bookingItem.querySelector('.booking-title').textContent;
                
                if (confirm(`Вы уверены, что хотите отменить заявку на "${bookingTitle}"?`)) {
                    // Здесь будет код для отправки запроса на отмену
                    bookingItem.querySelector('.booking-status').textContent = 'Отменено';
                    bookingItem.querySelector('.booking-status').className = 'booking-status status-cancelled';
                    this.disabled = true;
                    alert('Заявка успешно отменена');
                }
            });
        });
    </script>
</body>
</html>