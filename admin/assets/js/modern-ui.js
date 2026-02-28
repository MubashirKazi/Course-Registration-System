document.addEventListener('DOMContentLoaded', () => {
    // 1. Initial Animations
    document.querySelectorAll('.animate-enter').forEach((el, index) => {
        el.style.animationDelay = `${index * 100}ms`;
    });

    // 2. Chart Placeholder (Mock data for demo)
    if (document.getElementById('chartCanvas')) {
        const ctx = document.getElementById('chartCanvas').getContext('2d');
        // Simple line chart placeholder (using canvas API or library if imported)
        // Here we simulate a chart with simple SVG if no library is present,
        // or just rely on CSS styling for the placeholder bars.
        console.log('Chart initialized');
    }

    // 3. Table Row Hover & Actions
    const rows = document.querySelectorAll('.modern-table tbody tr');
    rows.forEach(row => {
        row.addEventListener('click', (e) => {
            // Toggle selection or navigate
            if(!e.target.closest('button') && !e.target.closest('a')) {
                row.classList.toggle('selected-row');
            }
        });
    });

    // 4. Confetti Effect (Simple CSS implementation)
    window.triggerConfetti = () => {
        const confettiCount = 50;
        const defaults = {
            origin: { y: 0.7 },
            zIndex: 9999
        };
        // If a confetti library was loaded, use it. Otherwise, console log.
        if (typeof confetti === 'function') {
            confetti({
                particleCount: 100,
                spread: 70,
                origin: { y: 0.6 }
            });
        } else {
            console.log('Confetti! 🎉');
        }
    };

    // 5. Dark Mode Toggle
    const themeToggle = document.getElementById('theme-toggle');
    if (themeToggle) {
        themeToggle.addEventListener('click', () => {
            const current = document.documentElement.getAttribute('data-theme');
            const target = current === 'dark' ? 'light' : 'dark';
            document.documentElement.setAttribute('data-theme', target);
            localStorage.setItem('theme', target);
        });
    }

    // Load saved theme
    const savedTheme = localStorage.getItem('theme') || 'dark';
    document.documentElement.setAttribute('data-theme', savedTheme);
});
