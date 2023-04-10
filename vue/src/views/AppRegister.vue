<template>
  <div>
    <h1 style="margin-top: 40px;">Cadastrar</h1>
    <form id="create-form">
      <div class="message-container"  v-if="showSuccessMessage">
        <p>Usuário cadastrado com sucesso</p>
      </div>
      <div class="messageError-container"  v-if="showDangerMessage">
        <p>Error, preencha todos os campos</p>
      </div>
      <div class="messageError-container"  v-if="showErrorPasswordMessage">
        <p>Senha e confirmar senha incorretos</p>
      </div>
      <div class="messageError-container"  v-if="showEmailErrorMessage">
        <p>E-mail inválido</p>
      </div>
      <div class="input-container">
        <label for="name">Nome:</label>
        <input type="text" v-model="name" placeholder="Digite o nome" required>
      </div>
      <div class="input-container">
        <label for="email">Email:</label>
        <input type="email"  v-model="email" placeholder="Digite o email" required>
      </div>
      <div class="input-container">
        <label for="password">Senha:</label>
        <input type="password"  v-model="password" placeholder="Digite a senha" required>
      </div>
      <div class="input-container">
        <label for="password">Confirmar Senha:</label>
        <input type="password" v-model="passwordConfirmation" placeholder="Confirme a senha" required>
        <p class="link">Fazer login! <a href="/login">Logar!</a></p>
      </div>
      <div id="input-container" style="text-align: center;">
        <button @click.prevent="register" class="btn-submit">CADASTRAR</button>
      </div>
    </form>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      name: '',
      email: '',
      password: '',
      passwordConfirmation: '',
      showSuccessMessage: false,
      showDangerMessage: false,
      showErrorPasswordMessage: false,
      showEmailErrorMessage: false
    }
  },
  methods: {
  register() {
    if (this.password !== this.passwordConfirmation) {
      this.showErrorPasswordMessage = true;
      setTimeout(() => {
        this.showErrorPasswordMessage = false;
      }, 5000);
      return; // interrompe a execução do método
    }
    const emailRegex = /\S+@\S+\.\S+/;
    if (!emailRegex.test(this.email)) {
      this.showEmailErrorMessage = true;
      setTimeout(() => {
        this.showEmailErrorMessage = false;
      }, 5000);
      return; // interrompe a execução do método
    }
    
    axios.post('http://localhost:/api/register', {
      name: this.name,
      email: this.email,
      password: this.password,
      password_confirmation: this.passwordConfirmation
    })
    .then(response => {
      console.log(response.data);
      this.showSuccessMessage = true;
      setTimeout(() => {
        this.showSuccessMessage = false;
      }, 5000);
    })
    .catch(error => {
      console.log(error.response.data);
      this.showDangerMessage = true;
      setTimeout(() => {
        this.showDangerMessage = false;
      }, 5000);
    });
  }
}

}
</script>
