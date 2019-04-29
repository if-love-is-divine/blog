import axios from 'axios';
import Qs from 'qs'
import router from '../../router' ;
const root = process.env.API_ROOT; 
const state = { //状态存储
	admin: '',
	isLogin: false,
	level: ''
}

const mutations = {
	muAdmin(state, data){
		state.admin = data;
	}
}

const actions = {
	acAdmin ({commit,state},data){
		// console.log(data)
		return new Promise((resolve, reject) =>{
			data = Qs.stringify(data);
			axios.post(`${root}api/login.php`,data).then((res)=>{
				
				if(res.data.data){
					alert('欢迎你' + res.data.data.a_name)
					window.sessionStorage.setItem('isLogin',200)
					window.sessionStorage.setItem('level',res.data.data.a_power)
					router.push('Index')
				}else{
					alert('账号或密码有误')
				}
				return res.data;
			})
		})
	},
	acHide ({commit,state}){
		commit('muCommon',false)
	}
}
export default {
	namespaced: true,
	state,
	mutations,
	actions
}