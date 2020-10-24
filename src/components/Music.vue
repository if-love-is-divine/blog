<template>
  	<div class="content">
  		<div class="desc">
  			<p>我喜爱音乐，是因为它承载着我的悲伤，我的欢乐，还有我的青春</p>
  		</div>
  		<div class="blank"></div>
  		<div class="like block">
  			<div class="title">
				<span class="title_left">
					<img src="/static/images/timg.jpg">
				</span>
				<span class="title_right">
					<div class="name">
						<span>
							歌单
						</span>
						常听
					</div>
					<div class="title_desc">
						介绍：动听的音乐就像是飞舞的蝴蝶在空中翩翩起舞，也像是叮咚的泉水在山间流淌，有时候，也像是璀璨的星辰，在夜空用闪烁
					</div>
				</span>
			</div>
			<table class="table">
			  <tr class="head">
				<th width="50">ID</th>
				<th>歌名</th>
				<th width="200">歌手</th>
				<th width="100">播放下载</th>
			  </tr>
			  <tr v-for="(ms,index) in like" class="often">
				<td>{{index+1}}<span class="url">{{ms.ms_url}}</span> <span class="lyric">{{ms.ms_lyric}}</span></td>
				<td class="ms_name">{{ms.ms_name}} </td>
				<td>{{ms.ms_singer}}</td>
				<td>
					<span class="el-icon-caret-right" @click="play(index)"></span>
	                 <span>
	                   <a href="" class="el-icon-download"></a>
	                 </span>
				</td>
			  </tr>
			</table>
  		</div>
  		<div class="sentimental block">
  			<div class="title">
				<span class="title_left">
					<img src="/static/images/timg.jpg">
				</span>
				<span class="title_right">
					<div class="name">
						<span>
							歌单
						</span>
						伤感
					</div>
					<div class="title_desc">
						介绍：这辈子我们需要一见钟情很多人，两情相悦一些人，然后白头偕老一个人。
					</div>
				</span>
			</div>
			<el-table
			    :data="tableData"
			    stripe
			    height="400"
			    style="width: 100%">
			    <el-table-column
			      prop="id"
			      label="ID"
			      width="50%">
			    </el-table-column>
			    <el-table-column
			      prop="name"
			      label="歌名"
			      width="270">
			    </el-table-column>
			    <el-table-column
			      prop="singer"
			      label="歌手"
			      width="130">
			    </el-table-column>
			    <el-table-column
			      label="播放/下载">
			        
			    </el-table-column>
			</el-table>
  		</div>
  		<p class="blank"></p>
  		<div class="catharsis block">
  			<div class="title">
				<span class="title_left">
					<img src="/static/images/timg.jpg">
				</span>
				<span class="title_right">
					<div class="name">
						<span>
							歌单
						</span>
						宣泄
					</div>
					<div class="title_desc">
						介绍：生活里，大部分人在吵架的时候，不是想解决问题，表达观点，只不过是在发泄情绪而已。
					</div>
				</span>
			</div>

			<el-table
			    :data="tableData"
			    stripe
			    height="400"
			    style="width: 100%">
			    <el-table-column
			      prop="id"
			      label="ID"
			      width="50%">
			    </el-table-column>
			    <el-table-column
			      prop="name"
			      label="歌名"
			      width="270">
			    </el-table-column>
			    <el-table-column
			      prop="singer"
			      label="歌手"
			      width="130">
			    </el-table-column>
			    <el-table-column
			      label="播放/下载">
			        <span>
	                   <a href="" class="el-icon-caret-right"></a>
	                 </span>
	                 <span>
	                   <a href="" class="el-icon-download"></a>
	                 </span>
			    </el-table-column>
			</el-table>
  		</div>
  		<div class="happy block">
  			<div class="title">
				<span class="title_left">
					<img src="/static/images/timg.jpg">
				</span>
				<span class="title_right">
					<div class="name">
						<span>
							歌单
						</span>
						欢乐
					</div>
					<div class="title_desc">
						介绍：在最美的年纪，做最好的自己，阳光雨露将与我同在，欢乐与微笑将与我并行。
					</div>
				</span>
			</div>

			<el-table
			    :data="tableData"
			    stripe
			    height="400"
			    style="width: 100%">
			    <el-table-column
			      prop="id"
			      label="ID"
			      width="50%">
			    </el-table-column>
			    <el-table-column
			      prop="name"
			      label="歌名"
			      width="270">
			    </el-table-column>
			    <el-table-column
			      prop="singer"
			      label="歌手"
			      width="130">
			    </el-table-column>
			    <el-table-column
			      label="播放/下载">
			        <span>
	                   <a href="" class="el-icon-caret-right"></a>
	                 </span>
	                 <span>
	                   <a href="" class="el-icon-download"></a>
	                 </span>
			    </el-table-column>
			</el-table>
  		</div>
  		<p class="blank"></p>
  		<div class="emptiness block">
  			<div class="title">
				<span class="title_left">
					<img src="/static/images/timg.jpg">
				</span>
				<span class="title_right">
					<div class="name">
						<span>
							歌单
						</span>
						空灵
					</div>
					<div class="title_desc">
						介绍：我赤手空拳来到人世间，为找到那片海不顾一切。
					</div>
				</span>
			</div>

			<el-table
			    :data="tableData"
			    stripe
			    height="400"
			    style="width: 100%">
			    <el-table-column
			      prop="id"
			      label="ID"
			      width="50%">
			    </el-table-column>
			    <el-table-column
			      prop="name"
			      label="歌名"
			      width="270">
			    </el-table-column>
			    <el-table-column
			      prop="singer"
			      label="歌手"
			      width="130">
			    </el-table-column>
			    <el-table-column
			      label="播放/下载">
			        <span>
	                   <a href="" class="el-icon-caret-right"></a>
	                 </span>
	                 <span>
	                   <a href="" class="el-icon-download"></a>
	                 </span>
			    </el-table-column>
			</el-table>
  		</div>
  		<div class="blank"></div>
  		<div class="music" v-if="isShow">
	  		<div class="lock" @click="lock()">
	  			<img src="../assets/images/lock.png" alt="" class="img1">
	  			<img src="../assets/images/lock_click.png" alt="" class="img2">
	  		</div>
			<aplayer
				autoplay
		    	showLrc
		    	listFolded
		    	:list="list" 
		    	:music="ss"
		    	>
		    	
	    	</aplayer>
  		</div>
  	</div>
  	
