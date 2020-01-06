<template>
  <div>
    
    <hero-section
      backgroundImage="vvv.jpg"
      title="Welcome to Instaflickr"
      subtitle="A fake photo app"/>
    <div class="wrapper">
    </div>
  </div>
</template>

<script>
import HeroSection from '../components/HeroSection';
import RecentPhotos from '../components/RecentPhotos';
//test
import myimg from '../test/TestVar';

export default {
  name: 'home',
  components: { 
    //myimg,
    HeroSection,
    RecentPhotos
  }
};
</script>