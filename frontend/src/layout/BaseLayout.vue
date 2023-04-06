<template>
    <div>
        <div class="flex container mx-auto px-4 xl:px-40 h-screen w-full font-sans">
            <Sidebar />
            <RouterView />
            <Trending />
        </div>
    </div>
</template>


<script setup>

import Sidebar from '../components/Sidebar.vue';
import { RouterView } from 'vue-router'
import Trending from '../components/trending.vue';

</script>

