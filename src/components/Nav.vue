<template>
    <nav class="navbar-fixed-top" v-if="$store.state.common.nav">
      <div class="container">
          <div class="navbar-header">
            <a class="navbar-brand" href="#">if love is divine</a>
          </div>
          <ul class="nav-right">
              <li class="active"><router-link to="/Index" active-class="cur" exact>首页</router-link></li>
              <li class="select">
                <router-link to="/Diary" active-class="cur">博客日记 </router-link>
                <ul class="sub">
                    <li>
                        <a href="">观后感</a>
                    </li>
                    <li>
                        <a href="">心得笔记</a>
                    </li>
                </ul>
              </li>
              <li class="select">
                <router-link to="/Music" active-class="cur">音乐</router-link>
                <ul class="sub">
                    <li>
                        <a href="">观后感</a>
                    </li>
                    <li>
                        <a href="">心得笔记</a>
                    </li>
                </ul>
              </li>
              <li class="select">
                <router-link to="/Album" active-class="cur">相册</router-link>
                <ul class="sub">
                  <li v-for="acy in acate" >
                    <router-link :to="{name:'AlbumDetail',params:{id:acy.acy_id}}"> 
                      {{acy.acy_name}}
                    </router-link>
                  </li>
                </ul>
              </li>
              <li>
                <router-link to="/Works" active-class="cur">作品介绍</router-link>
              </li>
              <li>
                <router-link to="/Message" active-class="cur">留言</router-link>
              </li>
              <li>
                <el-dropdown @command="admin">
                  <span class="el-dropdown-link">
                    <img src="/static/images/timg.jpg" width="50"><i class="el-icon-arrow-down el-icon--right"></i>
                  </span>
                  <el-dropdown-menu slot="dropdown">
                    <el-dropdown-item command="PersonalData">个人资料</el-dropdown-item>
                    <el-dropdown-item command="Login">退出</el-dropdown-item>
                  </el-dropdown-menu>
                </el-dropdown>
              </li>
          </ul>


      </div>
    </nav>
</template>

<script>
export default {
  name: 'Nav',
  created(){
    this.$store.dispatch('common/acAlbum',{
      action: 'album',
      parent: 0
    })
  },
  methods:{
    admin(command) {
        if(command == 'Login'){
          window.sessionStorage.setItem('isLogin',500)
          window.sessionStorage.setItem('level',null)
          this.$router.push({name:command})
        }else{
          this.$router.push({name:command})

        }
      },
  },
  computed:{
    acate(){
      return this.$store.state.common.acate
    }
  }
};
</script>

<style>
    @import '../../static/css/nav.css'
</style>