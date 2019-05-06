import axios from 'axios';

const root = process.env.API_ROOT;

const state = { //状态存储
	nav: true,
	footer:true,
	acate: {}
}

const mutations = {
	muCommon(state, data){
		state.nav = data;
		state.footer = data;
	},
	muFooter(state,data){
		state.footer = data;
	},
	muAlbum(state,data){
		state.acate = data;
	}
}

const actions = {
	acShow ({commit,state}){ // 公共部分的显示
		commit('muCommon',true )
	},
	acHide ({commit,state}){
		commit('muCommon',false)
	},
	acFooter ({commit,state},data){
		commit('muFooter',data);
	},
	acAlbum ({commit,state},data){
		axios.get(`${root}api/nav.php?action=${data.action}&parent=${data.parent}`).then((res) => {
			
			commit('muAlbum',res.data.data);
			return res.data.data;
		})
	}
}
export default {
	namespaced: true,
	state,
	mutations,
	actions
}