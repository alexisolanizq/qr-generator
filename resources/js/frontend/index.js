import Vue from 'vue'
import App from './App.vue'
import router from './router'
import './styles/index.css'
let vm = new Vue({
    router,
    render: h => h(App)
}).$mount('#app')

window.vm = vm