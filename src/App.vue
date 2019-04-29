<template>
  <div id="app" style="height:100%;">
    <Nav></Nav>
    <router-view/>
    <Footer></Footer>
  </div>
</template>

<script>
import Nav from '@/components/Nav'
import Footer from '@/components/Footer'
export default {
  name: 'App',
  
  components:{
    Nav,
    Footer
  }
}
</script>

