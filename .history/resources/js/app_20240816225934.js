import './bootstrap';

import.meta.glob([
    '../images/**',
    '../fonts/**',
]);

const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        console.log(entry);
        if (entry.isIntersecting) {
            entry.target.classList.add('appear');
            console.log('adding show');
        } else {
            entry.target.classList.remove('appear');
        }
    });
});

const hiddenElements = document.querySelectorAll('.invisible');
hiddenElements.forEach((el) => observer.observe(el));