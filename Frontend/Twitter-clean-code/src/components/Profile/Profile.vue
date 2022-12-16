<template>

<main
    class="
      w-full
      h-full
      overflow-y-scroll
      border-r border-lighter
      dark:border-darker
      md:border-r-0
    "
    ref="scrollRef"
  >
    <div
      class="
        px-5
        py-3
        border-b border-lighter
        dark:border-dark
        flex
        items-center
        justify-start
        space-x-6
      "
    >
      <Return />
      <h1 class="text-xl font-bold dark:text-lightest"> {{ profile.desname }}</h1>
    </div>
    <div
      class="
        px-6
        h-48
        border-b border-lighter
        dark:border-dark
        bg-blue
        relative
      "
    >
      <div
        class="
          absolute
          overflow-hidden
          mt-32
          rounded-full
          w-28
          h-28
          md:w-32
          md:h-32
          border-4 border-lightest
          dark:border-black
          bg-black
        "
      >
        <img v-lazy="profile.profileImg" class="w-28 h-28 md:w-32 md:h-32" />
      </div>
    </div>
    <div class="mt-5 px-6">
      <button
        v-show="isCurrentUser"
        @click="showEditProfileDialog = true"
        class="
          float-right
          text-blue
          font-bold
          py-2
          px-5
          rounded-full
          border-2 border-blue
          hover:bg-blue hover:bg-opacity-25
          focus:outline-none
          transition-colors
          duration-75
        "
      >
        Edit Profile
      </button>
      <button
        v-show="!isCurrentUser && !profile.isFollowing"
        @click="followUserOrUnfollowUser"
        class="
          float-right
          text-blue
          font-bold
          py-2
          px-6
          rounded-full
          border-2 border-blue
          hover:bg-blue hover:bg-opacity-25
          focus:outline-none
          transition-colors
          duration-75
        "
      >
        Follow
      </button>
      <button
        v-show="!isCurrentUser && profile.isFollowing"
        @click="followUserOrUnfollowUser"
        class="
          group
          float-right
          text-lightest
          font-bold
          py-2
          px-6
          rounded-full
          border-2 border-blue
          bg-blue
          hover:bg-danger
          hover:border-danger
          focus:outline-none
          transition-colors
          duration-75
        "
      >
        <span class="group-hover:hidden">Following</span>
        <span class="hidden group-hover:block">Unfollow</span>
      </button>
      <button
        v-show="!isCurrentUser"
        class="
          float-right
          text-blue
          font-bold
          py-2
          px-3
          mr-4
          rounded-full
          border-2 border-blue
          hover:bg-blue hover:bg-opacity-25
          focus:outline-none
          transition-colors
          duration-75
        "
      >
        <IconEllipsisH />
      </button>
      <div class="w-full flex flex-col space-y-4">
        <div class="w-full block mt-4">
          <h1 class="text-2xl font-bold dark:text-lightest">
            {{ profile.desname }}
          </h1>
          <h2 class="dark:text-gray">@{{ profile.deslogin }}</h2>
        </div>
        <p class="w-full dark:text-lightest">
          {{ profile.bio }}
        </p>
        <div
          class="
            w-full
            flex flex-wrap flex-col
            md:flex-row
            md:space-x-4
            text-sm
          "
        >
          <div
            v-show="profile.location !== ''"
            class="flex items-center space-x-1 dark:text-gray"
          >
            <IconMapMarker />
            <p>{{ profile.location }}</p>
          </div>
          <div
            v-show="profile.website !== ''"
            class="flex items-center space-x-1 dark:text-gray"
          >
            <IconLink />
            <a
              :href="profile.website"
              target="_blank"
              rel="noreferrer noopener"
              class="text-blue hover:underline"
            >
              {{ profile.website }}
            </a>
          </div>
          <div
            v-show="validBirthDate"
            class="flex items-center space-x-1 dark:text-gray"
          >
            <IconGift />
            <p>Born {{ profile.birthdate }}</p>
          </div>
          <div class="flex items-center space-x-1 dark:text-gray">
            <IconCalendar />
            <p>Joined {{ profile.dtregister }}</p>
          </div>
        </div>
        <div
          class="
            w-full
            flex flex-wrap flex-col
            md:flex-row
            md:space-x-4
            text-sm
          "
        >
          <div class="flex items-center space-x-2">
            <p class="font-bold dark:text-lightest">
              {{ profile.following }}
            </p>
            <p class="dark:text-gray">Following</p>
          </div>
          <div class="flex items-center space-x-2">
            <p class="font-bold dark:text-lightest">
              {{ profile.followers }}
            </p>
            <p class="dark:text-gray">Followers</p>
          </div>
        </div>
      </div>
    </div>
    <div
      class="
        w-full
        flex
        justify-between
        items-center
        mt-4
        border-b border-lighter
        dark:border-dark
      "
    >
      <div
        class="
          w-full
          py-4
          text-center
          hover:bg-blue hover:bg-opacity-10
          hover:text-blue
          cursor-pointer
          transition-colors
          duration-75
        "
        :class="selectedTab === 1 ? tabClasses : selectedTabClasses"
        @click="selectedTab = 1"
      >
        <h1 class="font-bold">Tweets</h1>
      </div>
      <div
        class="
          w-full
          py-4
          text-center
          hover:bg-blue hover:bg-opacity-10
          hover:text-blue
          cursor-pointer
          transition-colors
          duration-75
        "
        :class="selectedTab === 2 ? tabClasses : selectedTabClasses"
        @click="selectedTab = 2"
      >
        <h1 class="font-bold">Tweets & Replies</h1>
      </div>
      <div
        class="
          w-full
          py-4
          text-center
          hover:bg-blue hover:bg-opacity-10
          hover:text-blue
          cursor-pointer
          transition-colors
          duration-75
        "
        :class="selectedTab === 3 ? tabClasses : selectedTabClasses"
        @click="selectedTab = 3"
      >
        <h1 class="font-bold">Media</h1>
      </div>
      <div
        class="
          w-full
          py-4
          text-center
          hover:bg-blue hover:bg-opacity-10
          hover:text-blue
          cursor-pointer
          transition-colors
          duration-75
        "
        :class="selectedTab === 4 ? tabClasses : selectedTabClasses"
        @click="selectedTab = 4"
      >
        <h1 class="font-bold">Likes</h1>
      </div>
    </div>

    <div v-show="!initialLoadDone" class="flex flex-col">
      <div class="w-full text-center">
        <LoadingSpinner />
      </div>
    </div>
    <div v-show="initialLoadDone" class="flex flex-col">
      <div v-for="tweet in tweets" :key="tweet.id">
        <TweetCard v-if="!tweet.isReply" :tweet="tweet" />
        <TweetConversationCard v-else :tweet="tweet" />
      </div>

      <div
        
        class="
          w-full
          p-4
          border-b border-lighter
          dark:border-dark
          hover:bg-lighter
          dark:hover:bg-darker
          flex
          cursor-pointer
        "
      >
        <div class="w-full text-center">
          <LoadingSpinner />
        </div>
      </div>
    </div>
  </main>
  -->

</template>


<script setup>

import http from '@/services/http';
import {ref} from 'vue';
import {useRouter} from 'vue-router';

const router = useRouter();

</script>

<script>

export default {
  name: 'profile',
  components: {
  },

  data() {
    return {
      username: this.$route.params.id,
      profile: '',
    }
  },

  mounted: function () {
    this.checkLogin()
    this.getProfile()

  },

  methods: {
    async checkLogin() {
      if (sessionStorage.getItem("loggedin") === null) {
        this.$router.push({ path: '/' });
      }
    },

    async checkProfile() {
      if (sessionStorage.getItem("deslogin") === this.username) {

      }
    },

    async getProfile() {
      try {
        const { data } = await http.post("/get-profile", {
          username: this.username,
        });

        this.profile = data[0]

      } catch (error) {
        console.log(error);
      }
    },

  },
}

</script>

<style>

</style>