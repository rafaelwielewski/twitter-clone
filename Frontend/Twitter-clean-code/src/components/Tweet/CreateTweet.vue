<template>
  <div id="CreateTweet">
    <div class="px-4 border-b-1 border-lighter dark:border-dark flex">
      <div class="flex-none">
        <img :src="profileImg" class="flex-none w-12 h-12 mt-3 rounded-full border-1 border-lighter dark:border-black" />
      </div>
      <form v-on:submit.prevent="addTweet" class="w-full px-4 relative">
        <textarea @input="resize($event)" v-model="tweet.text" placeholder="What's Happening?" class="
        text-xl mt-3 pb-3 w-full breakwords border-none resize-none	
        focus:ring-0
        dark:text-lightest dark:bg-black
        ">
      </textarea>
        <img
            v-if="tweetImgPreview"
            :src="tweetImgPreview"
            class="object-cover w-full h-96 rounded-lg"
          />
        <div class="flex items-center pb-4">
          <button @click.prevent="tweetAttachmentInput.click" type="button" class="text-lg text-blue mr-4 far fa-image">
          </button>
          <input class="hidden" ref="tweetAttachmentInput" type="file" id="file" v-on:change="onChangeFileUpload()" />
          <button type="button" class="text-lg text-blue mr-4 fas fa-film"></button>
          <button type="button" class="text-lg text-blue mr-4 far fa-chart-bar"></button>
          <button type="button" class="text-lg text-blue mr-4 far fa-smile"></button>
          <button type="submit"
          class="h-10 px-4 text-white font-semibold bg-blue hover:bg-darkblue focus:outline-none rounded-full absolute right-0">
          Tweet
        </button>
        </div>
      </form>
    </div>
  </div>
</template>
  
<script setup>

import ResizeTextArea from '@/utils/resizetextarea.vue'
import http from '../../services/http'
import { defineComponent, ref, computed } from 'vue'


</script>


<script>

const tweetAttachmentInput = ref(HTMLInputElement)


export default {
  name: 'CreateTweet',
  components: {
  },


  data() {
    return {
      placeholder: "This is a test message",
      textValue: "reSize",
      tweetImgPreview: '',
      iduser: sessionStorage.getItem("iduser"),
      name: sessionStorage.getItem("name"),
      username: sessionStorage.getItem("username"),
      profileImg: sessionStorage.getItem('profileImg'),
      tweet: { text: '', file: null },

    }
  },

  methods: {

    resize (e) {

      e.target.style.height = 'auto'
      e.target.style.height = `${e.target.scrollHeight}px`

    },

    async onChangeFileUpload() {

      const File = this.$refs.tweetAttachmentInput.files[0]

      this.tweet.file = File;

      this.tweetImgPreview = URL.createObjectURL(File);

    },

    async addTweet() {

      try {

        let formData = new FormData();

        formData.append('file', this.tweet.file);
        formData.append('text', this.tweet.text);
        formData.append('iduser', this.iduser);
        formData.append('name',this.name);
        formData.append('username', this.username);

        const { data } = await http.post("/post-tweet", 
        formData,
        {

        });
        this.tweet.text = '';
        this.tweetImgPreview =  '',
        this.$emit("refresh")


      } catch (error) {
        console.log(error);
      }
    },

  }

}

</script>

<style>

.likecount {
  display: flex;
}
.likecount2 {
  margin-left: 10px;
}


</style>