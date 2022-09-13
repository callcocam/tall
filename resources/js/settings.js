export default (open = false,
    fixed = false) => ({
        open,
        fixed,
        updateSidebar() {
            if (window.outerWidth < 768) {
                this.open = false
                this.fixed = false
            }
            else {
                this.fixed = true
                this.open = true
            }
        },
        // navbar() {
        //     return {

        //     }
        // },
        sidebar(open) {
            return {
                open: open,
                toggle() {
                    this.open = !this.open
                },
                init() { }
            }
        },
        accountSideabar(open) {
            return {
                open: open,
                toggle() {
                    this.open = !this.open
                }
            }
        },
        cards(open) {
            return {
                open: open,
                toggle() {
                    this.open = !this.open
                }
            }
        },
        search(open, api) {
            return {
                open,
                lists: null,
                id: null,
                name: null,
                async init(){
                    // let { data } = await (await fetch(api.concat("?search=").concat(e.target.value))).json();
                    // this.lists = data;
                },
                toggle() {
                    this.open = !this.open
                },
                async alpineInstance(e) {
                    let { data } = await (await fetch(api.concat("?search=").concat(e.target.value))).json();
                    this.lists = data;
                },
                selected(list) {
                    this.name = list.name;
                    this.id = list.id;
                    // $wire.set('data.vereador_old_id', list.name, true)
                    this.$refs.dataName.value = list.name
                    this.$refs.dataId.value = list.id
                    this.toggle();
                }
            }
        },
        combobox(open, options) {
            console.log(JSON.parse(options))
            return {
                open,
                options: JSON.parse(options),
                toggle() {
                    this.open = !this.open
                }
            }
        },
        simplebar(){
            return {
                init(){
                    new SimpleBar(document.getElementById('simplebar-nav'))
                }
            }
        }
    })