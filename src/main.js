// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
import App from './App'
import router from './router'
import store from './store/index'
import ElementUI from 'element-ui';
import 'element-ui/lib/theme-chalk/index.css';
Vue.config.productionTip = false
Vue.use(ElementUI)
/* eslint-disable no-new */
router.beforeEach((to,from,next) => {
	let isLogin = window.sessionStorage.getItem('isLogin')
	// console.log(window.sessionStorage.getItem('isLogin'))
	// console.log(isLogin == null || isLogin == 500)
	if(isLogin == null || isLogin == 500){ //未登录
		if(to.path !== '/'){
			return next({path: '/'});
		}else{
			next();
		}
	}else{
		next()
	}
})
new Vue({
  el: '#app',
  router,
  store,
  components: { App },
  template: '<App/>'
})
