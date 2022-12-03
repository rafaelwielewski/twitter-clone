<template>
  <main>
    <div id="home" class="flex container h-screen w-full">
        <div class="lg:w-1/5 border-r border-lighter px-2 lg:px-6 py-2 flex flex-col justify-between">
        <sidebar />
        </div>
        <div class="w-full md:w-1/2 h-full overflow-y-scroll">
        <tweets />
        </div>
        <div class="md:block hidden w-1/3 h-full border-l border-lighter py-2 px-6 overflow-y-scroll relative">
        <trending /> 
        </div>
    </div>
  </main>
</template>

<script setup>
import sidebar from '@/components/Sidebar.vue';
import trending from '@/components/trending.vue';
import tweets from '@/components/Tweets.vue';
import { useRouter } from "vue-router";


</script>

<style>
</style>