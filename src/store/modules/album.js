import axios from 'axios';
// import Qs from 'qs'
// import router from '../../router' ;
const root = process.env.API_ROOT; 
const state = { //状态存储
	album: ''
}

const mutations = {
	muAlbum(state,data){
		state.album = data;
	}
}

const actions = {
	acAlbum({commit},level){
		return new Promise((resolve, reject) =>{
			axios.get(`${root}api/album.php?level=${level}`).then((res) => {
				console.log(res.data.data);
				commit('muAlbum', res.data.data);
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