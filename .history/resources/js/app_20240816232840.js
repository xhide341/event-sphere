import './bootstrap';

import.meta.glob([
    '../images/**',
    '../fonts/**',
]);

const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        console.log(entry);
        if (entry.isIntersecting) {
            entry.target.classList.add('is-shown');
            console.log('adding show');
        } else {
            entry.target.classList.remove('is-shown');
            console.log('removing show');
        }
    });
});

const hiddenElements = document.querySelectorAll('.is-hidden');
hiddenElements.forEach((el) => observer.observe(el));

const text = "Events made easy";
let index = 0;

function type() {
    if (index < text.length) {
        document.getElementById("typing-text").innerHTML += text.charAt(index);
        index++;
        setTimeout(type, 100); // Adjust typing speed here
    }
}

window.onload = type;