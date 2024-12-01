document.addEventListener('DOMContentLoaded', () => {
    console.log('Strona załadowana poprawnie!');

    //Zablokowanie skrótów klawiaturowych
    document.addEventListener('keydown', function (event) {
        // Blokada Ctrl+U (Wyświetlanie źródła strony)
        if (event.ctrlKey && event.key === 'u') {
            event.preventDefault();
            alert('Wyświetlanie kodu źródłowego zostało zablokowane.');
        }
        // Blokada Ctrl+Shift+I (Narzędzia deweloperskie)
        if (event.ctrlKey && event.shiftKey && event.key === 'I') {
            event.preventDefault();
            alert('Narzędzia deweloperskie są wyłączone.');
        }
        // Blokada F12 (DevTools)
        if (event.key === 'F12') {
            event.preventDefault();
            alert('Narzędzia deweloperskie są wyłączone.');
        }
    });
    
    //Zablokowanie prawego przycisku myszy
    document.addEventListener('contextmenu', function (event) {
        event.preventDefault();
        alert('Menu kontekstowe zostało wyłączone.');
    });
});
    
    
