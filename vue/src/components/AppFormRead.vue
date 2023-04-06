<template>
    <div>
        <!-- <p>Mensagem</p> -->
        <div>
            <form id="create-formRead">
                <div class="input-container">
                    <label for="name">Nome do Livro:</label>
                    <input type="text" id="name" placeholder="Digite o nome do livro">
                </div>
                <div id="input-container" style="text-align: center;">
                    <button @click.prevent="create" class="btn-submit">BUSCAR</button>
                </div>
            </form>
            <h3 style="font-weight: bold; margin-bottom: 20px;">Tabela - Livros</h3>
            <h5 style="margin-bottom: 20px;">Na tabela abaixo é possível verificar quais livros existem no banco de dados</h5>
            <table>
  <thead>
    <tr>
      <th>Nome do Livro</th>
      <th>Id da Seção</th>
      <th>Editar</th>
      <th>Deletar</th>
    </tr>
  </thead>
  <tbody>
    <tr v-for="(item, index) in apiData" :key="index">
      <td>{{ item.name }}</td>
      <td>{{ item.session_id }}</td>
    </tr>
  </tbody>
</table>
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
table {
  border-collapse: collapse;
  width: 100%;
}

thead {
  background-color: #f2f2f2;
}

th, td {
  text-align: left;
  padding: 8px;
}

th {
  font-weight: bold;
}

tr:nth-child(even) {
  background-color: #f2f2f2;
}

tr:hover {
  background-color: #ddd;
}
#create-formRead{
        max-width: 300px;
        margin: 0 auto;
        height: 300px; 
        margin-top: 30px; 
    }


</style>