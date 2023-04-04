<template>
   <div>
      <AppBanner/>
         <div class="main-container">
            <AppCarousel/>
         </div>
   </div>
</template>
<script>
import AppBanner from "../components/AppBanner.vue";
import AppCarousel from '../components/AppCarousel.vue';
export default{
   name: "AppHome",
   components:{
      AppBanner,
      AppCarousel,
   }
}
</script>