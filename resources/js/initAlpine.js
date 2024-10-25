function initScreenWidth() {
    const screenWidthComponent = () => ({
        isResizing: false,
        resizeTimer: null,
        init() {
            this.updateWidth();
            window.addEventListener('resize', () => {
                this.isResizing = true;
                clearTimeout(this.resizeTimer);
                this.resizeTimer = setTimeout(() => {
                    this.updateWidth();
                    this.isResizing = false;
                }, 250);
            });
        },
        updateWidth() {
            Livewire.dispatch('screenResize', { width: window.innerWidth });
        }
    });

    Alpine.data('screenWidth', screenWidthComponent);
}

// Initialize on first load
initScreenWidth();

// Re-initialize after navigation
document.addEventListener('livewire:navigated', () => {
    initScreenWidth();
});
