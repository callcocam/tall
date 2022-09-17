export default (open = false, fixed = false) => ({
    open,
    fixed,
    init() {
        if (window.outerWidth < 1224) {
            this.open = false
        }
        else {
            this.open = true
        }
    },
    updateSidebar() {
        if (window.outerWidth < 1224) {
            this.open = false
        }
        else {
            this.open = true
        }
    },
})


