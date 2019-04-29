<template>
	<div class="content">
		<div class="main">
			<h2>用户登录</h2>
			<p>欢迎来到if love is divine的博客</p>
			<el-input
			  placeholder="请输入内容"
			  v-model="form.name"
			  prop="name"
			  clearable>
			</el-input>
			<el-input placeholder="请输入密码" v-model="form.password" prop="password" show-password></el-input>


			<p class="forget"><a href="">忘记密码了？</a></p>
			<el-button type="success" @click="login(form)">登录</el-button>
		</div>
		
	</div>
</template>	

<script>
export default {
	name: 'Login',
	data(){
		return{
			form:{
				name:'',
				password:''
			},
		}
	},
	created(){
		this.$store.dispatch('common/acHide')
	},
	methods:{
		login(form){
			if(form.name == '' || form.password == ''){
				alert('用户名或密码不能为空')
				return false;
			}
			this.$store.dispatch('login/acAdmin',form)
		}
	}
};
</script>
<style scoped>
	@import '../../static/css/login.css'
</style>