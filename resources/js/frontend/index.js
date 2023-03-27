import Vue from 'vue'
import App from './App.vue'
import './styles/index.css'
let vm = new Vue({
    render: h => h(App)
}).$mount('#app')

window.vm = vm