import './bootstrap';

import.meta.glob([
    '../images/**',
    '../fonts/**',
]);

import particlesJS from 'particles.js';

particlesJS.load('particles-js', './particles.json', () => {
    console.log('Particles.js loaded successfully.');
});

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
}, { threshold: 0.1 });

const hiddenElements = document.querySelectorAll('.is-hidden');
hiddenElements.forEach((el) => observer.observe(el));

const text = "Events made easy";
let index = 0;
const cursor = document.getElementById("cursor");

function type() {
    if (index < text.length) {
        document.getElementById("typing-text").innerHTML = text.substring(0, index + 1) + cursor.outerHTML;
        index++;
        setTimeout(type, 100); // Adjust typing speed here
    } else {
        cursor.style.display = "none"; // Hide cursor after typing is done
    }
}

window.onload = type; 