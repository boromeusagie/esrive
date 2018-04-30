<template>
  <div>
    <div v-if="!viewimage">
      <img :src="userImg" class="img-circle img-responsive userimg profile-circle">
      <br>
      <button @click="viewCropped" class="m-t-20 btn btn-sm btn-outline-info">Ganti Foto</button>
    </div>
    <div v-else>
      <vue-avatar
          :width=200
          :height=200
          ref="vueavatar"
          @vue-avatar-editor:image-ready="onImageReady"
          image=""
        >
        </vue-avatar>
        <span class="help-block text-muted">Drag foto untuk mengatur</span>
        <br>
        <br>
        <vue-avatar-scale
          ref="vueavatarscale"
          @vue-avatar-editor-scale:change-scale="onChangeScale"
          :width=200
          :min=1
          :max=3
          :step=0.02
        >
        </vue-avatar-scale>
        <br>
        <div class="m-t-10">
          <button @click="viewImage" class="btn-sm btn btn-danger">Cancel</button>
          <button v-on:click="saveClicked" class="btn btn-sm btn-success">Upload</button>
        </div>
    </div>
  </div>
</template>

<script>
  import Vue from 'vue'
  import VueAvatar from './vue-avatar-editor/VueAvatar.vue'
  import VueAvatarScale from './vue-avatar-editor/VueAvatarScale.vue'

  export default {
    components: {
      VueAvatar,
      VueAvatarScale
    },
    props: ['user'],
    data() {
      return {
        userImg: `../storage/user/${this.user.username}/img/${this.user.user_img}`,
        croppedImage: null,
        viewimage: false,
        file: null,
        image: null
      }
    },
    methods:{
      viewCropped() {
        this.viewimage = true
      },
      onChangeScale (scale) {
          this.$refs.vueavatar.changeScale(scale)
      },
      saveClicked(){
        var img = this.$refs.vueavatar.getImageScaled()
        this.croppedImage = img.toDataURL()
        let image = this.croppedImage
        let form = new FormData()
        form.append('image', image)
        this.file = form

        axios.post('/user/upload-profile', this.file)
          .then(res =>
            this.$toasted.show('Foto Profile berhasil disimpan.', {
              type: 'success',
              theme: 'bubble',
              duration: 5000,
              position: 'top-center'
            })
          )
        this.userImg = this.croppedImage
        this.viewimage = false
      },
      onImageReady(scale){
        this.$refs.vueavatarscale.setScale(scale)
      },
      viewImage(){
        this.viewimage = false
      }
    }
  }
</script>

<style lang="css">
</style>
