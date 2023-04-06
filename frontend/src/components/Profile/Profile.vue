<template>
  <EditProfile :profileEdit="profile" :profileImg="profile.profileImg" :show="showEditProfile" @close="close()"
    @dispatch="updateProfile" />
  <main :key="cacheKey" class="
        w-full
        h-full
        border-r border-lighter
        dark:border-darker
        md:border-r-0
      " ref="scrollRef">
    <div class="
          sticky top-0 z-10
          dark:bg-black
          bg-whitest
          px-5
          py-3
          border-b border-lighter
          dark:border-dark
          flex
          items-center
          justify-start
          space-x-6
        ">
      <Return />
      <h1 class="text-xl font-bold dark:text-lightest"> {{ profile.desname }}</h1>
    </div>
    <div class="
          px-6
          h-48
          border-b border-lighter
          dark:border-dark
          bg-blue
          relative
        ">
      <div class="
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
          ">
        <img :src="`${profile.profileImg}?cache=${cacheKey}`" class="w-28 h-28 md:w-32 md:h-32" />
      </div>
    </div>
    <div class="mt-5 px-6">
      <button v-show="isCurrentUser" @click="showEditProfile = true" class="
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
          ">
        Edit Profile
      </button>
      <button v-show="!isCurrentUser && !isFollowing" @click="follow" class="
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
          ">
        Follow
      </button>
      <button v-show="!isCurrentUser && isFollowing" @click="unfollow" class="
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
          ">
        <span class="group-hover:hidden">Following</span>
        <span class="hidden group-hover:block">Unfollow</span>
      </button>
      <button v-show="!isCurrentUser" class="
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
          ">

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
        <div class="
              w-full
              flex flex-wrap flex-col
              md:flex-row
              md:space-x-4
              text-sm
            ">
          <div v-show="profile.location !== ''" class="flex items-center space-x-1 dark:text-gray">
            <IconMapMarker />
            <p>{{ profile.location }}</p>
          </div>
          <div v-show="profile.website !== ''" class="flex items-center space-x-1 dark:text-gray">
            <IconLink />
            <a :href="profile.website" target="_blank" rel="noreferrer noopener" class="text-blue hover:underline">
              {{ profile.website }}
            </a>
          </div>
          <div v-show="validBirthDate" class="flex items-center space-x-1 dark:text-gray">
            <IconGift />
            <p>Born {{ profile.birthdate }}</p>
          </div>
          <div class="flex items-center space-x-1 dark:text-gray">
            <IconCalendar />
            <p>Joined {{ profile.dtregister }}</p>
          </div>
        </div>
        <div class="
              w-full
              flex flex-wrap flex-col
              md:flex-row
              md:space-x-4
              text-sm
            ">
          <div class="flex items-center space-x-2">
            <p class="font-bold dark:text-lightest">
              {{ profile.follows }}
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
    <div class="
          w-full
          flex
          justify-between
          items-center
          mt-4
          border-b border-lighter
          dark:border-dark
        ">
      <div class="
            w-full
            py-4
            dark:text-lightest
            text-center
            hover:bg-blue hover:bg-opacity-10
            hover:text-blue
            cursor-pointer
            transition-colors
            duration-75
          " :class="selectedTab === 1 ? tabClasses : selectedTabClasses" @click="selectedTab = 1">
        <h1 class="font-bold">Tweets</h1>
      </div>
      <div class="
            w-full
            py-4
            text-center
            hover:bg-blue hover:bg-opacity-10
            hover:text-blue
            cursor-pointer
            transition-colors
            duration-75
          " :class="selectedTab === 2 ? tabClasses : selectedTabClasses" @click="selectedTab = 2">
        <h1 class="font-bold">Tweets & Replies</h1>
      </div>
      <div class="
            w-full
            py-4
            text-center
            hover:bg-blue hover:bg-opacity-10
            hover:text-blue
            cursor-pointer
            transition-colors
            duration-75
          " :class="selectedTab === 3 ? tabClasses : selectedTabClasses" @click="selectedTab = 3">
        <h1 class="font-bold">Media</h1>
      </div>
      <div class="
            w-full
            py-4
            text-center
            hover:bg-blue hover:bg-opacity-10
            hover:text-blue
            cursor-pointer
            transition-colors
            duration-75
          " :class="selectedTab === 4 ? tabClasses : selectedTabClasses" @click="selectedTab = 4">
        <h1 class="font-bold">Likes</h1>
      </div>
    </div>
    <div class="flex flex-col">
      <div v-for="(sendTweet, index) in tweets" :key="index">
        <Tweet :sendTweet=sendTweet />
      </div>
      <div class="
            w-full
            p-4
            border-b border-lighter
            dark:border-dark
            hover:bg-lighter
            dark:hover:bg-darker
            flex
            cursor-pointer
          ">
        <div class="w-full text-center">
          <LoadingSpinner />
        </div>
      </div>
    </div>
  </main>
</template>


<script setup>

import http from '../../services/http';
import { ref } from 'vue';
import { useRouter } from 'vue-router';
import IconEllipsisH from '../../icons/IconEllipsisH.vue'
import LoadingSpinner from '../../shared/LoadingSpinner.vue'
import Return from '../../shared/Return.vue'
import NavBar from '../../components/NavBar.vue';
import Tweet from '../../components/Tweet/Tweet.vue';
import EditProfile from '../../components/Profile/EditProfile.vue';

const router = useRouter();

</script>

<script>

export default {
  name: 'profile',
  components: {
    Return,
    IconEllipsisH,
    LoadingSpinner,
    EditProfile,
  },

  data() {
    return {
      cacheKey: 1,
      showEditProfile: false,
      username: this.$route.params.id,
      profile: '',
      tweets: '',
      isCurrentUser: false,
      isFollowing: false,
    }
  },

  mounted: function () {
    this.checkLogin()
    this.checkProfile()
    this.getProfile()
    this.getProfileTweets()

  },

  methods: {

    forceRerender() {
      const nowTime = +new Date()
      this.cacheKey = nowTime
    },

    close() {

      this.showEditProfile = false;
      this.forceRerender();

    },
    async checkLogin() {
      if (sessionStorage.getItem("loggedin") === null) {
        this.$router.push({ path: '/' });
      }
    },

    async checkProfile() {
      if (sessionStorage.getItem("username") === this.username) {
        this.isCurrentUser = true;
      }
    },

    async getProfile() {
      try {
        const { data } = await http.post("/get-profile", {
          username: this.username,
        });

        this.profile = data[0]
        this.checkFollow()

      } catch (error) {
        console.log(error);
      }
    },

    async checkFollow() {
      try {
        const { data } = await http.post("/post-checkfollow", {
          iduserCurrent: sessionStorage.getItem("iduser"),
          iduserFollow: this.profile.iduser,
        });

        console.log(data);

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
          iduserFollow: this.profile.iduser,
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
          iduserFollow: this.profile.iduser,
        });

        if (data === "Unfollowed") {

          this.isFollowing = false

        }

      } catch (error) {
        console.log(error);
      }
    },
    async getProfileTweets() {

      try {
        const { data } = await http.post("/get-profiletweets", {
          username: this.username,
        });

        this.tweets = data
        console.log(data);

      } catch (error) {
        console.log(error);
      }
    },

  },
}

</script>

<style></style>