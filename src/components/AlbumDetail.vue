<template>
	<div class="content" style="width:100%;">
		<h2>{{name}}</h2>
		<div class="imgs">
			<vue-waterfall-easy :imgsArr="imgsArr" @scrollReachBottom="getData" :height="1200" :maxCols="5">
				<div slot="loading" v-if="isFirstLoad">loading...</div>
			</vue-waterfall-easy>
		</div>
	</div>
</template>
<script>
	import axios from 'axios';
	const root = process.env.API_ROOT;
	import vueWaterfallEasy from 'vue-waterfall-easy';
	export default{
		name: 'AlbumDetail',
		props:{
			'id':{
				require:true
			}
		},
		data(){
			return {
				imgsArr: [],
				group: 0,
				isFirstLoad: true,
				name: '',
			}
		},
		created(){
			this.getData()
			this.$store.dispatch('common/acFooter', false);
		},
		components:{
			vueWaterfallEasy
		},
		watch:{
			//查询参数改变，再次执行数据获取方法
			'$route'(to,from){
				this.group = 0;
				var id = this.$props.id;
				this.imgsArr = [];
			 	this.getData();
			}
		},
		methods:{
			getData(){
				var group = this.group;
				var id = this.$props.id;

				axios.get(`${root}api/albumdetail.php?group=${group}&id=${id}`).then(res =>{
					var data = res.data.data;
					console.log(res.data.msg[0].acy_name)
					if(data != ''){
						var img = [];
						for(var x = 0; x < data.length; x++){

							img.push({
								"src": data[x].a_url,
								"href": 'https://www.baidu.com',
								"info": '图片'
							})
						}
						this.imgsArr = this.imgsArr.concat(img);
						this.group += 25;
						this.name = res.data.msg[0].acy_name;
					}else{
						this.isFirstLoad = false;
					}
				})
			}
		}

	};
</script>
<style scoped>
	@import '../../static/css/albumDetail.css'
</style>