<template>
  <div id="trending">
    <div>
      <input class="
        pl-10 rounded-full w-full p-2.5 bg-lighter text-base mb-4 
        dark:bg-darker dark:focus:text-lightest dark:focus:bg-black
        focus:bg-whitest focus:outline-none focus:border-sky-500 focus:ring-2 focus:ring-sky-500
        " placeholder="Search Twitter" />
      <i class="fas fa-search absolute left-0 top-0 mt-4 ml-10 text-base text-gray"></i>

      <div class="w-full rounded-2xl bg-lightest dark:bg-darker dark:text-lightest">
        <div class="flex items-center justify-between p-3">
          <p class="text-xl font-bold">What's happening</p>
        </div>
        <button v-for="(trend, index) in trending" :key="index"
          class="w-full flex justify-between hover:bg-lighter dark:hover:bg-dark p-3">
          <div>
            <p class="text-sm text-left leading-tight dark:text-lightest"> {{ trend.top }} </p>
            <p class="font-semibold text-base text-left leading-tight dark:text-lightest"> {{ trend.title }} </p>
            <p class="text-left text-base leading-tight dark:text-lightest"> {{ trend.bottom }} </p>
          </div>
          <button @click.stop=""
            class="ml-auto py-1 px-2 dark:text-gray hover:text-blue hover:cursor-pointer hover:bg-blue dark:hover:text-blue hover:bg-opacity-20 rounded-full">
            <IconEllipsisH :size="18" class="" />
          </button>
        </button>
        <button
          class="text-base p-3 w-full hover:bg-lighter text-left text-blue dark:hover:bg-dark rounded-b-2xl hover:rounded-b-2xl">
          Show More
        </button>
      </div>
      <div class="w-full rounded-2xl bg-lightest dark:bg-darker my-4">
        <div class=" p-3">
          <p class="text-xl font-bold dark:text-lightest">Who to Follow</p>
        </div>
        <button v-for="(profile, index) in profiles" :key="index" class="w-full flex ">
          <Suggested :sendProfiles=profile />
        </button>
        <button
          class="text-base p-3 w-full hover:bg-lighter text-left text-blue dark:hover:bg-dark rounded-b-2xl hover:rounded-b-2xl"
          @click="router.push(`/connect_people`)">
          Show More
        </button>
      </div>
    </div>
  </div>
</template>
  

<script setup>

import IconEllipsisH from '../icons/IconEllipsisH.vue'
import Suggested from '../components/Suggested/Suggested.vue';
import http from '../services/http';
import { useRouter } from "vue-router";

const router = useRouter();

</script>


<script>
export default {
  name: 'trending',
  components: {
  },

  data() {
    return {
      isCurrentUser: false,
      isFollowing: false,

    }
  },

  created: function () {
    this.ShowThreeProfiles()
    this.checkFollow()
  },

  data() {

    return {
      profiles: '',
      trending: [
        { top: '', title: '', bottom: 'The ' },
        { top: '', title: '', bottom: 'The ' },
        { top: '', title: '', bottom: 'The ' },
      ],
    }
  },
  methods: {

    async ShowThreeProfiles() {
      try {
        const { data } = await http.post("/get-showthreeprofiles", {
          username: sessionStorage.getItem("username"),
        });
        console.log(data);
        this.profiles = data

      } catch (error) {
        console.log(error);
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