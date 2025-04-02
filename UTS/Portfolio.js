const arrowRight = document.querySelector('.portfolio-box .navigation .arrow-right');
const arrowLeft = document.querySelector('.portfolio-box .navigation .arrow-left');

let index = 0;

const activePortfolio = () => {

    const imgSlide = document.querySelector('.portfolio-carousel .img-slide');
    const portfolioDetails = document.querySelectorAll('.portfolio-detail');

    imgSlide.style.transform = `translateX(calc(${index * -100}% - ${index * 2}rem))`;

    portfolioDetails.forEach(detail => {
        detail.classList.remove('active');
    });
    portfolioDetails[index].classList.add('active');
}

arrowRight.addEventListener('click', () => {
    if (index < 2) {
        index++;
        arrowLeft.classList.remove('disabled');
    } 
    else {
        index = 3;
        arrowRight.classList.add('disabled');
    }
    activePortfolio();
});

arrowLeft.addEventListener('click', () => {
    if (index > 1) {
        index--;
        arrowRight.classList.remove('disabled');
    } 
    else {
        index = 0;
        arrowLeft.classList.add('disabled');
    }
    activePortfolio();
});

// scroll section active link
let sections = document.querySelectorAll('section');
let navLinks = document.querySelectorAll('header nav a');

window.onscroll = () => {
    sections.forEach(sec => {
        let top = window.scrollY;
        let offset = sec.offsetTop - 150;

        let height = sec.offsetHeight;

        let id = sec.getAttribute('id');
        if(top >= offset && top < offset + height) {
            navLinks.forEach(links => {
                links.classList.remove('active');
                document.querySelector('header nav a[href*=' + id + ']').classList.add('active');
            });
        };
    ;});
}

ScrollReveal({
    distance: '80px',
    duration: 1000,
    delay: 300,
    reset: true
});

ScrollReveal().reveal('.home-content, .heading, .contact-box h2', { origin: 'top' });
ScrollReveal().reveal('.home-img, .prestasi-container, .portfolio-container, .contact form', { origin: 'bottom' });
ScrollReveal().reveal('.home-content h1, .desc', { origin: 'left' });
ScrollReveal().reveal('.home-content p', { origin: 'right' });

// Perbaikan untuk contact-detail
ScrollReveal().reveal('.contact-detail', { 
    origin: 'bottom', 
    duration: 1000, 
    delay: 300, 
    distance: '50px'
});
