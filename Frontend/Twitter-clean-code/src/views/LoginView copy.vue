<template>
    <main>
        <div class="single-product-area">
            <div class="zigzag-bottom"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="alert alert-danger">
                        </div>
                        <form class="form-login" @submit.prevent="login">
                            <h2>Acessar</h2>
                            <p class="form-row form-row-first">
                                <label for="login">Username <span class="required">*</span>
                                </label>
                                <input type="text" v-model="username" id="username" name="username" class="input-text">
                            </p>
                            <p class="form-row form-row-last">
                                <label for="senha">Senha <span class="required">*</span>
                                </label>
                                <input type="password" v-model="password" id="senha" name="password" class="input-text">
                            </p>
                            <p class="form-row">
                                <input type="submit" value="Login" class="button">
                                <label class="inline" for="rememberme"><input type="checkbox" value="forever"
                                        id="rememberme" name="rememberme"> Manter conectado </label>
                            </p>
                            <p class="lost_password">
                                <a href="/forgot">Esqueceu a senha?</a>
                            </p>
                            
                            <br><span class="alert alert-danger" v-if="errors.login">{{ errors.login }}</span>
                            
                            <div class="clear"></div>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <div class="alert alert-danger">
                        </div>
                        <form class="register" @submit.prevent="register">
                            <h2>Criar conta</h2>
                            <p class="form-row form-row-first">
                                <label for="nome">Nome Completo <span class="required">*</span>
                                </label>
                                <input type="text" v-model="registerName" id="registerName" name="registerName"
                                    class="input-text">
                            </p>
                            <p class="form-row form-row-first">
                                <label for="login">Usename <span class="required">*</span>
                                </label>
                                <input type="text" v-model="registerUsername" id="registerUsername"
                                    name="registerUsername" class="input-text">
                            </p>
                            <p class="form-row form-row-last">
                                <label for="senha">Senha <span class="required">*</span>
                                </label>
                                <input type="password" v-model="registerPassword" id="registerPassword"
                                    name="registerPassword" class="input-text">
                            </p>
                            <div class="clear"></div>

                            <p class="form-row">
                                <input type="submit" value="Criar Conta" name="create" class="button">
                            </p>

                            <div class="clear"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </main>
</template>

<script>

import http from '@/services/http';
import { ref } from 'vue';
import { useRouter } from 'vue-router';

export default {
    name: 'tweets',
    components: {
    },
    data() {
        return {
            errors: {
                login: '',
            },
            username: "rafael",
            password: "Rafa12345",
            registerName: "",
            registerUsername: "",
            registerPassword: "",
            formFields: {
                username: sessionStorage.getItem("username"),
                file: null,
            },
            list: [],
            profileImg: '',
            profileImgTweet: '',
            dropdown: false,

            tweet: { text: '' },

        }
    },

    mounted: function () {
        this.checkLogin()
    },

    methods: {
        async checkLogin() {
            if (sessionStorage.getItem("loggedin") === 'true') {
                this.$router.push({ path: '/home' });
            }
        },
        async login() {

            try {
                const { data } = await http.post("/post-login", {
                    username: this.username,
                    password: this.password,
                });

                console.log(data);
                
                if (data.loggedin === true) {
                    sessionStorage.setItem('loggedin', data.loggedin);
                    sessionStorage.setItem('iduser', data.iduser);
                    sessionStorage.setItem('name', data.name);
                    sessionStorage.setItem('username', data.username);
                    sessionStorage.setItem('password', data.password);

                    console.log(sessionStorage);

                    this.$router.push({ path: "/home" });
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

}








</script>

