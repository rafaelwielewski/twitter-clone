<template>
  <div id="SuggestedCard">
    <button class="w-full flex hover:bg-lighter p-3 border-t border-lighter">
      <img :src="sendProfiles.profileImg" class="w-12 h-12 rounded-full border border-lighter" />
      <div class="text-base hidden lg:block ml-4">
        <p class="font-bold leading-tight"> {{ sendProfiles.name }} </p>
        <p class="leading-tight"> {{ sendProfiles.handle }} </p>
      </div>
      <button class="ml-auto text-base text-blue py-1 px-4 rounded-full border-2 border-blue">
        Follow
      </button>
    </button>
  </div>
</template>
  

<script setup>

</script>



<script>
export default {
  name: 'SuggestedCard',
  components: {
  },

  props: {
    sendProfiles: String,

  },

  data() {

    return {
      dropdown: false,
      trending: [
        { top: '', title: '', bottom: 'The ' },
        { top: '', title: '', bottom: 'The ' },
        { top: '', title: '', bottom: 'The ' },
      ],
      follow: [
        { src: '', name: '', handle: '@' },
        { src: '', name: '', handle: '@' },
        { src: '', name: '', handle: '@' },
      ],
    }
  }
}


</script>
  
<style></style>