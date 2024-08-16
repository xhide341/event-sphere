import './bootstrap';

import.meta.glob([
    '../images/**',
    '../fonts/**',
]);

const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        console.log(entry);
        if (entry.isIntersecting) {
            entry.target.classList.add('show');
            console.log('adding show');
        } else {
            entry.target.classList.add('show');
            console.log('removing show');
        }
    });
});

const hiddenElements = document.querySelectorAll('hidden');
hiddenElements.forEach((el) => observer.observe(el));