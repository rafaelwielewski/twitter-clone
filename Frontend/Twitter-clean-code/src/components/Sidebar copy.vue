<template>
  <div id="sidebar">
    <div>
      <button class="h-12 w-12 hover:bg-lightblue text-3xl rounded-full text-blue dark:text-lightest" @click="router.push(`/`)">
        <i class="fab fa-twitter"></i>
      </button>
      <div class="">
        <button
            class="
            dark:hover:text-lightest dark:hover:bg-dark
            text-left focus:outline-none hover:text-blue flex items-center lg:py-2 lg:py-3 px-3 hover:bg-lightblue rounded-full mr-auto mb-1">
            <div @click="router.push(`/`)" class="flex dark:hover:text-lightest dark:hover:bg-dark">
            <IconTwitter :size="28" class="mr-4 dark:text-lightest text-2xl mr-4 text-left" />
            </div>
        </button>
        <button
            class="
            dark:hover:text-lightest dark:hover:bg-dark
            text-left focus:outline-none hover:text-blue flex items-center lg:py-2 lg:py-3 px-3 hover:bg-lightblue rounded-full mr-auto mb-1">
            <div @click="router.push(`/`)" class="flex dark:hover:text-lightest dark:hover:bg-dark">
            <IconHome :size="28" class="mr-4 dark:text-lightest text-2xl mr-4 text-left" />
            <p class="dark:text-lightest text-lg font-semibold text-left hidden xl:block mr-4">Home</p>
            </div>
        </button>
        <button
            class="
            dark:hover:text-lightest dark:hover:bg-dark
            text-left focus:outline-none hover:text-blue flex items-center sm:py-2 xl:py-3 px-3 hover:bg-lightblue rounded-full mr-auto mb-1">
            <div @click="router.push(`/`)" class="flex dark:hover:text-lightest dark:hover:bg-dark">
            <IconHashtag :size="28" class="mr-4 dark:text-lightest text-2xl mr-4 text-left" />
            <p class="dark:text-lightest text-lg font-semibold text-left hidden xl:block mr-4">Explore</p>
            </div>
        </button>
        <button
            class="
            dark:hover:text-lightest dark:hover:bg-dark
            text-left focus:outline-none hover:text-blue flex items-center sm:py-2 xl:py-3 px-3 hover:bg-lightblue rounded-full mr-auto mb-1">
            <div @click="router.push(`/`)" class="flex dark:hover:text-lightest dark:hover:bg-dark">
            <IconBell :size="28" class="mr-4 dark:text-lightest text-2xl mr-4 text-left" />
            <p class="dark:text-lightest text-lg font-semibold text-left hidden xl:block mr-4">Notifications</p>
            </div>
        </button>
        <button
            class="
            dark:hover:text-lightest dark:hover:bg-dark
            text-left focus:outline-none hover:text-blue flex items-center sm:py-2 xl:py-3 px-3 hover:bg-lightblue rounded-full mr-auto mb-1">
            <div @click="router.push(`/`)" class="flex dark:hover:text-lightest dark:hover:bg-dark">
            <IconEnvelope :size="28" class="mr-4 dark:text-lightest text-2xl mr-4 text-left" />
            <p class="dark:text-lightest text-lg font-semibold text-left hidden xl:block mr-4">Messages</p>
            </div>
        </button>
        <button
            class="
            dark:hover:text-lightest dark:hover:bg-dark
            text-left focus:outline-none hover:text-blue flex items-center sm:py-2 xl:py-3 px-3 hover:bg-lightblue rounded-full mr-auto mb-1">
            <div @click="router.push(`/`)" class="flex dark:hover:text-lightest dark:hover:bg-dark">
            <IconBookmark :size="28" class="mr-4 dark:text-lightest text-2xl mr-4 text-left" />
            <p class="dark:text-lightest text-lg font-semibold text-left hidden xl:block mr-4">Bookmarks</p>
            </div>
        </button>
        <button
            class="
            dark:hover:text-lightest dark:hover:bg-dark
            text-left focus:outline-none hover:text-blue flex items-center sm:py-2 xl:py-3 px-3 hover:bg-lightblue rounded-full mr-auto mb-1">
            <div @click="router.push(`/`)" class="flex dark:hover:text-lightest dark:hover:bg-dark">
            <IconList :size="28" class="mr-4 dark:text-lightest text-2xl mr-4 text-left" />
            <p class="dark:text-lightest text-lg font-semibold text-left hidden xl:block mr-4">Lists</p>
            </div>
        </button>
        <button
            class="
            dark:hover:text-lightest dark:hover:bg-dark
            text-left focus:outline-none hover:text-blue flex items-center sm:py-2 xl:py-3 px-3 hover:bg-lightblue rounded-full mr-auto mb-1">
            <div @click="router.push(`/`)" class="flex dark:hover:text-lightest dark:hover:bg-dark">
            <IconUser :size="28" class="mr-4 dark:text-lightest text-2xl mr-4 text-left" />
            <p class="dark:text-lightest text-lg font-semibold text-left hidden xl:block mr-4">Profile</p>
            </div>
        </button>
        <button
            class="
            dark:hover:text-lightest dark:hover:bg-dark
            text-left focus:outline-none hover:text-blue flex items-center sm:py-2 xl:py-3 px-3 hover:bg-lightblue rounded-full mr-auto mb-1">
            <div @click="router.push(`/`)" class="flex dark:hover:text-lightest dark:hover:bg-dark">
            <IconEllipsisH :size="28" class="mr-4 dark:text-lightest text-2xl mr-4 text-left" />
            <p class="dark:text-lightest text-lg font-semibold text-left hidden xl:block mr-4">More</p>
            </div>
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
      <i class="hidden xl:block fas fa-angle-down ml-auto text-lg"></i>
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
        { icon: 'fas fa-home', title: 'Home', id: 'home', link: "" },
        { icon: 'fas fa-hashtag', title: 'Explore', id: 'explore', link: "" },
        { icon: 'far fa-bell', title: 'Notifications', id: 'notifications', link: "" },
        { icon: 'far fa-envelope', title: 'Messages', id: 'messages', link: "" },
        { icon: 'far fa-bookmark', title: 'Bookmarks', id: 'bookmarks', link: "" },
        { icon: 'fas fa-clipboard-list', title: 'Lists', id: 'lists', link: "" },
        { icon: 'far fa-user', title: 'Profile', id: 'profile', link: sessionStorage.getItem("username") },
        { icon: 'fas fa-ellipsis-h', title: 'More', id: 'more', link: "" }
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