import Vue from "vue";
import router from "./routes/index";
import store from "./store/index";
import Swal from 'vue-sweetalert2';
import i18n from './i18n';

Vue.use(Swal);
Vue.config.debug = true

//select
Vue.component("v-select", vSelect);
import vSelect from "vue-select";

////////////////////////////////////////////
//vue-moment
import VueMoment from 'vue-moment'
import moment from 'moment-timezone'
moment.tz.setDefault('Etc/GMT+2')
Vue.use(VueMoment, {moment})

////////////////////////////////////////////
// axios.defaults.baseURL = '/api/v1/';
////////////////////////////////////////////

Vue.mixin({
  methods: {
    moneyFormat: function (num,fixed=2) {
      let val = (num/1).toFixed(fixed).replace('.', '.')
      return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")
    },
  },
})

import VueHtmlToPaper from 'vue-html-to-paper';

const options = {
  name: '_blank',
  specs: [
    'fullscreen=yes',
    'titlebar=yes',
    'scrollbars=yes'
  ],
  styles: [ 
    'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css',
    'https://unpkg.com/kidlat-css/css/kidlat.css','/assets/css/print.css'
  ]
}

Vue.use(VueHtmlToPaper, options);
////////////////////////////////////////////
import { BeatLoader } from 'vue-spinner/dist/vue-spinner.min.js'
Vue.component('beat-loader', BeatLoader)
////////////////////////////////////////////
import VSwitch from 'v-switch-case'
Vue.use(VSwitch)
////////////////////////////////////////////
import CKEditor from '@ckeditor/ckeditor5-vue2';
Vue.use( CKEditor );

////////////////////////////////////////////
Vue.use(require('vue-shortkey'))

const app = new Vue({
  el: "#app",
  router,
  i18n,
  store
});
