<template>
<div class="main-container">
   <h1>Adicionar livro</h1>
   <AppForm/>
</div>
 </template>
 <script>
import AppForm from '../components/AppForm.vue';

export default{
   name: "AppCreate",
   components:{
      AppForm,
   }
}
</script>