</template>

<script>
import aplayer  from 'vue-aplayer'
import axios from 'axios'
const root = process.env.API_ROOT;
export default {
	name: 'Music',
	components:{
		aplayer
	},
	data() {
      return {
      	ss: {},
      	list: [],
      	isShow: false,
        tableData: [{
          id: '2016-05-02',
          name: '王小虎',
          singer: '上海市普陀区金沙江路 1518 弄'
        }, {
          id: '2016-05-04',
          name: '王小虎',
          singer: '上海市普陀区金沙江路 1517 弄'
        }, {
          id: '2016-05-01',
          name: '王小虎',
          singer: '上海市普陀区金沙江路 1519 弄'
        }, {
          id: '2016-05-03',
          name: '王小虎',
          singer: '上海市普陀区金沙江路 1516 弄'
        }]
      }
    },
	created(){
		this.$store.dispatch('common/acShow');
		this.$store.dispatch('music/acMusic');
		
	},
	methods:{
		lock(){
			// console.log(!this.$store.state.music.show)
			if(!this.$store.state.music.show){
				$('.lock .img1').css('display', 'none');
				$('.lock .img2').css('display', 'inline-block');
				$('.music').css('bottom', '1px');
				this.$store.dispatch('music/acShow',true)
			}else{
				$('.lock .img2').css('display', 'none');
				$('.lock .img1').css('display', 'inline-block');
				$('.music').css('bottom', '-93px');
				this.$store.dispatch('music/acShow',false)
			}
		},
		play(index){
			var often = $('.often');
			for(var x = 0; x < often.length; x++){
				if(index == x){
					console.log(often[x].children)
					var ms_name = often[x].children[1].innerHTML;
					var ms_singer = often[x].children[2].innerHTML;
					var ms_url = often[x].children[0].children[0].innerHTML;
					var ms_lyric = often[x].children[0].children[1].innerHTML;
					var data = 
					this.ss = {
						title: ms_name,
						artist: ms_singer,
						url: ms_url,
						lri: ms_lyric
					}
					this.list.push(obj);
					this.isShow = true;
					setTimeout(function(){
						
					},100);
					
				}
			}
		}
  	},
  	computed:{
  		like(){
			return this.$store.state.music.music;
		}
  	}
};
</script>
<style scoped>
	@import '../../static/css/music.css'
</style>
