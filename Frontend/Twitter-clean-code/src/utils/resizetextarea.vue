<template>
    <textarea
        v-model="textareaContent"
        @input="resize($event)"
    ></textarea>
</template>


<script>
export default {
    data() {
    return {
      textareaContent: "",
    };
  },
    methods:{

        resize (e) {

            e.target.style.height = 'auto'
            e.target.style.height = `${e.target.scrollHeight}px`

        }

    }

}
</script>