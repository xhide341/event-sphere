// Export a default function that initializes everything
export default function initializeWelcome() {
    // Intersection Observer
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

    // Typing effect
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

// You can also export individual functions if needed
export function startTypingEffect() {
    // ... typing effect code here
}

export function setupIntersectionObserver() {
    // ... intersection observer code here
}

document.addEventListener('DOMContentLoaded', initializeWelcome);
