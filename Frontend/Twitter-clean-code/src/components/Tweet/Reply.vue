<template>
  <div id="Reply">
    <div class="flex flex-col-reverse">
      <div v-for="(reply, index) in sendReply" :key="index" class="w-full p-4 border hover:bg-lighter flex">
          <div class="flex-none mr-4">
            <img :src="reply.profileImg" class="h-12 w-12 rounded-full flex-none" />
          </div>
          <div class="w-full">
            <div class="flex items-center w-full">
              <p class="font-semibold hover:underline"> {{ reply.desname }} </p>
              <p class="text-sm text-dark ml-2 hover:underline"> @{{ reply.deslogin }} </p>
              <p class="text-sm text-dark ml-2 hover:underline"> {{ reply.dtregister }} </p>
              <button @click="router.push(`/${reply.deslogin}/status/${reply.idtweet}`)" class="fas fa-angle-down text-dark ml-auto"></button>
            </div>
            <p class="py-2">
              {{ reply.desreply }}
            </p>
            <div class="flex items-center justify-between w-full">
              <div class="flex items-center text-sm text-dark">
                <button @click="router.push(`/${reply.deslogin}/status/${reply.idreply}`)" class="far fa-comment mr-3"></button>
                <p> {{ reply.desreplies }} </p>
              </div>
              <div class="flex items-center text-sm text-dark">
                <button class="fas fa-retweet mr-3"></button>
                <p> {{ reply.desretweets }} </p>
              </div>
              <div class="flex items-center text-sm text-dark">
                <button class="likecount" @click="likeReply(reply.idreply, index)">
                  <ToggleFavoriteReply :sendIdReply=reply.idreply :sendUserid=userid></ToggleFavoriteReply>
                </button>
                <p class="likecount2">{{ reply.deslikes }}</p>
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

import ToggleFavoriteReply from "@/components/like/ToggleFavoriteReply.vue";
import { useRouter } from "vue-router";
import http from '@/services/http';

const router = useRouter();

</script>

<script>

export default {
  name: 'Reply',
  components: {
    ToggleFavoriteReply,
  },

  props: {
    sendReply: String,
  },

  data() {
    return {
      userid: sessionStorage.getItem("iduser"),
    }
  },

  mounted: function () {
 
  },

  methods: {


    async likeReply($idreply, $index) {

      try {
        const { data } = await http.post("/post-likereply", {
          idtweet: $idreply,
          userid: this.userid,

        });
        this.sendReply[$index].deslikes = data

      } catch (error) {
        console.log(error);
      }
    },
  }
}

</script>

<style>

</style>