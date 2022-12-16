<template>
  <div id="Tweet">
    <div class="flex flex-col-reverse">
      <div v-for="(tweet, index) in list" :key="index" class="w-full p-4 border-b hover:bg-lighter flex">
          <div class="flex-none mr-4">
            <img :src="tweet.profileImg" class="h-12 w-12 rounded-full flex-none" />
          </div>
          <div class="w-full">
            <div class="flex items-center w-full">
              <p class="font-semibold hover:underline"> {{ tweet.desname }} </p>
              <p class="text-sm text-dark ml-2 hover:underline"> @{{ tweet.deslogin }} </p>
              <p class="text-sm text-dark ml-2 hover:underline"> {{ tweet.dtregister }} </p>
              <button @click="router.push(`/${tweet.deslogin}/status/${tweet.idtweet}`)" class="fas fa-angle-down text-dark ml-auto"></button>
            </div>
            <p class="py-2">
              {{ tweet.destweet }}
            </p>
            <div class="flex items-center justify-between w-full">
              <div class="flex items-center text-sm text-dark">
                <button @click="router.push(`/${tweet.deslogin}/status/${tweet.idtweet}`)" class="far fa-comment mr-3"></button>
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
const router = useRouter();

</script>

<script>

export default {
  name: 'Tweet',
  components: {
    ToggleFavorite,
  },
  data() {
    return {
      userid: sessionStorage.getItem("iduser"),
      list: [],
    }
  },

  mounted: function () {
    this.getTweetlist()
  },

  methods: {


    async likeTweet($idtweet, $index) {

      try {
        const { data } = await http.post("/post-liketweet", {
          idtweet: $idtweet,
          userid: this.userid,

        });
        this.list[$index].deslikes = data

      } catch (error) {
        console.log(error);
      }
    },

    async getTweetlist() {

      try {
        const { data } = await http.get("/get-tweets", {
        });

        this.list = data



      } catch (error) {
        console.log(error);
      }
    },
    async getTweet($idtweet, $index) {

      try {
        const { data } = await http.get("/get-tweet", {
          idtweet: $idtweet,
        });
        console.log('recarregado');
        //this.list = data



      } catch (error) {
        console.log(error);
      }
    },

  }

}


import http from '@/services/http';


</script>

<style>

</style>