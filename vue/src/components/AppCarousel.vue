<template>
     <body id="bodyHome">
        <div style="height: 800px; display: flex;">
            <div class="container">
                <div class="container-fluid">
                    <div id="title">
                        <h1 style="font-weight: bold;">Ultimos livros inseridos no banco de dados</h1>
                    </div>
                    <p style="font-size: 25px; margin-top: 30px;"> No carrousel abaixo é possível ver de forma dinamica quais foram os <b>5 ultimos livros</b> que foram adicionados ao banco de dados do sistema da biblioteca, onde a cada novo livro inserido uma mensagem é enviada aos usuários avisando sobre o livro novo que chegou e está disponível.
                    </p>
                    <div class="mx-auto text-center" style="width: 50%; margin-top: 40px;">
                        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                            <div v-for="(url, index) in apiData" :key="index"
                                :class="['carousel-item', index === 0 ? 'active' : '']">
                                <img :src="url" style="width: 550px; height: 650px;">
                            </div>
                            </div>
                            <div class="d-flex justify-content-between">
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
        </div>
    </body>
</template>
<script>
import axios from 'axios';

export default {
  name: "AppCarousel",
  data() {
    return {
      apiData: [],
    }
  },
  created() {
    this.getData();
  },
  methods: {
    getData() {
      const url = process.env.BASE_URL_API + `/library/lastbook`;
      axios.get(url)

        .then( async response => {
        console.log(response.data.map(item => item.img_url));
          this.apiData = await response.data.map(item => item.img_url);
        })
        .catch(error => {
          console.error(error);
        });
        
    },
    
  }
}
</script>

<style>
#bodyHome{
      margin: 0;
      font-size: 1rem;
      font-weight: 400;
      line-height: 1.5;
      color: #212529;
      -webkit-text-size-adjust: 100%;
      -webkit-tap-highlight-color: transparent;
      min-height: 100vh;
  }
 #title{
    margin-top: 50px;
 }

</style>