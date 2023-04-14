<template>
    <div>
        <div>
            <form id="create-form">
                <div class="message-container"  v-if="showSuccessMessage">
                    <p>Livro inserido com sucesso</p>
                </div>
                <div class="messageError-container"  v-if="showDangerMessage">
                    <p>Error, preencha todos os campos</p>
                </div>
                <div class="input-container">
                    <label for="name">Nome do Livro:</label>
                    <input type="text" id="name" v-model="name" placeholder="Digite o nome do livro">
                </div>
                <div class="input-container">
            <label for="seção">Escolha a seção do livro:</label>
        <select id="select" v-model="session_id">
                    <option value="" selected>Selecione a seção</option>
                    <option value="1">Drama</option>
                    <option value="2">Ficção Cientifica</option>
                    <option value="3">Romance</option>
                    <option value="4">Conto</option>
                    <option value="5">Fantasia</option>
                    <option value="6">Terror</option>
                    <option value="7">Chick Lit</option>
                    <option value="8">Distopia</option>
                    <option value="9">Aventura</option>
                    <option value="10">Suspense</option>
                </select>
            </div>
            <div class="input-container">
                    <label for="name">URL da imagem:</label>
                    <input type="text" id="url" v-model="img_url" placeholder="Digite o nome do livro">
                </div>
                <div id="input-container" style="text-align: center;">
                    <button @click.prevent="create" class="btn-submit">ADICIONAR</button>
                </div>
            </form>
        </div>
    </div>
</template>
<script>
import axios from 'axios';

export default {
  name: "AppForm",
  data() {
    return {
      name: '',
      session_id: '',
      img_url: '',
      showSuccessMessage: false,
      showDangerMessage: false
    }
  },
  methods: {
    create() {
      axios.post(process.env.BASE_URL_API +'/library/book', {
        name: this.name,
        session_id: this.session_id,
        img_url: this.img_url,
      })
      .then(response => {
        console.log(response.data);
        this.showSuccessMessage = true;
        setTimeout(() => {
          this.showSuccessMessage = false;
        }, 3000); // Define o tempo de 5 segundos
      })
      .catch(error => {
        console.log(error.response.data);
        this.showDangerMessage = true;
        setTimeout(() => {
          this.showDangerMessage = false;
        }, 3000); // Define o tempo de 5 segundos
      });
    }
  }
}


</script>
<style scoped>
    #create-form{
        max-width: 300px;
        margin: 0 auto;
        height: 600px; 
        margin-top: 100px; 
    }
    .input-container{
        display: flex;
        flex-direction: column;
        margin-bottom: 40px;
    }
    label{
        font-weight: bold;
        margin-bottom: 15px;
        color: #222;
        padding: 5px 10px;
        border-left: 4px solid #429bf4;
        font-size: 22px;
    }
    input, select{
        padding: 10px 15px;
        width: 450px;
        border-radius: 10px;
    }
    .btn-submit{
        backdrop-filter: #222;
        color: #429bf4;
        font-weight: bold;
        border: 2px solid #222;
        padding: 10px;
        font-size: 16px;
        margin: 0 auto;
        cursor: pointer;
        transition: .5s;
        background-color: #222;
    }
    .btn-submit:hover{
        background-color: transparent;
        color: #222;
    }

</style>