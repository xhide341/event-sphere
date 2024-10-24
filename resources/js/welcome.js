export default function initializeWelcome() {
    startTypingEffect();
    setupIntersectionObserver();
}


export function startTypingEffect() {
    const text = "Streamline your events. Amplify your impact.";
    let index = 0;
    const cursor = document.getElementById("cursor");

    function type() {
        if (index < text.length) {
            document.getElementById("typing-text").innerHTML = text.substring(0, index + 1) + cursor.outerHTML;
            index++;
            setTimeout(type, 100);
        } else {
            cursor.style.display = "none";
        }
    }

    // Start typing effect
    type();
}

export function setupIntersectionObserver() {
    const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        if (entry.isIntersecting) {
            entry.target.classList.add('is-shown');
        } else {
            entry.target.classList.remove('is-shown');
        }
    });
    }, { threshold: 0.1 });

    const hiddenElements = document.querySelectorAll('.is-hidden');
    hiddenElements.forEach((el) => observer.observe(el));
}

document.addEventListener('DOMContentLoaded', initializeWelcome);
