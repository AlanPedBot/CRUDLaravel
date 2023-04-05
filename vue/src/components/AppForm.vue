<template>
    <div>
        <AppMessage :msg="msg" v-show="msg"/>
        <div>
            <form id="create-form">
                <div class="input-container">
                    <label for="name">Nome do Livro:</label>
                    <input type="text" id="name" v-model="name" placeholder="Digite o nome do livro">
                </div>
                <div class="input-container">
            <label for="seção">Escolha a seção do livro:</label>
        <select id="select" name="session_id">
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
                <div id="input-container" style="text-align: center;">
                    <input type="submit" value="ADICIONAR" name="add" class="btn-submit">
                </div>
            </form>
        </div>
    </div>
</template>
<script>
import AppMessage from '../components/AppMessage.vue';
export default{
    name: "AppForm",
    components:{
      AppMessage,
   }
}

</script>
<style scoped>
    #create-form{
        max-width: 300px;
        margin: 0 auto;
        height: 454px; 
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