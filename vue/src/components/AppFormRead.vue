<template>
  <div>
    <form id="create-formRead">
      <div class="message-container"  v-if="showSuccessEditMessage">
        <p>Atualização realizada com sucesso</p>
    </div>
    <div class="messageError-container"  v-if="showDangerEditMessage">
        <p>Seção inválida</p>
    </div>
    <div class="message-container"  v-if="showSuccessDeleteMessage">
        <p>Livro deletado com sucesso</p>
    </div>
    <div class="messageError-container"  v-if="showDangerDeleteMessage">
        <p>Erro ao deletar o livro</p>
    </div>
    <div class="input-container">
      <label for="name">Nome do Livro:</label>
      <input v-model="searchTerm" type="text" placeholder="Digite o nome do livro">
      <!-- <button @click="getData()" class="btn-submit">BUSCAR</button> -->
    </div>
  </form>
  <h3>Tabela Livros</h3>
    <table>
      <thead>
        <tr>
          <!-- <th>ID</th> -->
          <th width="45%">Nome do livro</th>
          <th width="45%">Seção do livro</th>
          <th width="15%">Editar</th>
          <th width="15%">Deletar</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="book in paginatedData" :key="book.id">
          <!-- <td>{{ book.id }}</td> -->
          <td>{{ book.name }}</td>
          <td>{{ book.session_id }}</td>
          <td><button @click="updateBook(book)" class="btn-edit">Editar</button></td>
          <td><button @click="deleteBook(book.id)" class="btn-delete">Deletar</button></td>
        </tr>
      </tbody>
    </table>
    <div class="pagination-container">
      <button :disabled="currentPage === 1" @click="currentPage--" class="btn-paginate">Anterior</button>
      <div v-for="page in pages" :key="page" @click="goToPage(page)" :class="{ 'pagination-number': true, active: currentPage === page }">
        <span v-if="page === 1 || page === pageCount || Math.abs(currentPage - page) <= 2 || (Math.abs(currentPage - page) <= 3 && (page === 2 || page === pageCount - 1))">{{ page }}</span>
        <span v-else>...</span>
      </div>
      <button :disabled="currentPage === pageCount" @click="currentPage++" class="btn-paginate">Próximo</button>
    </div>
    <div v-if="Object.keys(editBookData).length">
      <h2 style="margin-top: 30px; text-align: center; font-size: 40px; font-weight: bold; margin-bottom: 20px;">Editar livro</h2>
          <input v-model="editBookData.name" type="text" placeholder="Nome do Livro" class="input-edit">
          <input v-model="editBookData.session_id" type="text" placeholder="Seção do livro" class="input-edit">
          <button @click="saveEditedBook" class="btn-save">Salvar</button>
          <button @click="cancelEdit" class="btn-cancel">Cancelar</button>
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
      editBookData: {},
      showSuccessEditMessage: false,
      showDangerEditMessage: false,
      showSuccessDeleteMessage: false,
      showDangerDeleteMessage: false
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
    updateBook(book) {
      this.editBookData = {
        id: book.id,
        name: book.name,
        session_id: book.session_id
      };
    },
    saveEditedBook() {
      const url = `http://localhost:/api/library/book/${this.editBookData.id}`;
      axios.patch(url, {
        name: this.editBookData.name,
        session_id: this.editBookData.session_id,
      })
      .then(() => {
        this.editBookData = {};
        this.getData();
        this. showSuccessEditMessage = true;
        setTimeout(() => {
        this.showSuccessEditMessage = false;
      }, 5000);
      })
      .catch(error => {
        console.error(error);
        this.showDangerEditMessage = true;
        setTimeout(() => {
        this.showDangerEditMessage = false;
      }, 3000);
      });
    },
    cancelEdit() {
      this.editBookData = {};
    },
    deleteBook(id) {
      const url = `http://localhost:/api/library/book/${id}`;
      axios.delete(url)
        .then(() => {
          this.getData();
          this.showSuccessDeleteMessage = true;
        setTimeout(() => {
        this.showSuccessDeleteMessage = false;
      }, 3000);
        })
        .catch(error => {
          console.error(error);
          this.showDangerDeleteMessage = true;
        setTimeout(() => {
        this.showDangerDeleteMessage = false;
      }, 5000);
        });
    },
    goToPage(page) {
    this.currentPage = page;
  }
  },
  computed: {
  filteredData() {
    return this.apiData.filter(book => book.name.toLowerCase().includes(this.searchTerm.toLowerCase()));
  },
  pageCount() {
    return Math.ceil(this.filteredData.length / this.itemsPerPage);
  },
  pages() {
    const pages = [];
    for (let i = 1; i <= this.pageCount; i++) {
      pages.push(i);
    }
    return pages;
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
  margin-bottom: 30px;
}
.input-edit{
  margin-left: 10px;
}
.btn-save{
  width: 120px;
  height: 50px;
  background-color: #0d80ae;
  font-weight: bold;
  margin-left: 10px;
}
.btn-cancel{
  width: 120px;
  height: 50px;
  background-color: #d5362e;
  font-weight: bold;
  margin-left: 10px;
}
input{
  padding: 10px 15px;
  width: 450px;
  border-radius: 10px;
    }
    .pagination-container {
  display: flex;
  justify-content: center;
  margin-top: 20px;
  margin-bottom: 198px;
}

.btn-paginate {
  background-color: #ccc;
  color: #333;
  border: none;
  padding: 10px 20px;
  margin: 0 5px;
  cursor: pointer;
  border-radius: 5px;
}

.btn-paginate:hover {
  background-color: #666;
  color: #fff;
}

.active {
  background-color: #333;
  color: #fff;
}
.pagination-container {
  display: flex;
  justify-content: center;
  align-items: center;
  margin-top: 20px;
}

.pagination-number {
  display: inline-block;
  margin: 0 5px;
  cursor: pointer;
  font-size: 16px;
  font-weight: bold;
  color: #333;
  border: 1px solid #ddd;
  padding: 5px 10px;
  border-radius: 5px;
}

.pagination-number.active {
  background-color: #333;
  color: #fff;
  border-color: #333;
}


</style>