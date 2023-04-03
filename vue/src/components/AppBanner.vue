<template>
    <div id="main-banner">
        <h1>Biblioteca Virtual</h1>
    </div>
</template>
<script>
export default{
    name: "AppBaner"
}
</script>
<style scoped>
#main-banner{
    background-image: url('/public/img/banner.jpg');
    background-position: 0 -250px;
    background-size: cover;
    height: 500px;
    display: flex;
    align-items: center;
    justify-content: flex-start;

}
#main-banner h1{
    color: white;
    text-align: center;
    font-size: 60px;
    background-color: #222;
    padding: 20px 40px;
}


</style>