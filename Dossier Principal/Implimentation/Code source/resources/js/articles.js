document.querySelectorAll('.faq-toggle').forEach(button => {
    button.addEventListener('click', () => {
        const content = button.nextElementSibling;
        content.classList.toggle('hidden');
    });
});