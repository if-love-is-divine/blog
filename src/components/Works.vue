<template>
  <div class="content">
  	<h2 class="title">作品介绍</h2>
  	<ul>
  		<li>
  			<div class="img">
  				<img src="/static/images/timg.jpg">
  			</div>
  			<div class="desc">
  				<p>项目名：blog</p>
  				<p>所用技术：HTML5、CSS3、	VUE、VUEX、element-ui</p>
  				<p>项目介绍：阿斯达四大所大阿斯达四大所大阿斯达四大所大阿斯达四大所大阿斯达四大所大阿斯达四大所大阿斯达四大所大阿斯达四大所大阿斯达四大所大阿斯达四大所大阿斯达四大所大阿斯达四大所大阿斯达四大所大</p>
  			</div>
  		</li>
  		<li>
  			<div class="img">
  				<img src="/static/images/timg.jpg">
  			</div>
  			<div class="desc">
  				<p>项目名：blog</p>
  				<p>所用技术：HTML5、CSS3、	VUE、VUEX、element-ui</p>
  				<p>项目介绍：阿斯达四大所大阿斯达四大所大阿斯达四大所大阿斯达四大所大阿斯达四大所大阿斯达四大所大阿斯达四大所大阿斯达四大所大阿斯达四大所大阿斯达四大所大阿斯达四大所大阿斯达四大所大阿斯达四大所大</p>
  			</div>
  		</li>
  		<li>
  			<div class="img">
  				<img src="/static/images/timg.jpg">
  			</div>
  			<div class="desc">
  				<p>项目名：blog</p>
  				<p>所用技术：HTML5、CSS3、	VUE、VUEX、element-ui</p>
  				<p>项目介绍：阿斯达四大所大阿斯达四大所大阿斯达四大所大阿斯达四大所大阿斯达四大所大阿斯达四大所大阿斯达四大所大阿斯达四大所大阿斯达四大所大阿斯达四大所大阿斯达四大所大阿斯达四大所大阿斯达四大所大</p>
  			</div>
  		</li>
  		<li>
  			<div class="img">
  				<img src="/static/images/timg.jpg">
  			</div>
  			<div class="desc">
  				<p>项目名：blog</p>
  				<p>所用技术：HTML5、CSS3、	VUE、VUEX、element-ui</p>
  				<p>项目介绍：阿斯达四大所大阿斯达四大所大阿斯达四大所大阿斯达四大所大阿斯达四大所大阿斯达四大所大阿斯达四大所大阿斯达四大所大阿斯达四大所大阿斯达四大所大阿斯达四大所大阿斯达四大所大阿斯达四大所大</p>
  			</div>
  		</li>
  	</ul>
  	<div class="blank"></div>
  </div>
</template>

<script>
export default {
  name: 'Works',
  created(){
    this.$store.dispatch('common/acShow')
  }
};
</script>
<style scoped>
	@import '../../static/css/works.css'
</style>
