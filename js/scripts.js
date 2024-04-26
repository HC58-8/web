window.addEventListener('DOMContentLoaded', () => {
    let scrollPos = 0;
    const mainNav = document.getElementById('mainNav');
    const headerHeight = mainNav.clientHeight;

    window.addEventListener('scroll', () => {
        const currentTop = document.body.getBoundingClientRect().top * -1;
        
        if (currentTop < scrollPos && currentTop > 0) {
            // Scroll vers le haut
            if (!mainNav.classList.contains('is-visible')) {
                mainNav.classList.add('is-visible');
            }
        } else {
            // Scroll vers le bas ou tout en haut
            mainNav.classList.remove('is-visible');
        }

        if (currentTop > headerHeight) {
            // Scroller vers le bas et en dehors de la hauteur de l'en-tête
            mainNav.classList.add('is-fixed');
        } else {
            // Scroller vers le haut et à l'intérieur de la hauteur de l'en-tête
            mainNav.classList.remove('is-fixed');
        }

        scrollPos = currentTop;
    });
});


