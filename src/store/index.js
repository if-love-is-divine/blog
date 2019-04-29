import Vue from 'vue'
import Vuex from 'vuex'
import common from './modules/common'
import login from './modules/login'
import music from './modules/music'
import index from './modules/index'
import album from './modules/album'
Vue.use(Vuex)
export default new Vuex.Store({
	modules: {
		common,
		login,
		music,
		index,
		album
	}
})