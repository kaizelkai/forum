const button = document.querySelector('.navButton');
const navBar = document.querySelector('.navBar');

button.addEventListener('click', function() {
    navBar.classList.toggle('active');
    // Changer le symbole du bouton
    if (navBar.classList.contains('active')) {
        button.textContent = '✕';
    } else {
        button.textContent = '☰';
    }
});

// Fermer le menu au clic sur un lien
document.querySelectorAll('nav a').forEach(link => {
    link.addEventListener('click', function() {
        navBar.classList.remove('active');
        button.textContent = '☰';
    });
});