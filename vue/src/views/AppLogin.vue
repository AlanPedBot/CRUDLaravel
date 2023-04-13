<template>
  <div>
    <h1 style="margin-top: 40px;">Login</h1>
    <form id="create-form" @submit.prevent="login">
      <div class="messageError-container"  v-if="showDangerMessage">
          <p>Login ou senha inválidos</p>
      </div>
      <div class="input-container">
        <label for="email">Email:</label>
        <input type="email" v-model="email" placeholder="Digite o email" required>
      </div>
      <div class="input-container">
        <label for="password">Senha:</label>
        <input type="password" v-model="password" placeholder="Digite a senha" required>
        <p class="link">Ainda não está cadastrado? <a href="/register">Cadastre-se!</a></p>
      </div>
      <div id="input-container" style="text-align: center;">
        <input type="submit" value="ENTRAR" name="login" class="btn-submit">
      </div>
    </form>
  </div>
</template>

<script>
import axios from "axios";

// Define o cabeçalho padrão com o token
axios.defaults.headers.common['Authorization'] = `Bearer ${localStorage.getItem('token')}`;

export default {
  data() {
    return {
      email: '',
      password: '',
      showDangerMessage: false
    }
  },
  methods: {
    login() {
      axios.post('http://localhost:/api/login', {
          email: this.email,
          password: this.password
        })
        .then(response => {
          // Armazene o token no Local Storage
          localStorage.setItem('token', response.data.token);

          // Define o cabeçalho padrão com o novo token
          axios.defaults.headers.common['Authorization'] = `Bearer ${response.data.token}`;

          // Redirecione o usuário para a página de perfil
          this.$router.push('/');
        })
        .catch(error => {
          console.log(error);
          this.showDangerMessage = true;
          setTimeout(() => {
          this.showDangerMessage = false;
        }, 5000);
        });
    }
  },
  beforeRouteEnter(to, from, next) {
    const token = localStorage.getItem('token');

    if (to.matched.some(record => record.meta.requiresAuth)) {
      if (token) {
        // Define o cabeçalho padrão com o token existente
        axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;

        // O token existe no Local Storage, permita o acesso à rota
        next();
      } else {
        // O token não existe no Local Storage, redirecione para a página de login
        next('/login');
      }
    } else {
      // A rota não requer autenticação, permita o acesso sem verificar o token
      next();
    }
  }
}

</script>

<style>

</style>
