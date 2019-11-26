import Vue from 'vue'
import App from './App'
import Vuetify from 'vuetify/lib'
import 'vuetify/dist/vuetify.min.css'

Vue.use(Vuetify);
const vuetifyOptions = { };
Vue.config.productionTip = false;
new Vue({
    el: '#app',
    vuetify: new Vuetify(vuetifyOptions),
    template: '<App/>',
    components: { App }
})