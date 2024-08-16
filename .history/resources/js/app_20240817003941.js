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

document.addEventListener('scroll', function() {
    const scrollPosition = window.pageYOffset;
    const bgLanding = document.querySelector('.bg-landing');
    
    // Adjust the '0.5' value to control the speed of the parallax effect
    bgLanding.style.backgroundPositionY = `-${scrollPosition * 0.5}px`;
});