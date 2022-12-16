<template>
    <div class="flex justify-center container mx-auto h-screen w-1/4 px-4 lg:px-0 py-8 bg-white">
        <div>
            <IconTwitter :size="30" class="w-full text-blue" />
            <h1 class="pt-12 text-4xl dark:text-lightest font-bold">
                Log in to Twitter
            </h1>
            <form @submit.prevent="login()" class="w-full text-center">
                <input v-model="input.username" type="text" placeholder="Username" class="
            w-full
            px-2
            py-2
            my-6
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
                <input v-model="input.password" type="password" placeholder="Password" class="
            w-full
            px-2
            py-2
            mb-6
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
                <button type="submit" class="bg-black hover:opacity-75 rounded-full focus:outline-none w-full h-12"
                    :class="
                        inputEmpty
                            ? 'cursor-not-allowed'
                            : 'cursor-pointer'
                    " :disabled="inputEmpty">
                    <LoadingSpinner v-if="loading" color="white" size="36px" />
                    <span v-else class="text-lightest text-lg font-semibold">Log in</span>
                </button>
                <button class="p-4">
                    <router-link to="/">
                        <span class="text-blue hover:underline">Sign up for Twitter</span>
                    </router-link>
                </button>
            </form>
        </div>
    </div>
</template>
  
<script>

import http from '@/services/http';
import { useRoute, useRouter } from 'vue-router'
import { computed, defineComponent, reactive, ref } from 'vue'
import IconTwitter from '../../icons/IconTwitter.vue'

export default defineComponent({
    name: 'login',
    components: {
        IconTwitter,
    },


    data() {
        return {
            errors: {
                login: '',
            },
            input: {
                username: "rafael",
                password: "Rafa12345",
            },
            registerName: "",
            registerUsername: "",
            registerPassword: "",
            profileImg: '',

        }
    },


    mounted: function () {
        this.checkLogin()
    },


    methods: {

        async checkLogin() {
            if (sessionStorage.getItem("loggedin") === 'true') {
                this.$router.push({ path: '/' });
            }
        },

        async getProfileImg() {

            try {
                const { data } = await http.post("/get-profileimg", {
                    username: sessionStorage.getItem('username'),
                });

                sessionStorage.setItem('profileImg', data);

                this.profileImg = data;

            } catch (error) {
                console.log(error);
            }
        },

        async login() {

            try {
                const { data } = await http.post("/post-login", {
                    username: this.input.username,
                    password: this.input.password,
                });

                console.log(data);

                if (data.loggedin === true) {
                    sessionStorage.setItem('loggedin', data.loggedin);
                    sessionStorage.setItem('iduser', data.iduser);
                    sessionStorage.setItem('name', data.name);
                    sessionStorage.setItem('username', data.username);
                    sessionStorage.setItem('password', data.password);

                    console.log(sessionStorage);
                    this.getProfileImg()
                    this.$router.push({ path: "/" });
                }
                if (data === 'Your username or password is incorrect') {
                    this.errors.login = 'Your username or password is incorrect';
                    this.username = '';
                    this.password = '';
                }


            } catch (error) {
                console.log(error);
            }
        },

        async register() {

            try {
                const { data } = await http.post("/post-register", {
                    name: this.registerName,
                    username: this.registerUsername,
                    password: this.registerPassword,
                });
                console.log(data);
                if (data === 'Registered') {
                    this.username = this.registerUsername;
                    this.password = this.registerPassword;
                    this.login();
                };

            } catch (error) {
                console.log(error);
            }
        },
    },

})


</script>
  
  
<style>

</style>
  
  