<template>
    <div>
        <!-- <p>Mensagem</p> -->
        <div>
            <form id="create-form">
                <div class="input-container">
                    <label for="name">Nome do Livro:</label>
                    <input type="text" id="name" placeholder="Digite o nome do livro">
                </div>
                <div id="input-container" style="text-align: center;">
                    <input type="submit" value="BUSCAR" name="read" class="btn-submit">
                </div>
            </form>
        </div>
    </div>
</template>
<script>
export default{
    name: "AppFormRead",
    data(){
        return{
            name:null,
            session_id:null,
            msg: null
        }
    },
    // methods:{
    //     async getIngre
    // }
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
    input{
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