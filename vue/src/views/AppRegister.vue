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
      <div class="input-container">
        <label for="name">Nome:</label>
        <input type="text" name="name" v-model="name" placeholder="Digite o nome" required>
      </div>
      <div class="input-container">
        <label for="email">Email:</label>
        <input type="email" name="email" v-model="email" placeholder="Digite o email" required>
      </div>
      <div class="input-container">
        <label for="password">Senha:</label>
        <input type="password" name="password" v-model="password" placeholder="Digite a senha" required>
      </div>
      <div class="input-container">
        <label for="password">Confirmar Senha:</label>
        <input type="password" v-model="passwordConfirmation" placeholder="Confirme a senha" required>
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
      showDangerMessage: false
    }
  },
  methods: {
    register() {
      axios.post('http://localhost:/api/register', {
        name: this.name,
        email: this.email,
        password: this.password,
        password_confirmation: this.passwordConfirmation
      })
      .then(response => {
       console.log(response.data);
       this.showSuccessMessage = true;
      })
      .catch(error => {
        console.log(error.response.data);
        this.showDangerMessage = true;
      });
    }
  }
}
</script>
<style scoped>
.message-container{
    color: #004085;
    background-color: #CCE5FF;
    border: #B8DAFF;
    border-radius: 5px;
    padding: 10px;
    max-width: 400px;
    margin: 30px auto;
}
</style>
