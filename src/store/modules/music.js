import axios from 'axios';
// import Qs from 'qs'
// import router from '../../router' ;
const root = process.env.API_ROOT; 
const state = { //状态存储
	show: false,
	music: ''
}

const mutations = {
	muShow(state, data){
		state.show = data;
	},
	muMusic(state,data){
		state.music = data;
	}
}

const actions = {
	acShow({commit,state},data){
		commit('muShow',data )
	},
	acMusic({commit}){
		return new Promise((resolve, reject) =>{
			axios.get(`${root}api/music.php`).then((res) => {
				commit('muMusic', res.data.data);	
				var data = res.data.data;
				var like = [];
				// console.log(data)
				for(var x = 0; x < data.length; x++){
					if(data[x].muy_id == 2){
						like.push(data[x]);
						console.log(data[x])
					}
				}
				console.log(like);
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