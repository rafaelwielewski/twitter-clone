<template>
  <div id="NavBar">
    <nav @click="router.push(`/`)" class="bg-white px-5 py-3 border-b border-lighter flex items-center justify-between cursor-pointer">
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