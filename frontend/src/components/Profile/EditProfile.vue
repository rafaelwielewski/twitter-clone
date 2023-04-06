<template>
  <Dialog size="lg" :show="show" @close="close" :closeButton="false">
    <template #title>
      <div class="flex justify-between items-center pb-4 dark:bg-black">
        <div class="flex">
          <button @click="close" class="text-lg font-medium leading-6 text-blue focus:outline-none">
            <IconX :size="24" />
          </button>
          <h1 class="ml-6 font-bold text-2xl dark:text-lightest">
            Edit Profile
          </h1>
        </div>
        <button v-if="!showCropper" @click="save" class="
              h-10
              px-4
              text-lightest
              bg-blue
              font-semibold
              focus:outline-none
              rounded-full
              transition-colors
              duration-75
            ">
          Save
        </button>
        <button v-else @click="setProfileImage" class="
              h-10
              px-4
              text-lightest
              bg-blue
              font-semibold
              focus:outline-none
              rounded-full
              transition-colors
              duration-75
            ">
          Apply
        </button>
      </div>
    </template>
    <div v-if="!showCropper">
      <div class="w-full px-2 h-48 mb-16 bg-blue relative">
        <button @click.prevent="profileImgInput.click()" class="
              absolute
              mt-32
              overflow-hidden
              rounded-full
              w-32
              h-32
              z-10
              bg-dark bg-opacity-25
              focus:outline-none
              flex
              items-center
              justify-center
            ">
          <IconCamera :size="24" class="text-white opacity-75" />
        </button>
        <input ref="profileImgInput" type="file" class="hidden" accept="image/jpg,image/jpeg,image/png"
          @change="onChangeFileUpload" />
        <div class="
              absolute
              overflow-hidden
              mt-32
              rounded-full
              w-32
              h-32
              border-4 border-lightest
              dark:border-black
            ">
          <img :src="profileEdit.profileImg" class="w-32 h-32" />
        </div>
      </div>
      <input v-model="name" type="text" placeholder="Name" class="
            w-full
            px-2
            py-4
            my-4
            border-2 border-lighter
            text-xl
            rounded
            dark:border-dark
            focus:outline-none
            dark:bg-black
            dark:text-light
            focus:border-blue
            dark:focus:border-blue
            transition-colors
            duration-75
          " />
      <textarea v-model="bio" placeholder="Bio" class="
            w-full
            px-2
            py-4
            my-4
            border-2 border-lighter
            text-xl
            rounded
            dark:border-dark
            focus:outline-none
            dark:bg-black
            dark:text-light
            focus:border-blue
            dark:focus:border-blue
            transition-colors
            duration-75
          " />
      <input v-model="location" type="text" placeholder="Location" class="
            w-full
            px-2
            py-4
            my-4
            border-2 border-lighter
            text-xl
            rounded
            dark:border-dark
            focus:outline-none
            dark:bg-black
            dark:text-light
            focus:border-blue
            dark:focus:border-blue
            transition-colors
            duration-75
          " />
      <input v-model="website" type="text" placeholder="Website" class="
            w-full
            px-2
            py-4
            my-4
            border-2 border-lighter
            text-xl
            rounded
            dark:border-dark
            focus:outline-none
            dark:bg-black
            dark:text-light
            focus:border-blue
            dark:focus:border-blue
            transition-colors
            duration-75
          " />
      <div class="mt-6">
        <span class="font-bold text-2xl dark:text-lightest">Birth date</span>
      </div>
      <div class="flex space-x-4">
        <select v-model="selectedYear" class="
              relative
              appearance-none
              w-full
              px-2
              py-4
              my-4
              border-2 border-lighter
              text-xl
              rounded
              dark:border-dark
              focus:outline-none
              dark:bg-black
              dark:text-light
              focus:border-blue
              dark:focus:border-blue
              cursor-pointer
              transition-colors
              duration-75
            ">
          <option v-for="(year, index) in years" :key="index" :value="year">
            {{ year }}
          </option>
        </select>
        <select v-model="selectedMonth" class="
              relative
              appearance-none
              w-full
              px-2
              py-4
              my-4
              border-2 border-lighter
              text-xl
              rounded
              dark:border-dark
              focus:outline-none
              dark:bg-black
              dark:text-light
              focus:border-blue
              dark:focus:border-blue
              cursor-pointer
              transition-colors
              duration-75
            ">
          <option v-for="(month, index) in months" :key="index" :value="index">
            {{ month }}
          </option>
        </select>
        <select v-model="selectedDay" class="
              relative
              appearance-none
              w-full
              px-2
              py-4
              my-4
              border-2 border-lighter
              text-xl
              rounded
              dark:border-dark
              focus:outline-none
              dark:bg-black
              dark:text-light
              focus:border-blue
              dark:focus:border-blue
              cursor-pointer
              transition-colors
              duration-75
            ">
          <option v-for="(day, index) in availableDays" :key="index" :value="day.getDate()">
            {{ day.getDate() }}
          </option>
        </select>
      </div>
    </div>
    <div class="max-w-md" v-else>
      <Cropper class="cropper" ref="cropper" :src="profileImgPreview" :stencil-props="{
        aspectRatio: 1 / 1,
      }" :auto-zoom="true" :stencil-component="CircleStencil" @change="change" />
    </div>
  </Dialog>
