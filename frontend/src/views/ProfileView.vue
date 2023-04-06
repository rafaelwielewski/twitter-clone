<template>
  <main :key="$route.fullPath">
    <div id="profileview" class="flex md:container h-screen w-full overflow-y-scroll">
      <div
        class="xl:w-1/5 border-r border-lighter dark:border-dark px-0 lg:px-6 py-2 flex flex-col justify-between h-screen sticky top-0 overflow-y-auto no-scrollbar">
        <Sidebar />
      </div>
      <div class="w-full xl:w-1/2 h-full">
        <div class="">
          <Profile />
        </div>
      </div>
      <div
        class="lg:block hidden w-1/3 border-l border-lighter dark:border-dark py-2 px-6 relative h-screen sticky top-0 overflow-y-auto no-scrollbar">
        <Trending />
      </div>
    </div>
  </main>
</template>

<script setup>

import Profile from '../components/Profile/Profile.vue';
import Sidebar from '../components/Sidebar.vue';
import Trending from '../components/trending.vue';
import http from '../services/http';


</script>

<script>

export default {
  name: 'profileview',
  components: {
  },

  data() {

    return {
      suggested: "",
    }
  },

  created: function () {
    this.checkLogin()

  },

  methods: {
    async checkLogin() {
      if (sessionStorage.getItem("loggedin") === null) {
        this.$router.push({ path: '/login' });
      }
    },
    async getSuggested() {

      try {
        const { data } = await http.get("/get-suggested", {
        });

        this.suggested = data
        console.log(data);

      } catch (error) {
        console.log(error);
      }
    },
  },
}

</script>

<style></style>