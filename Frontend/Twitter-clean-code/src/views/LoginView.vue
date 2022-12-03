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
                        <label class="inline" for="rememberme"><input type="checkbox" value="forever" id="rememberme" name="rememberme"> Manter conectado </label>
                    </p>
                    <p class="lost_password">
                        <a href="/forgot">Esqueceu a senha?</a>
                    </p>

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
                        <input type="text" id="nome" name="name" class="input-text" value="email">
                    </p>
                    <p class="form-row form-row-first">
                        <label for="login">Usename <span class="required">*</span>
                        </label>
                        <input type="login" id="login" name="login" class="input-text" value="login">
                    </p>
                    <p class="form-row form-row-last">
                        <label for="senha">Senha <span class="required">*</span>
                        </label>
                        <input type="password" id="senha" name="password" class="input-text">
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

<script setup>

import http from '@/services/http';
import {ref} from 'vue';
import {useRouter} from 'vue-router';

const router = useRouter();

const username = ref("rafael");
const password = ref("Rafa12345");


async function login() {

  try {
    const {data} = await http.post("/post-login", {
        username: username.value,
        password: password.value
    });

    if(data === '"loggedIn"null') {
        router.push("/home");
    };
    console.log(data);
  } catch (error) {
    console.log(error);
  }
}

</script>

