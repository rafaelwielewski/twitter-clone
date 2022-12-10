<template>
  <div id="tweets">
    <div class="px-5 py-3 border-b border-lighter flex items-center justify-between">
      <h1 class="text-xl font-bold">Home</h1>
      <button class="far fa-star text-xl text-blue"></button>
    </div>
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
    <div class="flex flex-col-reverse">
      <div v-for="(tweet, index) in list" :key="index" class="w-full p-4 border-b hover:bg-lighter flex">
        <div class="flex-none mr-4">
          <img :src="tweet.profileImg" class="h-12 w-12 rounded-full flex-none" />
        </div>
        <div class="w-full">
          <div class="flex items-center w-full">
            <p class="font-semibold"> {{ tweet.desname }} </p>
            <p class="text-sm text-dark ml-2"> @{{ tweet.deslogin }} </p>
            <p class="text-sm text-dark ml-2"> {{ tweet.dtregister }} </p>
            <button class="fas fa-angle-down text-dark ml-auto"></button>
          </div>
          <p class="py-2">
            {{ tweet.destweet }}
          </p>
          <div class="flex items-center justify-between w-full">
            <div class="flex items-center text-sm text-dark">
              <button class="far fa-comment mr-3"></button>
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
    <label>File
      <input type="file" id="file" ref="file" v-on:change="onChangeFileUpload()" />
    </label>
    <button v-on:click="submitForm()">Upload</button>
  </div>
</template>
  
<script>

import ToggleFavorite from "@/components/like/ToggleFavorite.vue";

export default {
  name: 'tweets',
  components: {
    ToggleFavorite,
  },
  data() {
    return {
      msg: 'TESTEEEE',
      sendCheckLike: 'hjkhkj',
      loko: 'jkhk',
      userid: sessionStorage.getItem("iduser"),
      username: sessionStorage.getItem("username"),
      formFields: {
        username: sessionStorage.getItem("username"),
        file: null,
      },
      list: [],
      profileImg: '',
      profileImgTweet: '',
      dropdown: false,

      tweet: { text: '' },

    }
  },

  mounted: function () {
    this.getTweetlist()
    this.getProfileImg()
  },

  methods: {

    async onChangeFileUpload() {
      this.formFields.file = this.$refs.file.files[0]
    },

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

    async submitForm() {
      let formData = new FormData();

      formData.append('file', this.formFields.file);
      formData.append('username', this.formFields.username);
      await http.post("/post-profileimg",
        formData,
        {
          headers: {
            //'Content-Type': "multipart/form-data"
          }
        }

      ).then(function (data) {
        console.log(data.data);
      })
        .catch(function () {
          console.log('FAILURE!!');
        });
    },

    async getProfileImg() {

      try {
        const { data } = await http.post("/get-profileimg", {
          username: this.username,
        });

        sessionStorage.setItem('profileImg', data);

        this.profileImg = data;

      } catch (error) {
        console.log(error);
      }
    },

    async addTweet() {

      try {
        const { data } = await http.post("/post-tweet", {
          text: this.tweet.text,
          iduser: sessionStorage.getItem("iduser"),
          name: sessionStorage.getItem("name"),
          username: sessionStorage.getItem("username")
        });
        this.tweet.text = '';
        this.getTweetlist();
        console.log(data);

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

.likecount {
  display: flex;
}
.likecount2 {
  margin-left: 10px;
}


</style>