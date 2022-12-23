<template>
  <div id="Tweet">
    <div class="flex flex-col-reverse">
      <div v-for="(tweet, index) in sendTweet" :key="index" class="w-full p-4 border hover:bg-lighter flex">
        <div class="flex-none mr-4 cursor-pointer">
          <img :src="tweet.profileImg" class="h-12 w-12 rounded-full flex-none" />
        </div>
        <div class="w-full">
          <div class="flex items-center w-full cursor-pointer">
            <p class="text-base font-semibold hover:underline" @click="router.push(tweet.deslogin)"> {{ tweet.desname }}
            </p>
            <p class="text-base text-dark ml-2 hover:underline" @click="router.push(tweet.deslogin)"> @{{ tweet.deslogin
            }} </p>
            <p class="text-sm text-dark ml-2 hover:underline"> {{ tweet.dtregister }} </p>
            <button @click="router.push(`/${tweet.deslogin}/status/${tweet.idtweet}`)"
              class="fas fa-angle-down text-dark ml-auto"></button>
          </div>
          <p class="py-2 text-base">
            {{ tweet.destweet }}
          </p>
          <img v-if="tweet.fileurl" :src="tweet.fileurl" class="object-cover w-full h-auto rounded-lg mb-2" />
          <div class="flex items-center justify-between w-full ">
            <div class="flex items-center text-sm text-dark">
              <button @click="router.push(`/${tweet.deslogin}/status/${tweet.idtweet}`)"
                class="far fa-comment mr-3"></button>
              <p> {{ tweet.desreplies }} </p>
            </div>
            <div class="flex items-center text-sm text-dark">
              <button class="fas fa-retweet mr-3"></button>
              <p> {{ tweet.desretweets }} </p>
            </div>
            <div class="flex items-center text-sm text-dark">
              <button class="likecount" @click="likeTweet(tweet.idtweet, index)">
                <ToggleFavorite :sendIdtweet=tweet.idtweet :sendUserid=userid></ToggleFavorite>
              </button>
              <p class="likecount2">{{ tweet.deslikes }}</p>
            </div>
            <div class="flex items-center text-sm text-dark">
              <button class="fas fa-share-square mr-3"></button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
  

<script setup>

import ToggleFavorite from "@/components/like/ToggleFavorite.vue";
import { useRouter } from "vue-router";
import http from '@/services/http';

const router = useRouter();

</script>

<script>

export default {
  name: 'Tweet',
  components: {
    ToggleFavorite,
  },

  props: {
    sendTweet: String,
  },

  data() {
    return {
      userid: sessionStorage.getItem("iduser"),
    }
  },

  mounted: function () {

  },

  methods: {


    async likeTweet($idtweet, $index) {

      try {
        const { data } = await http.post("/post-liketweet", {
          idtweet: $idtweet,
          userid: this.userid,

        });
        this.sendTweet[$index].deslikes = data

      } catch (error) {
        console.log(error);
      }
    },
  }
}

</script>

<style>

</style>