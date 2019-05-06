<template>
	<div class="content">
		<h2>猫</h2>
		<div class="imgs">
			<vue-waterfall-easy :imgsArr="imgsArr" @scrollReachBottom="getData" :height="1000" :maxCols="9" :width="800"></vue-waterfall-easy>
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
			}
		},
		created(){
			console.log(this.$props.id)
			this.getData()
		},
		components:{
			vueWaterfallEasy
		},
		methods:{
			getData(){
				var group = this.group;
				var id = this.$props.id;
				console.log(id)
				axios.get(`${root}api/albumdetail.php?group=${group}&id=${id}`).then(res =>{
					var data = res.data.data;
					var img = [];
					for(var x = 0; x < data.length; x++){

						img.push({
							"src": data[x].a_url,
							"href": 'https://www.baidu.com',
							"info": '图片'
						})
					}
					this.imgsArr = this.imgsArr.concat(img);
					this.group++;
				})
			}
		}

	};
</script>
<style scoped>
	@import '../../static/css/albumDetail.css'
</style>