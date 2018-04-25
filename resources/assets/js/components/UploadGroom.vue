<template>
  <div>
    <div v-if="!viewimage">
      <img :src="groomImg" class="img-circle img-responsive">
      <br>
      <button @click="viewCropped" class="m-t-20 btn btn-sm btn-outline-info">Ganti Foto</button>
    </div>
    <div v-else>
      <vue-avatar
          :width=150
          :height=150
          ref="vueavatar"
          @vue-avatar-editor:image-ready="onImageReady"
          image=""
        >
        </vue-avatar>
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
        <button @click="viewImage" class="m-t-10">Cancel</button>
        <br>
        <button v-on:click="saveClicked" class="btn btn-outline-info m-t-10">Upload</button>
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
    props: ['user', 'wedding'],
    data() {
      return {
        groomImg: `../storage/user/${this.user.username}/img/${this.wedding.groom_pic}`,
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
        form.append('image', $('input[type=file]')[0].files[0])
        this.file = form
        axios.post('/user/groom-pic', this.file)
        this.groomImg = this.croppedImage
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
