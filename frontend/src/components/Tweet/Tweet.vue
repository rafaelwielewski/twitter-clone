<template>
  <div id="Tweet">
    <div class="flex flex-col-reverse">
      <div
        class="w-full p-4 border-b-1 border-lighter dark:border-dark hover:bg-lighter dark:hover:bg-darkest flex hover:cursor-pointer"
        @click="router.push(`/${sendTweet.deslogin}/status/${sendTweet.idtweet}`)">
        <div @click.stop="router.push(sendTweet.deslogin)" class="flex-none mr-4 ">
          <img :src="`/${sendTweet.profileImg}`" class="h-12 w-12 rounded-full flex-none hover:border-1.
            " />
        </div>

        <div class="w-full">
          <div class="flex items-center w-full cursor-pointer">
            <p class="text-base dark:text-lightest font-semibold hover:underline"
              @click.stop="router.push(sendTweet.deslogin)"> {{ sendTweet.desname }}
            </p>
            <p class="text-base dark:text-gray ml-2 hover:underline" @click.stop="router.push(sendTweet.deslogin)"> @{{
              sendTweet.deslogin
            }} </p>
            <p class="text-base dark:text-gray ml-2">·</p>
            <p class="text-sm ml-2 dark:text-gray hover:underline"> {{ parseTwitterDate() }}</p>
            <button @click.stop=""
              class="ml-auto py-1 px-2 dark:text-gray hover:text-blue hover:cursor-pointer hover:bg-blue dark:hover:text-blue hover:bg-opacity-20 rounded-full">
              <IconEllipsisH :size="18" class="" />
            </button>
          </div>
          <p class="py-2 text-base dark:text-lightest" v-html="`${tweetContent}`"></p>
          <img v-if="sendTweet.fileurl" :src="`/${sendTweet.fileurl}`"
            class="object-cover w-full h-auto rounded-lg mb-2 border-1 dark:border-dark" />
          <div class="flex items-center justify-between w-full ">
            <div @click.stop="router.push(`/${sendTweet.deslogin}/status/${sendTweet.idtweet}`)"
              class="flex items-center text-sm py-1 px-2.5 dark:text-gray hover:text-blue dark:hover:text-blue hover:cursor-pointer hover:bg-blue hover:bg-opacity-20 rounded-full">
              <button class="far fa-comment mr-3"></button>
              <p> {{ sendTweet.desreplies }} </p>
            </div>
            <div @click.stop=""
              class="flex items-center text-sm py-1 px-2.5 dark:text-gray hover:text-green dark:hover:text-green hover:cursor-pointer hover:bg-green hover:bg-opacity-20 rounded-full">
              <button class="fas fa-retweet mr-3"></button>
              <p> {{ sendTweet.desretweets }} </p>
            </div>
            <button @click.stop=""
              class="flex items-center text-sm py-1 px-2.5 dark:text-gray hover:text-danger dark:hover:text-danger hover:cursor-pointer hover:bg-danger hover:bg-opacity-20 rounded-full">
              <ToggleFavorite @click.stop="likeTweet(sendTweet.idtweet)" :sendIdtweet=sendTweet.idtweet
                :sendUserid=userid></ToggleFavorite>
              <p class="likecount2">{{ sendTweet.deslikes }}</p>
            </button>
            <div
              class="flex items-center text-sm py-1 px-1 dark:text-gray hover:text-blue hover:cursor-pointer hover:bg-blue hover:bg-opacity-20 rounded-full">
              <button class="fas fa-share-square mr-3"></button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
  

<script setup>

import IconEllipsisH from '../../icons/IconEllipsisH.vue'
import ToggleFavorite from "../../components/like/ToggleFavorite.vue";
import { useRouter } from "vue-router";
import http from '../../services/http';
import { linkifyHTMLText } from '../../utils/linkify'


const router = useRouter();

</script>

<script>

export default {
  name: 'Tweet',
  components: {
    ToggleFavorite,
  },

  props: {
    sendTweet: Object,
  },

  data() {
    return {
      userid: sessionStorage.getItem("iduser"),
      tweetContent: linkifyHTMLText(this.sendTweet.destweet)
    }
  },
  computed: {


  },
  mounted: function () {


  },


  methods: {


    async likeTweet($idtweet) {

      try {

        const { data } = await http.post("/post-liketweet", {
          idtweet: $idtweet,
          userid: this.userid,

        });

        this.sendTweet.deslikes = data

      } catch (error) {
        console.log(error);
      }
    },

    parseTwitterDate() {

      console.log('começo');

      let tdate = this.sendTweet.dtregister
      var longdate = new Date(tdate).toLocaleDateString('en-us', { year: "numeric", month: "short", day: "numeric" })
      var systemDate = new Date(Date.parse(tdate));
      var userDate = new Date();
      var diff = Math.floor((userDate - systemDate) / 1000);
      if (diff <= 1) { return 'just now'; }
      if (diff < 20) { return diff + ' seconds ago'; }
      if (diff < 40) { return 'half a minute ago'; }
      if (diff < 60) { return 'less than a minute ago'; }
      if (diff <= 90) { return 'one minute ago'; }
      if (diff <= 3540) { return Math.round(diff / 60) + ' minutes ago'; }
      if (diff <= 5400) { return '1 hour ago'; }
      if (diff <= 86400) { return Math.round(diff / 3600) + ' hours ago'; }
      if (diff <= 129600) { return '1 day ago'; }
      if (diff < 604800) { return Math.round(diff / 86400) + ' days ago'; }
      if (diff <= 777600) { return '1 week ago'; }
      return longdate;


    },
  }
}

</script>

<style></style>