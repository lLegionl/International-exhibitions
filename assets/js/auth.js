document.addEventListener('DOMContentLoaded', function() {
    // Анимация формы
    const authForm = document.querySelector('.auth-form');
    if (authForm) {
        authForm.style.opacity = '0';
        authForm.style.transform = 'translateY(20px)';
        authForm.style.transition = 'all 0.5s ease';
        
        setTimeout(() => {
            authForm.style.opacity = '1';
            authForm.style.transform = 'translateY(0)';
        }, 100);
    }
    
    // Валидация пароля при регистрации
    const passwordInput = document.getElementById('password');
    const confirmInput = document.getElementById('password_confirm');
    
    if (passwordInput && confirmInput) {
        function validatePassword() {
            if (passwordInput.value !== confirmInput.value) {
                confirmInput.setCustomValidity('Пароли не совпадают');
            } else {
                confirmInput.setCustomValidity('');
            }
        }
        
        passwordInput.addEventListener('change', validatePassword);
        confirmInput.addEventListener('keyup', validatePassword);
    }
});