<template>
  <div id="tweets">
    <div class="px-5 py-3 border-b border-lighter flex items-center justify-between">
      <h1 class="text-xl font-bold">Home</h1>
      <i class="far fa-star text-xl text-blue"></i>
    </div>
    <div class="px-5 py-3 border-b-8 border-lighter flex">
      <div class="flex-none">
        <img src="https://randomuser.me/api/portraits/men/11.jpg"
          class="flex-none w-12 h-12 rounded-full border border-lighter" />
      </div>
      <form v-on:submit.prevent="addTweet" class="w-full px-4 relative">
        <textarea v-model="tweet.text" placeholder="What's up?" class="mt-3 pb-3 w-full focus:outline-none" />
        <div class="flex items-center">
          <i class="text-lg text-blue mr-4 far fa-image"></i>
          <i class="text-lg text-blue mr-4 fas fa-film"></i>
          <i class="text-lg text-blue mr-4 far fa-chart-bar"></i>
          <i class="text-lg text-blue mr-4 far fa-smile"></i>
        </div>
        <button type="submit"
          class="h-10 px-4 text-white font-semibold bg-blue hover:bg-darkblue focus:outline-none rounded-full absolute bottom-0 right-0">
          Tweet
        </button>
      </form>
    </div>
    <div class="flex flex-col-reverse">
      <div v-for="(tweet, index) in tweetList" :key="index" class="w-full p-4 border-b hover:bg-lighter flex">
        <div class="flex-none mr-4">
          <img src="https://randomuser.me/api/portraits/men/11.jpg" class="h-12 w-12 rounded-full flex-none" />
        </div>
        <div class="w-full">
          <div class="flex items-center w-full">
            <p class="font-semibold"> Kriss Kawa </p>
            <p class="text-sm text-dark ml-2"> @kriss </p>
            <p class="text-sm text-dark ml-2"> 2 sec </p>
            <i class="fas fa-angle-down text-dark ml-auto"></i>
          </div>
          <p class="py-2">
            {{ tweet.text }}
          </p>
          <div class="flex items-center justify-between w-full">
            <div class="flex items-center text-sm text-dark">
              <i class="far fa-comment mr-3"></i>
              <p> 1 </p>
            </div>
            <div class="flex items-center text-sm text-dark">
              <i class="fas fa-retweet mr-3"></i>
              <p> 0 </p>
            </div>
            <div class="flex items-center text-sm text-dark">
              <i class="fas fa-heart mr-3"></i>
              <p> 2 </p>
            </div>
            <div class="flex items-center text-sm text-dark">
              <i class="fas fa-share-square mr-3"></i>
            </div>
          </div>
        </div>
      </div>
      <div v-for="(follow, index) in following" :key="index" class="w-full p-4 border-b hover:bg-lighter flex">
        <div class="flex-none mr-4">
          <img :src="`${follow.src}`" class="h-12 w-12 rounded-full flex-none" />
        </div>
        <div class="w-full">
          <div class="flex items-center w-full">
            <p class="font-semibold"> {{ follow.name }} </p>
            <p class="text-sm text-dark ml-2"> {{ follow.handle }} </p>
            <p class="text-sm text-dark ml-2"> {{ follow.time }} </p>
            <i class="fas fa-angle-down text-dark ml-auto"></i>
          </div>
          <p class="py-2">
            {{ follow.tweet }}
          </p>
          <div class="flex items-center justify-between w-full">
            <div class="flex items-center text-sm text-dark">
              <i class="far fa-comment mr-3"></i>
              <p> {{ follow.comments }} </p>
            </div>
            <div class="flex items-center text-sm text-dark">
              <i class="fas fa-retweet mr-3"></i>
              <p> {{ follow.retweets }} </p>
            </div>
            <div class="flex items-center text-sm text-dark">
              <i class="fas fa-heart mr-3"></i>
              <p> {{ follow.like }} </p>
            </div>
            <div class="flex items-center text-sm text-dark">
              <i class="fas fa-share-square mr-3"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
  
<script>
export default {
  name: 'tweets',
  components: {
  },
  data() {

    return {
      dropdown: false,
      tweetList: [
        { text: 'Why am I a nerd!' }
      ],
      tweet: { text: '' },
      following: [
        { src: 'https://randomuser.me/api/portraits/women/52.jpg', name: 'Giza Lamo', handle: '@giza', time: '1.2 hr', tweet: 'The very essence of TailWindCSS??', comments: '500', retweets: '250', like: '52,003' },
        { src: 'https://randomuser.me/api/portraits/women/62.jpg', name: 'Doug mama', handle: '@mama', time: '25 min', tweet: 'Should I use Flutter now?', comments: '1000', retweets: '500', like: '70,003' },
        { src: 'https://randomuser.me/api/portraits/men/63.jpg', name: 'Ezy Pzy', handle: '@ezypzy', time: '2.7 hr', tweet: 'Get Ready for the tech revolution', comments: '10,000', retweets: '100,002', like: '200,003' },
      ],

    }
  },
  methods: {
    /*ddTweet () {
      let temp = {
        text: this.tweet.text
      };
      this.tweetList.push(temp)
  this.tweet = {
        text : ""
      }

    }*/
    async addTweet() {

      try {
        const { data } = await http.post("/post-tweets", {
          text: this.tweet.text
        });

        console.log(data);

      } catch (error) {
        console.log(error);
      }
    }

  }
}

  import http from '@/services/http';
  import { useRouter } from 'vue-router';


</script>
  
<style>

</style>