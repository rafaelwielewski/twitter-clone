<template>
  <div :class="dark ? 'dark' : 'light'" id="View">
    <div class="dark:bg-black">
      <RouterView />
    </div>
  </div>
</template>



<script setup>

import BaseLayout from '@/layout/BaseLayout.vue'
import { mapGetters } from 'vuex';
import { RouterView } from 'vue-router'

</script>



<script>

export default {
  name: 'View',
  components: {
  },

  computed: {
    ...mapGetters(['dark'])
  },

}

</script>

<style scoped>
@import "https://use.fontawesome.com/releases/v5.6.3/css/all.css";
@import "https://rsms.me/inter/inter.css";

@import 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css';
</style>
