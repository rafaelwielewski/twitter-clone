<template>
  <main>
    <div id="login" class="flex h-screen w-full">
            <div class="img-back md:block hidden w-3/6 h-full border-r border-l border-lighter py-2 px-6 relative">
                <svg viewBox="0 0 24 24" class="piriquito" aria-hidden="true" fill="#fff">
                <g>
                    <path style="color:white"  d="M23.643 4.937c-.835.37-1.732.62-2.675.733.962-.576 1.7-1.49 2.048-2.578-.9.534-1.897.922-2.958 1.13-.85-.904-2.06-1.47-3.4-1.47-2.572 0-4.658 2.086-4.658 4.66 0 .364.042.718.12 1.06-3.873-.195-7.304-2.05-9.602-4.868-.4.69-.63 1.49-.63 2.342 0 1.616.823 3.043 2.072 3.878-.764-.025-1.482-.234-2.11-.583v.06c0 2.257 1.605 4.14 3.737 4.568-.392.106-.803.162-1.227.162-.3 0-.593-.028-.877-.082.593 1.85 2.313 3.198 4.352 3.234-1.595 1.25-3.604 1.995-5.786 1.995-.376 0-.747-.022-1.112-.065 2.062 1.323 4.51 2.093 7.14 2.093 8.57 0 13.255-7.098 13.255-13.254 0-.2-.005-.402-.014-.602.91-.658 1.7-1.477 2.323-2.41z"></path>
                </g>
            </svg>
            </div>
            <div class="w-full md:w-4/6 h-full">
                <h1>Happening now</h1>
            <span>Join Twitter today.</span>

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


<style>

body {
    background-color: black;
    color:#ffffff;
    overflow-x: hidden;
    max-width: 100vw;
}

.svg {
    color: white;
    fill: white;
}

.img-back {
    background-image: url('./res/site/img/lohp_850x623.png');
    height: 100vh;
}

.piriquito {
    max-width: 400px;
    margin: 20% 30%;
}

.nav-footer {
    height: 8vh;
    background-color: black;
}

a {
    color: gray !important;
    font-size: 10px !important;
    padding-left: 16%;
    padding-right: 16%;
}

.login-area {
    margin-top: 150px;
    padding-left: 30px;
    padding-right: 30px;
}

h1 {
    font-size: 64px !important;
    font-weight: 1000;
}

.span {
    font-size: 30px !important;
    font-weight: 600;
}

input {
    max-height: 50px;
    background-color: black !important;
    border: 1px solid #2bc4ff !important;
    color: white !important;
}

button {
    padding-left: 45px !important;
    padding-right: 45px !important;
    color: white !important;
    font-size: 20px !important;
    font-weight: 800 !important;
}

.modal-content {
    padding: 50px 30px;
    background-color: black;
}
.footerlol{

    color:#ffffff;
    position: fixed; /* ou fixed */
    bottom: 0;
    }

#navbar2{
    color:#d30000;
    width: 50%;
    padding-left: 0px;
    padding-right: 0px;
    background-color: rgb(104, 72, 72);
        }




</style>

