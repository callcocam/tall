const notifications = ({
    list: [],
    notify(title, message, type = "success", open = true, time = 3000) {
        this.list.push({
            title,
            message,
            type,
            open
        })        
        this.list.findIndex((v,i)=>{
            this.close(time, i)
        })
    },
    close(time, i) {
        setTimeout(() => {
            this.list[i].open = false
        }, time)
    }
})

const sidebar = ({
    open: false,
    toggle() {
        this.open = !this.open;
    },
})

export { sidebar, notifications }