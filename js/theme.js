document.addEventListener('DOMContentLoaded', () => {
    const themeToggle = document.querySelector('.toggle-switch i');
    const prefersDarkScheme = window.matchMedia('(prefers-color-scheme: dark)');

    // Check for saved theme
    const currentTheme = localStorage.getItem('theme');
    if (currentTheme) {
        document.body.dataset.theme = currentTheme;
    } else if (prefersDarkScheme.matches) {
      document.body.dataset.theme = 'dark';
      themeToggle.classList.replace("bi-moon-fill, bi-sun-fill")
    }

    themeToggle?.addEventListener('click', () => {
        let theme = document.body.dataset.theme === 'dark' ? 'light' : 'dark';
        document.body.dataset.theme = theme;
        localStorage.setItem('theme', theme);
    });
});
