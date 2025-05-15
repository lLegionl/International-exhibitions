document.addEventListener('DOMContentLoaded', function() {
    // Параллакс эффект для изображения выставки
    const exhibitionImage = document.querySelector('.exhibition-image');
    
    if (exhibitionImage) {
        window.addEventListener('scroll', function() {
            const scrollPosition = window.pageYOffset;
            exhibitionImage.style.transform = `translateY(${scrollPosition * 0.2}px)`;
        });
    }
    
    // Анимация деталей выставки
    const detailItems = document.querySelectorAll('.detail-item');
    
    detailItems.forEach((item, index) => {
        item.style.opacity = '0';
        item.style.transform = 'translateY(20px)';
        item.style.transition = `all 0.5s ease ${index * 0.1}s`;
        
        setTimeout(() => {
            item.style.opacity = '1';
            item.style.transform = 'translateY(0)';
        }, 100);
    });
});