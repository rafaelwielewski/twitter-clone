<template>
  <div id="CreateTweet">
    <div class="px-4 border-b-1 border-lighter dark:border-dark flex">
      <div class="flex-none">
        <img :src="`/${profileImg}`" class="flex-none w-12 h-12 mt-12 rounded-full border-1 border-lighter dark:border-black" />
      </div>
      <form v-on:submit.prevent="addReply(sendTweet.idtweet)" class="w-full px-4 mt-3 relative">
        <span> Replying to </span>
        <button class="font-semibold text-blue"> @{{ sendTweet.deslogin }} </button>
        <textarea @input="resize($event)" v-model="reply.text" placeholder="Tweet your reply" class="
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
          Reply
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
  name: 'CreateReply',
  components: {
  },

  props: {
    sendTweet: Array,
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
      reply: { text: '', file: null },

    }
  },

  methods: {

    resize (e) {

      e.target.style.height = 'auto'
      e.target.style.height = `${e.target.scrollHeight}px`

    },

    async onChangeFileUpload() {

      const File = this.$refs.tweetAttachmentInput.files[0]

      this.reply.file = File;

      this.tweetImgPreview = URL.createObjectURL(File);

    },

    async addReply(idtweet) {

      try {

        let formData = new FormData();

        formData.append('file', this.reply.file);
        formData.append('text', this.reply.text);
        formData.append('iduser', this.iduser);
        formData.append('idtweet', idtweet);
        formData.append('name',this.name);
        formData.append('username', this.username);

        const { data } = await http.post("/post-reply", 
        formData,
        {

        });
        this.reply.text = '';
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