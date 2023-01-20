<template>
  <div id="sidebar">
    <div>
      <button class="h-12 w-12 dark:hover:text-lightest dark:hover:bg-dark hover:bg-lightblue text-3xl rounded-full text-blue dark:text-lightest" @click="router.push(`/`)">
        <i class="fab fa-twitter"></i>
      </button>
      <DarkModeToggle />
      <div class="">
        <button v-for="(tab, index) in tabs" :key="index" @click="id = tab.id"
            :class="`
            dark:hover:text-lightest dark:hover:bg-dark
            text-left focus:outline-none hover:text-blue flex items-center sm:py-2 xl:py-3 px-2 hover:bg-lightblue rounded-full mr-auto mb-1 ${id === tab.id ? 'text-blue' : ''}`">
            <router-link :to="`/${tab.link}`" class="flex dark:hover:text-lightest dark:hover:bg-dark">
            <component :is="tab.icon" :size="26" class="fill-lightest dark:text-lightest text-2xl mr-4 text-left" ></component>
            <p class="dark:text-lightest text-lg font-semibold text-left hidden xl:block"> {{ tab.title }} </p>
          </router-link>
        </button>
      </div>
      <button
        class="text-lightest bg-blue rounded-full font-semibold focus:outline-none w-12 h-12 xl:h-auto xl:w-56 py-3 mr-5 hover:bg-darkblue">
        <p class="hidden xl:block" @click="router.push(`/`)">Tweet</p>
        <i class="fas fa-plus xl:hidden"></i>
      </button>
    </div>
  </div>
  <div class="xl:w-full relative">
    <button @click="dropdown = !dropdown"
      class="flex items-center xl:w-full dark:hover:bg-dark hover:bg-lightblue rounded-full p-2 focus:outline-none">
      <img :src="`/${profileImg}`" class="w-10 h-10 rounded-full" />
      <div class="hidden xl:block ml-4">
        <p class="dark:text-lightest text-sm font-bold leading-tight"> {{ name }}</p>
        <p class="dark:text-light text-sm leading-tight"> @{{ username }} </p>
      </div>
      <IconEllipsisH :size="18" class="hidden xl:block ml-auto text-lg fill-lightest dark:text-lightest" />
    </button>
    <div v-if="dropdown === true"
      class="absolute bottom-0 left-0 w-64 rounded-3xl shadow-md dark:shadow-gray border-lightest bg-lightest dark:bg-black mb-16">
      <button @click="dropdown = false" class="p-3 flex items-center w-full hover:bg-lightest dark:hover:bg-dark p-2 focus:outline-none">
        <img :src="`/${profileImg}`" class="w-10 h-10 rounded-full" />
        <div class="ml-4">
          <p class="dark:text-lightest text-sm font-bold leading-tight"> {{ name }} </p>
          <p class="dark:text-light text-sm leading-tight"> @{{ username }} </p>
        </div>
        <i class="fas fa-check ml-auto test-blue"></i>
      </button>
      <button @click="dropdown = false"
        class="dark:text-lightest w-full text-left hover:bg-lightest dark:hover:bg-dark border-t border-lighter p-3 test-sm focus:outline-none">
        Add an existing account
      </button>
      <button @click="logout()"
        class="dark:text-lightest w-full text-left hover:bg-lightest dark:hover:bg-dark border-t border-lighter p-3 test-sm focus:outline-none">
        Log out
      </button>
    </div>
  </div>
</template>

<script setup>
import DarkModeToggle from './DarkModeToggle.vue';
import IconTwitter from '@/icons/IconTwitter.vue'
import IconPlus from '@/icons/IconPlus.vue'
import IconChevronDown from '@/icons/IconChevronDown.vue'
import IconCheck from '@/icons/IconCheck.vue'
import IconHome from '@/icons/IconHome.vue'
import IconHashtag from '@/icons/IconHashtag.vue'
import IconBell from '@/icons/IconBell.vue'
import IconEnvelope from '@/icons/IconEnvelope.vue'
import IconBookmark from '@/icons/IconBookmark.vue'
import IconList from '@/icons/IconList.vue'
import IconUser from '@/icons/IconUser.vue'
import IconMore from '@/icons/IconMore.vue'
import IconEllipsisH from '@/icons/IconEllipsisH.vue'
import { useRouter } from "vue-router";
const router = useRouter();

</script>


<script>

export default {
  name: 'sidebar',
  components: {
  },

  data() {

    return {
      profileImg: sessionStorage.getItem("profileImg"),
      iduser: sessionStorage.getItem("iduser"),
      name: sessionStorage.getItem("name"),
      username: sessionStorage.getItem("username"),
      dropdown: false,
      tabs: [
        { icon: IconHome, title: 'Home', id: 'home', link: "" },
        { icon: IconHashtag, title: 'Explore', id: 'explore', link: "" },
        { icon: IconBell, title: 'Notifications', id: 'notifications', link: "" },
        { icon: IconEnvelope, title: 'Messages', id: 'messages', link: "" },
        { icon: IconBookmark, title: 'Bookmarks', id: 'bookmarks', link: "" },
        { icon: IconList, title: 'Lists', id: 'lists', link: "" },
        { icon: IconUser, title: 'Profile', id: 'profile', link: sessionStorage.getItem("username") },
        { icon: IconMore, title: 'More', id: 'more', link: "" }
      ],
    }
  },


  methods: {

    logout() {

      sessionStorage.clear();

      this.$router.push({ path: '/login' });

    },
  },
}


</script>

<style>

</style>