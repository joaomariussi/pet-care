
// Função para visualizar senha tela de login
document.addEventListener('DOMContentLoaded', function() {
    let togglePassword = document.querySelectorAll('.toggle-password');
    togglePassword.forEach(function(icon) {
        icon.addEventListener('click', function() {
            let passwordInput = document.querySelector(this.getAttribute('toggle'));
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.add('active');
            } else {
                passwordInput.type = 'password';
                icon.classList.remove('active');
            }
        });
    });
});
