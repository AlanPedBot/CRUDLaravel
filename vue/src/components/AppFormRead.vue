<template>
  <div>
    <div>
      <form id="create-formRead">
        <div class="input-container">
          <label for="name">Nome do Livro:</label>
          <input type="text" id="name" placeholder="Digite o nome do livro" v-model="searchTerm">
        </div>
        <div id="input-container" style="text-align: center;">
          <button @click.prevent="read" class="btn-submit">BUSCAR</button>
        </div>
      </form>
      <h3>Tabela - Livros</h3>
      <p>Aqui você pode ver e consultar seus livros, além de editar ou deletar um livro!</p>
      <div>
        <table>
          <thead>
            <tr>
              <th width=" 45%">Nome do Livro</th>
              <th width=" 45%">Id da Seção</th>
              <th width=" 35%">Editar</th>
              <th width=" 35%">Deletar</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(item, index) in paginatedData" :key="index">
              <td>{{ item.name }}</td>
              <td>{{ item.session_id }}</td>
              <td ><button class="btn-edit"><a href="">Editar</a></button></td>
              <td><button class="btn-delete"><a href="">Deletar</a></button></td>
            </tr>
          </tbody>
        </table>
        <div class="paginate">
          <button @click="currentPage--" :disabled="currentPage === 1" class="btn-paginate">Anterior</button>
          <span>{{ currentPage }} de {{ Math.ceil(filteredData.length / itemsPerPage) }}</span>
          <button @click="currentPage++" :disabled="currentPage === Math.ceil(filteredData.length / itemsPerPage)" class="btn-paginate">Próxima</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  name: "AppFormRead",
  data() {
    return {
      apiData: [],
      currentPage: 1,
      itemsPerPage: 5,
      searchTerm: '',
    }
  },
  created() {
    this.getData();
  },
  methods: {
    getData() {
      const url = `http://localhost:/api/library/book?name=${this.searchTerm}`;
      axios.get(url)
        .then(response => {
          this.apiData = response.data;
        })
        .catch(error => {
          console.error(error);
        });
    },
    read() {
      this.getData();
    }
  },
  computed: {
    filteredData() {
      if (!this.searchTerm) {
        return this.apiData;
      }
      return this.apiData.filter(item => item.name.toLowerCase().includes(this.searchTerm.toLowerCase()));
    },
    paginatedData() {
      const startIndex = (this.currentPage - 1) * this.itemsPerPage;
      const endIndex = startIndex + this.itemsPerPage;
      return this.filteredData.slice(startIndex, endIndex);
    }
  }
}
</script>


<style scoped>
*{
  font-size: 20px;
}
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
        height: 200px; 
        margin-top: 30px; 
    }

.paginate{
  text-align: center;
  margin-top: 20px;
}
.btn-paginate{
  width: 120px;
  height: 50px;
  color: #222;
  font-weight: bolder;
  background-color: #429bf4;
  margin-left: 20px;
  margin-right: 20px;
  border: solid 2px;
}
span{
  font-size: 20px;
  font-weight: bold;
}
a{
  text-decoration: none;
  color: #222;
}
.btn-edit{
  width: 120px;
  height: 50px;
  background-color: #008000;
  font-weight: bold;
}
.btn-delete{
  width: 120px;
  height: 50px;
  background-color: #d5362e;
  font-weight: bold;
}
h3{
  font-size: 40px;
  font-weight: bold;
}
p{
  font-size: 30px;
  margin-bottom: 30px;
}
</style>