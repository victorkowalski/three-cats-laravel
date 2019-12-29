<template>
  <div class="wrapper">
    <h1>Results for: "{{tag}}"</h1>
<!--div v-for="image in images" :key="image.id" :image="image" >{{image.id}}</div-->
    <ul v-if="!loading" class="image-card-grid">
      <image-card v-for="image in cleanImages" :key="image.id" :image="image" />
      <!--div v-for="image in images" :key="image.id" :image="image" /-->
    </ul>

    <ul v-else class="image-card-grid">
      <image-card v-for="n in 6" :key="n" :loading="true" />
    </ul>
  </div>
</template>

<script>
//import config from "../config";
//import axios from "axios";
//import flickr from "../flickr.js";
import api from '../api';
import ImageCard from "../components/ImageCard";
export default {
  name: "searchResults",
  components: {
    ImageCard
  },
  props: {
    tag: String
    //tag: ''
  },
  created() {
    this.search();
  },
  watch: {
    tag(value) {
      this.search();
    }
  },
  computed: {
    isTagEmpty() {
        return !this.tag || this.tag.length === 0;
    },
    cleanImages() {
      return this.images.filter(image => image.url_n)
    }
  },
  data() {
    return {
      loading: false,
      //tag: "",
      images: []
    };
  },
  methods: {
    search() {
      //if (!this.isTagEmpty) {
        this.loading = true;
        this.fetchImages();
      //}
    },
    fetchImages() {
            /* Making API call to authenticate a user */
      
      /* Making API call */
      api
        .request('get', '/api/products'/*, { username, password }*/)
        .then(response => {
          //this.toggleLoading()

          var data = response.data
          /* Checking if error object was returned from the server */
          if (data.error) {
            var errorName = data.error.name
            if (errorName) {
              this.response = errorName === 'error'
                  ? 'no images. Please try again.'
                  : errorName
            } else {
              this.response = data.error
            }

            return
          }

          /* Setting user in the state and caching record to the localStorage */
          if (data) {
               this.images = data;
this.loading = false;

               console.log(data);
               console.log(loading);

            /*var token = 'Bearer ' + data.token

            this.$store.commit('SET_USER', data.user)
            this.$store.commit('SET_TOKEN', token)

            if (window.localStorage) {
              window.localStorage.setItem('user', JSON.stringify(data.user))
              window.localStorage.setItem('token', token)
            }*/
         
            //this.$router.push(data.redirect ? data.redirect : '/')
          }
        })
        .catch(error => {
          //this.$store.commit('TOGGLE_LOADING')
          console.log(error)

          this.response = 'Server appears to be offline'
          //this.toggleLoading()
        })
      /*return flickr("photos.search", {
        tags: this.tag,
        extras: "url_n, owner_name, description, date_taken, views",
        page: 1,
        per_page: 30
      }).then(response => {
        //this.images = response.data.photos.photo;
      });
      */
    }
  }
};
</script>

<style lang="scss">
.screen-reader-only {
  height: 1px;
  width: 1px;
  position: absolute;
  left: -100000px;
}
.text-centered {
  text-align: center;
}
.wrapper {
  margin: 0 auto;
  max-width: 800px;
  @media only screen and (max-width: 799px) {
    max-width: 100%;
    margin: 0 1.5rem;
  }
}
.image-card-grid {
  list-style: none;
  margin: 0.5rem 0;
  padding: 0;
  display: flex;
  align-items: flex-start;
  flex-wrap: wrap;
}/*
.navbar {
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 1rem;
  background: #f0f0f0;
}
.searchbar {
  width: 300px;
  display: flex;
  align-items: center;
  justify-content: center;
  @media only screen and (max-width: 549px) {
    width: 100%;
    label {
      width: 80%;
    }
  }
}
.searchbar-input {
  padding: 0.5rem 1rem;
  border-radius: 20px;
  font-size: 1rem;
  border: 1px solid gray;
  min-width: 300px;
  @media only screen and (max-width: 549px) {
    min-width: 0;
    width: 100%;
  }
}
.btn {
  padding: 0.5rem 1rem;
  font-size: 1rem;
  border-radius: 20px;
  background: transparent;
  border: none;
}
.btn--green {
  background: #42b983;
  color: white;
  font-weight: bold;
}
.btn--go {
  padding: 0.5rem 2rem;
  margin-left: 1rem;
}*/
</style>