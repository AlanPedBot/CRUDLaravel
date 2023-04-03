<template>
    <div id="nav">
        <router-link to="/" id="logo-url">
            <img :src="logo" :alt="alt" id="logo">
        </router-link>
        <router-link to="/">Home</router-link> 
        <router-link to="/adicionar">Adicionar</router-link> 
        <router-link to="/buscar">Buscar</router-link>
    </div>
</template>
    <script>
    export default{
        name: "AppNavbar",
        props: ["logo", "alt"]
    }
    
    </script>
    <style scoped>   
    #nav{
        background-color:#222;
        border-bottom: 4px solid grey;
        padding: 15px 50px;
        display: flex;
        justify-content: flex-end;
        align-items: center;
    }
    #logo{
        height: 70px;
        width: 70px;
        border-radius: 40px;
    }
    #nav #logo-url{
        margin: auto;
        margin-left: 0;
    }
    #nav a{
        color: #429bf4;
        text-decoration: none;
        margin: 12px;
        transition: .5s;
        font-size: 25px;
    }
    #nav a:hover{
        color: white;
    }
    
    </style>