<template>
  <main>
    <h2>Twitter</h2>
    <router-link to="/home">Home</router-link>
  </main>
</template>

<script setup>

import http from '@/services/http';
import {ref} from 'vue';
import {useRouter} from 'vue-router';

const router = useRouter();

const username = ref("rafael");
const password = ref("Rafa12345");

</script>

<style>

</style>