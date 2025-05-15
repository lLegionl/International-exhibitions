document.addEventListener('DOMContentLoaded', function() {
    // Анимация карточек музеев
    const museumCards = document.querySelectorAll('.museum-card');
    
    museumCards.forEach((card, index) => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(30px)';
        card.style.transition = `all 0.5s ease ${index * 0.1}s`;
        
        setTimeout(() => {
            card.style.opacity = '1';
            card.style.transform = 'translateY(0)';
        }, 100);
    });
    
    // Фильтрация музеев (можно добавить позже)
});