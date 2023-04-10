<template>
    <div>
      <nav>
        <router-link to="/" id="logo-url">
          <img :src="logo" :alt="alt" id="logo">
        </router-link>
        <input type="checkbox" id="menu-toggle">
        <label for="menu-toggle" class="menu-icon">&#9776;</label>
        <ul id="menu">
          <li><router-link to="/">Home</router-link></li>
          <li><router-link to="/create">Adicionar</router-link></li>
          <li><router-link to="/read">Buscar</router-link></li>
          <li><a href="/login" @click="logout">Logout</a></li>
        </ul>
      </nav>
    </div>
  </template>
  
  <script>
  export default {
    name: "AppNavbar",
    props: ["logo", "alt"],
    methods: {
      logout() {
        localStorage.removeItem("token");
      },
    },
  };
  </script>
  
  <style scoped>
nav {
  background-color: #222;
  border-bottom: 4px solid grey;
  padding: 15px 50px;
  display: flex;
  justify-content: space-between;
  align-items: center;
}
#logo {
  height: 70px;
  width: 70px;
  border-radius: 40px;
}
#logo-url {
  margin-left: 0;
}
#menu-toggle {
  display: none;
}
.menu-icon {
  color: #429bf4;
  font-size: 25px;
  cursor: pointer;
  display: none; /* esconde o botão por padrão */
}
ul {
  display: flex;
  list-style-type: none;
  margin: 0;
  padding: 0;
}
li {
  margin: 12px;
}
a {
  color: #429bf4;
  text-decoration: none;
  transition: 0.5s;
  font-size: 25px;
}
a:hover {
  color: white;
}
/* Media Query for Small Screens */
@media only screen and (max-width: 600px) {
  #menu-toggle:checked ~ ul {
    display: flex;
    flex-direction: column;
    position: fixed;
    top: 60px;
    left: 0;
    width: 100%;
    background-color: #222;
  }
  .menu-icon {
    display: block; /* torna o botão visível apenas em telas pequenas */
  }
  ul a {
    display: block;
    text-align: center;
  }
  li {
    margin: 0;
  }
}
</style>
