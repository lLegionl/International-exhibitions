document.addEventListener('DOMContentLoaded', function() {
    // Мобильное меню
    const burger = document.querySelector('.burger');
    const nav = document.querySelector('.nav-links');
    
    burger.addEventListener('click', () => {
        nav.classList.toggle('active');
        burger.classList.toggle('toggle');
    });

    // Плавная прокрутка
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });

    // Анимация шапки при скролле
    const header = document.querySelector('.animated-header');
    window.addEventListener('scroll', () => {
        if (window.scrollY > 50) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
    });

    // Инициализация слайдера
    initHeroSlider();
    
    // Анимация карточек при появлении
    animateOnScroll();
});

function initHeroSlider() {
    const slider = document.querySelector('.hero-slider');
    if (!slider) return;
    
    // В реальном проекте здесь будет запрос к API или БД
    const slides = [
        {
            image: 'assets/images/slide1.jpg',
            title: 'Искусство эпохи Возрождения',
            subtitle: 'Откройте для себя шедевры великих мастеров'
        },
        {
            image: 'assets/images/slide2.jpg',
            title: 'Современное искусство',
            subtitle: 'Инновационные работы современных художников'
        },
        {
            image: 'assets/images/slide3.jpg',
            title: 'Исторические артефакты',
            subtitle: 'Путешествие сквозь века и культуры'
        }
    ];
    
    let currentSlide = 0;
    
    function showSlide(index) {
        const slide = slides[index];
        slider.style.backgroundImage = `linear-gradient(135deg, rgba(74, 111, 165, 0.3), rgba(22, 96, 136, 0.4)), url(${slide.image})`;
        slider.innerHTML = `
            <div class="slide-content">
                <h3>${slide.title}</h3>
                <p>${slide.subtitle}</p>
            </div>
        `;
    }
    
    showSlide(currentSlide);
    
    // Автопереключение слайдов
    setInterval(() => {
        currentSlide = (currentSlide + 1) % slides.length;
        showSlide(currentSlide);
    }, 5000);
}

function animateOnScroll() {
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, { threshold: 0.1 });
    
    document.querySelectorAll('.exhibition-card').forEach(card => {
        observer.observe(card);
    });
}