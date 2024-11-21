document.addEventListener('DOMContentLoaded', () => {
    // Obsługa rozwijanego menu logowania
    const loginButton = document.querySelector('.login-button');
    const loginFormContainer = document.querySelector('.login-form-container');
    const menuToggle = document.querySelector('.menu-toggle');
    const menu = document.querySelector('.menu');

    // Przełączanie widoczności formularza logowania
    loginButton.addEventListener('click', (e) => {
        e.stopPropagation();
        loginFormContainer.style.display =
            loginFormContainer.style.display === 'block' ? 'none' : 'block';
    });

    // Ukrywanie formularza po kliknięciu poza nim
    document.addEventListener('click', () => {
        loginFormContainer.style.display = 'none';
    });

    loginFormContainer.addEventListener('click', (e) => {
        e.stopPropagation();
    });

    // Obsługa rozwijanego menu głównego
    menuToggle.addEventListener('click', () => {
        menu.classList.toggle('active');
    });

    // Ukrywanie menu po kliknięciu w link w wersji mobilnej
    menu.addEventListener('click', (e) => {
        if (e.target.tagName === 'A') {
            menu.classList.remove('active');
        }
    });
});
