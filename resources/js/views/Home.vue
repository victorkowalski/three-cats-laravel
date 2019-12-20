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
export default {
  name: 'home',
  components: { 
    HeroSection,
  }
};
</script>