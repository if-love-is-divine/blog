<template>
  <section class="content">
  	<div class="hometitle">
		相册
	</div>
	<ul>
		<li v-for="a in ac">
			<a href="">
				<div class="imgbox">
					<img :src="a.acy_url">
					<span>
						<i></i>
						{{a.number}}
					</span>
				</div>
				<p>{{a.acy_name}}</p>
			</a>
		</li>
	</ul>
	<div class="blank"></div>
  </section>
</template>

<script>
export default {
  name: 'Album',
  created(){
  	let level = window.sessionStorage.getItem('level')
  	this.$store.dispatch('album/acAlbum',level)
    this.$store.dispatch('common/acShow')
  },
  computed:{
  	ac(){
  		return this.$store.state.album.album;
  	}
  }
};
</script>
<style scoped>
	@import '../../static/css/album.css'
</style>

