<template>
  <div id="ProfileImg">
    <label>File
      <input type="file" id="file" ref="file" v-on:change="onChangeFileUpload()" />
    </label>
    <button v-on:click="submitForm()">Upload</button>
  </div>
</template>
  
<script>


export default {
  name: 'ProfileImg',
  components: {
  },
  data() {
    return {
      formFields: {
        username: sessionStorage.getItem("username"),
        file: null,
      },

    }
  },

  mounted: function () {
    this.getTweetlist()
  },

  methods: {
    
    async onChangeFileUpload() {
      this.formFields.file = this.$refs.file.files[0]
    },

    async submitForm() {
      let formData = new FormData();

      formData.append('file', this.formFields.file);
      formData.append('username', this.formFields.username);
      await http.post("/post-profileimg",
        formData,
        {
          headers: {
            //'Content-Type': "multipart/form-data"
          }
        }

      ).then(function (data) {
        console.log(data.data);
      })
        .catch(function () {
          console.log('FAILURE!!');
        });
    },

  }

}


import http from '@/services/http';


</script>

<style>


</style>