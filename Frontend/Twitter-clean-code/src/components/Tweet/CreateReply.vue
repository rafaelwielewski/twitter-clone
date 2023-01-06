<template>
  <div id="CreateReply">
    <div class="px-5 py-3 border-b border-lighter flex">
      <div class="flex-none py-4">
        <img :src="`/${profileImg}`" class="flex-none w-12 h-12 rounded-full border border-lighter" />
      </div>
      <form v-on:submit.prevent="addReply(sendTweet.idtweet)" class="w-full px-4 relative">
        <span> Replying to </span>
        <button class="font-semibold text-blue"> @{{ sendTweet.deslogin }} </button>
        <textarea v-model="reply.text" placeholder="Tweet your reply" class="mt-3 pb-3 w-full focus:outline-none" />
        <div class="flex items-center">
          <button class="text-lg text-blue mr-4 far fa-image"></button>
          <button class="text-lg text-blue mr-4 fas fa-film"></button>
          <button class="text-lg text-blue mr-4 far fa-chart-bar"></button>
          <button class="text-lg text-blue mr-4 far fa-smile"></button>
        </div>
        <button type="submit"
          class="h-10 px-4 text-white font-semibold bg-blue hover:bg-darkblue focus:outline-none rounded-full absolute bottom-0 right-0">
          Reply
        </button>
      </form>
    </div>
  </div>
</template>
  
<script>


export default {
  name: 'CreateReply',
  components: {
  },

  props: {
    sendTweet: Array,
  },

  data() {
    return {
      iduser: sessionStorage.getItem("iduser"),
      name: sessionStorage.getItem("name"),
      username: sessionStorage.getItem("username"),
      profileImg: sessionStorage.getItem('profileImg'),
      reply: { text: '' },

    }
  },

  methods: {

    async addReply(idtweet) {

      try {
        const { data } = await http.post("/post-reply", {
          text: this.reply.text,
          iduser: this.iduser,
          idtweet: idtweet,
        });
        this.reply.text = '';
        this.$emit("refresh")

      } catch (error) {
        console.log(error);
      }
    },

  }

}


import http from '@/services/http';


</script>

<style>

.likecount {
  display: flex;
}
.likecount2 {
  margin-left: 10px;
}


</style>