<template>
  <main>
    <div id="TweetDialog" class="flex container h-screen w-full">
      <div class="lg:w-1/5 border-r border-lighter px-2 lg:px-6 py-2 flex flex-col justify-between">
        <Sidebar />
      </div>
      <div class="w-full md:w-1/2 h-full overflow-y-scroll">
        <NavBar />
        <Tweet :sendTweet =tweet />
        <CreateReply :sendTweet =tweet @refresh="getReply"/>
        <Reply :sendReply =reply />
      </div>
      <div class="md:block hidden w-1/3 h-full border-l border-lighter py-2 px-6 overflow-y-scroll relative">
        <Trending />
      </div>
    </div>
  </main>
</template>

<script setup>

import Sidebar from '@/components/Sidebar.vue';
import Trending from '@/components/trending.vue';
import NavBar from '@/components/NavBar.vue';
import Tweet from '@/components/Tweet/Tweet2.vue';
import Reply from '@/components/Tweet/Reply.vue';
import CreateReply from '@/components/Tweet/CreateReply.vue';
import { useRouter } from "vue-router";
import http from '@/services/http';

const router = useRouter();

</script>

<script>

export default {
  name: 'TweetDialog',
  components: {
  },

  data() {
    return {
      tweet: "",
      reply: "",
    }
  },

  mounted: function () {
    this.checkLogin()
    this.getTweet()
    this.getReply()
  },

  methods: {
    async checkLogin() {
      if (sessionStorage.getItem("loggedin") === null) {
        this.$router.push({ path: '/' });
      }
    },

    async getReply() {
      try {
        const { data } = await http.post("/get-replies", {
          idtweet: this.$route.params.id,
        });
        console.log(data);
        this.reply = data



      } catch (error) {
        console.log(error);
      }
    },

    async getTweet() {

      try {
        const { data } = await http.post("/get-onetweet", {
          idtweet: this.$route.params.id,
        });
        this.tweet = data
        console.log(data);



      } catch (error) {
        console.log(error);
      }
    },
  },
}

</script>

<style>

</style>