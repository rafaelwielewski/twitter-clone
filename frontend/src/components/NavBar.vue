<template>
  <div id="NavBar">
    <nav @click="router.push(`/`)" class="bg-whitest dark:bg-black px-5 py-3  dark:text-lightest flex items-center justify-between cursor-pointer">
      <h1 class="text-xl font-bold">Home</h1>
      <button class="far fa-star text-xl text-blue"></button>
    </nav>
    
  </div>
</template>


<script setup>

import { useRouter } from "vue-router";
const router = useRouter();

</script>

<script>

export default {
  name: 'NavBar',
  components: {
  },

}

</script>


<style>

</style>