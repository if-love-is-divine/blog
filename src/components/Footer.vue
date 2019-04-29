<template>
	<footer v-if="$store.state.common.footer">
		<p>Design by <router-link to="/">if love is divine个人博客</router-link></p>
		
	</footer>
</template>
<script>
export default{
	name: 'Footer'
};		
	
</script>
<style scoped>
@import '../../static/css/footer.css'
</style>