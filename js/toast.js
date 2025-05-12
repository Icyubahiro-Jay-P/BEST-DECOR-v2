document.addEventListener('DOMContentLoaded', () => {
    const toasts = document.querySelectorAll('.toast');
    
    toasts.forEach(toast => {
        // Auto dismiss after 2 seconds
        setTimeout(() => {
            toast.classList.add('hide');
            setTimeout(() => {
                toast.remove();
            }, 300);
        }, 3000);

        // Close button functionality
        const closeBtn = toast.querySelector('.toast-close');
        toast.onclick = ()=>{closeBtn.click()}
        closeBtn.addEventListener('click', () => {
            toast.classList.add('hide');
            setTimeout(() => {
                toast.remove();
            }, 300);
        });
    });
});
