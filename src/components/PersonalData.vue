<template>
  <div class="content">
    <div class="tab">
      <h2>个人资料</h2>
      <el-tabs v-model="activeName">
        <el-tab-pane label="基本设置" name="first">
           <el-form ref="form" :rules="rules" :model="form" label-width="80px">
              <el-form-item label="头像上传">
                <el-upload
                  class="avatar-uploader"
                  action=""
                  :show-file-list="false"
                  :on-success="handleAvatarSuccess"
                  :before-upload="beforeAvatarUpload"
                  >
                  <img v-if="form.imageUrl" :src="form.imageUrl" class="avatar">
                  <i v-else class="el-icon-plus avatar-uploader-icon"></i>
                </el-upload>
              </el-form-item>
              <el-form-item label="名称" prop="name">
                <el-col :span="4">
                  <el-input v-model="form.name" width="299"></el-input>
                </el-col>
              </el-form-item>
              <el-form-item label="性别">
                <el-radio-group v-model="form.resource">
                  <el-radio label="男"></el-radio>
                  <el-radio label="女"></el-radio>
                </el-radio-group>
              </el-form-item>
              <el-form-item label="生日">
                <el-col :span="4">
                  <el-date-picker type="date" placeholder="选择日期" v-model="form.date1" style="width: 100%;" format="yyyy 年 MM 月 dd"value-format="timestamp"></el-date-picker>
                </el-col>
              </el-form-item>
              <el-form-item>
                <el-button type="primary" @click="submitForm('form')">保存</el-button>
              </el-form-item>
          </el-form>
        </el-tab-pane>
        <el-tab-pane label="密码管理" name="second">
          <el-form :model="Form2" status-icon :rules="rules2" ref="Form2" label-width="100px" class="demo-ruleForm">
            <el-form-item label="密码" prop="pass">
              <el-input type="password" v-model="Form2.pass" autocomplete="off"></el-input>
            </el-form-item>
            <el-form-item label="确认密码" prop="checkPass">
              <el-input type="password" v-model="Form2.checkPass" autocomplete="off"></el-input>
            </el-form-item>
            <el-form-item>
              <el-button type="primary" @click="submitForm2('Form2')">提交</el-button>
            </el-form-item>
          </el-form>
        </el-tab-pane>
      </el-tabs>
    </div> 
  </div>
</template>

<script>
  
export default {
  name: 'PersonalData',
   data() {
        var validatePass = (rule, value, callback) => {
          if (value === '') {
            callback(new Error('请输入密码'));
          } else {
            if (this.Form2.checkPass !== '') {
              this.$refs.orm2.validateField('checkPass');
            }
            callback();
          }
        };
        var validatePass2 = (rule, value, callback) => {
          if (value === '') {
            callback(new Error('请再次输入密码'));
          } else if (value !== this.Form2.pass) {
            callback(new Error('两次输入密码不一致!'));
          } else {
            callback();
          }
        };
        return {
          
          Form2: {
            pass: '',
            checkPass: ''
          },
          rules2: {
            pass: [
              { validator: validatePass, trigger: 'blur' }
            ],
            checkPass: [
              { validator: validatePass2, trigger: 'blur' }
            ]
          },
          form: {
            name: '',
            date1: '',
            type: [],
            resource: '男',
            imageUrl: ''
          },
          activeName: 'first',
          rules: {
            name: [
              { required: true, message: '请输入活动名称', trigger: 'blur' },
              { min: 3, max: 10, message: '长度在 3 到 10 个字符', trigger: 'blur' }
            ]
          },
        }
    },
    created(){
    this.$store.dispatch('common/acShow')
    },
    methods:{
       handleChange(value) {
          console.log(value);
        },
        submitForm(form) {
          
        },
        handleAvatarSuccess(res, file) {
          this.imageUrl = URL.createObjectURL(file.raw);
        },
        beforeAvatarUpload(file) {
          const isJPG = file.type === 'image/jpeg';
          const isLt2M = file.size / 1024 / 1024 < 2;

          if (!isJPG) {
            this.$message.error('上传头像图片只能是 JPG 格式!');
          }
          if (!isLt2M) {
            this.$message.error('上传头像图片大小不能超过 2MB!');
          }
          return isJPG && isLt2M;
        },
        submitForm2(Form2) {

        },
    }
};
</script>
<style scoped>
  @import '../../static/css/personal_data.css'
</style>
