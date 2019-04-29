import axios from 'axios';
const root = process.env.API_ROOT; 
const state = { //状态存储
	tuijian: {}
}

const mutations = {
	muTuiJian(state,data){
		state.tuijian = data;
	}
}

const actions = {
	acTuiJian({commit}){
		return new Promise((resolve, reject) =>{
			axios.get(`${root}api/tuijian.php`).then((res) => {
				
				commit('muTuiJian', res.data.data);
				return res.data.data;

			})
		})
	}
}
export default {
	namespaced: true,
	state,
	mutations,
	actions
}