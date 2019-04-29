<template>
  <div>
  
  </div>
</template>

<script>
import vueAplayer  from 'vue-aplayer'
export default {
  name: 'Aplayer',
  created(){
    this.$store.dispatch('common/acShow')
  },
  components:{
  	vueAplayer 
  }
};
</script>

