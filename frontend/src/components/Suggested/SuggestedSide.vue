<template>
  <button class="w-full flex text-left hover:bg-lighter p-3 border-t border-lighter"
    @click="router.push(sendProfiles.deslogin)">
    <img :src="sendProfiles.profileImg" class="w-14 h-14 rounded-full border border-lighter" />
    <div class="hidden lg:block ml-4">
      <p class="text-base font-bold leading-tight"> {{ sendProfiles.desname }} </p>
      <p class="text-base leading-tight"> @{{ sendProfiles.deslogin }} </p>
      <p class="text-base leading-tight py-1"> {{ sendProfiles.bio }} </p>
    </div>
    <button v-show="!isFollowing" @click.stop="follow" class="
            ml-auto
            float-right
            text-blue
            text-sm
            font-bold
            py-1
            px-4
            rounded-full
            border-2 border-blue
            hover:bg-blue hover:bg-opacity-25
            focus:outline-none
            transition-colors
            duration-75
          ">
      Follow
    </button>
    <button v-show="isFollowing" @click.stop="unfollow" class="
            group
            ml-auto
            float-right
            text-lightest
            text-sm
            font-bold
            py-1
            px-4
            rounded-full
            border-2 border-blue
            bg-blue
            hover:bg-danger
            hover:border-danger
            focus:outline-none
            transition-colors
            duration-75
          ">
      <span class="group-hover:hidden">Following</span>
      <span class="hidden group-hover:block">Unfollow</span>
    </button>
  </button>
</template>


<script setup>

import http from '../../services/http';
import { ref } from 'vue';
import { useRouter } from 'vue-router';

const router = useRouter();

</script>


<script>

export default {
  name: 'suggested',
  components: {

  },

  props: {

    sendProfiles: Object,
  },

  data() {
    return {
      isCurrentUser: false,
      isFollowing: false,

    }
  },

  mounted: function () {
    this.checkLogin()
    this.checkFollow()

  },

  methods: {
    async checkLogin() {
      if (sessionStorage.getItem("loggedin") === null) {
        this.$router.push({ path: '/' });
      }
    },

    async checkFollow() {
      try {
        const { data } = await http.post("/post-checkfollow", {
          iduserCurrent: sessionStorage.getItem("iduser"),
          iduserFollow: this.sendProfiles.iduser,
        });

        if (data === "Following") {

          this.isFollowing = true

        } else if (data === "Not Following") {

          this.isFollowing = false

        }

      } catch (error) {
        console.log(error);
      }
    },

    async follow() {
      try {
        const { data } = await http.post("/post-follow", {
          iduserCurrent: sessionStorage.getItem("iduser"),
          iduserFollow: this.sendProfiles.iduser,
        });

        if (data === "Followed") {

          this.isFollowing = true

        }

      } catch (error) {
        console.log(error);
      }
    },

    async unfollow() {
      try {
        const { data } = await http.post("/post-unfollow", {
          iduserCurrent: sessionStorage.getItem("iduser"),
          iduserFollow: this.sendProfiles.iduser,
        });

        if (data === "Unfollowed") {

          this.isFollowing = false

        }

      } catch (error) {
        console.log(error);
      }
    },

  },
}

</script>

<style></style>