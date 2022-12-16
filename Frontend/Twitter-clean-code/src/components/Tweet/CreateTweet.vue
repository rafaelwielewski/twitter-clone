<template>
  <div id="CreateTweet">
    <div class="px-5 py-3 border-b-8 border-lighter flex">
      <div class="flex-none">
        <img :src="profileImg" class="flex-none w-12 h-12 rounded-full border border-lighter" />
      </div>
      <form v-on:submit.prevent="addTweet" class="w-full px-4 relative">
        <textarea v-model="tweet.text" placeholder="What's up?" class="mt-3 pb-3 w-full focus:outline-none" />
        <div class="flex items-center">
          <button class="text-lg text-blue mr-4 far fa-image"></button>
          <button class="text-lg text-blue mr-4 fas fa-film"></button>
          <button class="text-lg text-blue mr-4 far fa-chart-bar"></button>
          <button class="text-lg text-blue mr-4 far fa-smile"></button>
        </div>
        <button type="submit"
          class="h-10 px-4 text-white font-semibold bg-blue hover:bg-darkblue focus:outline-none rounded-full absolute bottom-0 right-0">
          Tweet
        </button>
      </form>
    </div>
  </div>
</template>
  
<script>


export default {
  name: 'CreateTweet',
  components: {
  },
  data() {
    return {
      iduser: sessionStorage.getItem("iduser"),
      name: sessionStorage.getItem("name"),
      username: sessionStorage.getItem("username"),
      profileImg: sessionStorage.getItem('profileImg'),
      tweet: { text: '' },

    }
  },

  methods: {

    async addTweet() {

      try {
        const { data } = await http.post("/post-tweet", {
          text: this.tweet.text,
          iduser: this.iduser,
          name: this.name,
          username: this.username,
        });
        this.tweet.text = '';
        this.$emit("refresh")
        console.log(data);

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