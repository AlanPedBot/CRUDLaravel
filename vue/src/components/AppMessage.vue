<template>
    <div class="message-container">
        <p>Sucesso</p>
    </div>
</template>
<script>
export default{
    name:"AppMessage",
    props:{
        msg: String
    }
}
</script>

<style scoped>
.message-container{
    color: #004085;
    background-color: #CCE5FF;
    border: #B8DAFF;
    border-radius: 5px;
    padding: 10px;
    max-width: 400px;
    margin: 30px auto;
}
</style>