</template>


<script setup>

import http from '../../services/http';
import { ref } from 'vue';
import { useRouter } from 'vue-router';
import IconEllipsisH from '../../icons/IconEllipsisH.vue'
import LoadingSpinner from '../../shared/LoadingSpinner.vue'
import Return from '../../shared/Return.vue'
import IconX from '../../icons/IconX.vue'
import Dialog from '../../shared/Dialog.vue'
import IconCamera from '../../icons/IconCamera.vue'
import { Cropper, CircleStencil } from 'vue-advanced-cropper'
import 'vue-advanced-cropper/dist/style.css'


const router = useRouter();

</script>

<script>

const profileImgInput = ref(HTMLInputElement)

export default {
  name: 'EditProfile',
  components: {
    Dialog,
    IconX,
    IconCamera,
    Cropper,
    CircleStencil,
    Return,
    IconEllipsisH,
    LoadingSpinner,
  },

  props: {
    show: {
      type: Boolean,
      default: false,
    },
    profileEdit: {
      type: Object,
      required: true,
    },
  },
  data() {
    return {
      profileImg: '',
      componentKey: 0,
      cacheKey: 1,
      profileImgUpdated: false,
      loading: false,
      coordinates: '',
      profileImgCropped: '',
      cropper: '',
      showCropper: false,
      profileImg: '',
      profileImgInput: '',
      profileImgPreview: '',
      formData: '',
    }
  },

  created: function () {




  },

  methods: {


    forceRerender() {
      const nowTime = +new Date()
      this.cacheKey = nowTime
    },

    async onChangeFileUpload() {

      const File = this.$refs.profileImgInput.files[0]

      this.profileImgPreview = URL.createObjectURL(File);

      this.showCropper = 'true';


    },


    async setProfileImage() {

      const { canvas } = this.$refs.cropper.getResult();
      console.log(canvas);
      if (canvas) {

        const form = new FormData();

        canvas.toBlob(blob => {
          console.log(blob);
          form.append('file', blob);
          form.append('iduser', sessionStorage.getItem("iduser"));
          this.profileImg = this.profileEdit.profileImg;
          this.profileEdit.profileImg = URL.createObjectURL(blob);
          this.formData = form;
          this.showCropper = false
        },
        );

      }
    },

    async uploadProfileImage() {
      console.log(this.formData);
      try {
        const { data } = await http.post("/post-profileimg",
          this.formData,
          {
          });

        this.profileImgUpdated = false;

      } catch (error) {

        console.log(error);

      }
    },

    async save() {
      if (this.profileImg.length > 1) {
        this.uploadProfileImage();
        this.showCropper = false
        window.location.reload();
      }

    },

    async closeCropper() {

      this.showCropper = false

    },

    async close() {
      if (this.profileImg.length > 1) {
        this.profileEdit.profileImg = this.profileImg;
      }
      this.showCropper = false
      this.$emit('close')
    }
  }
}

</script>

<style></style>