<template>
  <div class="content">
  	<h2 class="title">留言板</h2>
  	<h3>留言(12)</h3>
  	<ul>
  		<li>
  			<div class="img">
  				<img src="/static/images/timg.jpg">
  			</div>
  			<div class="li_right">
  				<p>
  					<span class="name">
  						某某某
  					</span>
  					<span class="number">
  						第22楼
  					</span>
  				</p>
  				<p class="txt">
  					2018第一个哈哈哈哈哈
  				</p>
  				<p class="time">
  					<span>
  						2018-01-01 23:33
  					</span>
  				</p>
  			</div>
  		</li>
  		<li>
  			<div class="img">
  				<img src="/static/images/timg.jpg">
  			</div>
  			<div class="li_right">
  				<p>
  					<span class="name">
  						某某某
  					</span>
  					<span class="number">
  						第22楼
  					</span>
  				</p>
  				<p class="txt">
  					2018第一个哈哈哈哈哈
  				</p>
  				<p class="time">
  					<span>
  						2018-01-01 23:33
  					</span>
  				</p>
  			</div>
  		</li>
  		<li>
  			<div class="img">
  				<img src="/static/images/timg.jpg">
  			</div>
  			<div class="li_right">
  				<p>
  					<span class="name">
  						某某某
  					</span>
  					<span class="number">
  						第22楼
  					</span>
  				</p>
  				<p class="txt">
  					2018第一个哈哈哈哈哈
  				</p>
  				<p class="time">
  					<span>
  						2018-01-01 23:33
  					</span>
  				</p>
  			</div>
  		</li>
  		<li>
  			<div class="img">
  				<img src="/static/images/timg.jpg">
  			</div>
  			<div class="li_right">
  				<p>
  					<span class="name">
  						某某某
  					</span>
  					<span class="number">
  						第22楼
  					</span>
  				</p>
  				<p class="txt">
  					2018第一个哈哈哈哈哈
  				</p>
  				<p class="time">
  					<span>
  						2018-01-01 23:33
  					</span>
  				</p>
  			</div>
  		</li>
  		<li>
  			<div class="img">
  				<img src="/static/images/timg.jpg">
  			</div>
  			<div class="li_right">
  				<p>
  					<span class="name">
  						某某某
  					</span>
  					<span class="number">
  						第22楼
  					</span>
  				</p>
  				<p class="txt">
  					2018第一个哈哈哈哈哈
  				</p>
  				<p class="time">
  					<span>
  						2018-01-01 23:33
  					</span>
  				</p>
  			</div>
  		</li>
  		<li>
  			<div class="img">
  				<img src="/static/images/timg.jpg">
  			</div>
  			<div class="li_right">
  				<p>
  					<span class="name">
  						某某某
  					</span>
  					<span class="number">
  						第22楼
  					</span>
  				</p>
  				<p class="txt">
  					2018第一个哈哈哈哈哈
  				</p>
  				<p class="time">
  					<span>
  						2018-01-01 23:33
  					</span>
  				</p>
  			</div>
  		</li>
  	</ul>
  </div>
</template>

<script>
export default {
  name: 'Message',
  created(){
    this.$store.dispatch('common/acShow')
  }
};
</script>
<style scoped>
	@import '../../static/css/message.css'
</style>
