<template>
    <div>
      <h1 style="margin-top: 40px;">Login</h1>
      <form id="create-form">
        <div class="input-container">
          <label for="email">Email:</label>
          <input type="email" name="email" v-model="email" placeholder="Digite o email" required>
        </div>
        <div class="input-container">
          <label for="password">Senha:</label>
          <input type="password" name="password" v-model="password" placeholder="Digite a senha" required>
        </div>
        <div id="input-container" style="text-align: center;">
                    <input type="submit" value="ENTRAR" name="login" class="btn-submit">
                </div>
      </form>
    </div>
  </template>
  
  <script>
  
 

  </script>
<style>
  
</style>
