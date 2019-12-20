<template>
  <div class="container">
    <form @submit.prevent="submitFiles">
      <input name="name" type="text" v-model="name" />
      <br />
      <br />
      <input name="unique_name" type="text" v-model="unique_name" />
      <br />
      <br />
      <input name="price" type="text" v-model="price" />
      <br />
      <br />
      <input type="file" ref="file" multiple="multiple" />
      <!--input type="file" id="file" ref="file" v-on:change="handleFileUpload()" /-->
      <br />
      <br />
      <button type="submit">Submit</button>
    </form>

    <!--button v-on:click="submitFile()">Submit</button-->
  </div>
</template>

<script>
import axios from "axios";
import { BASE_URL, Settings } from "../variables.js";
export default {
  name: "imgUploader",

  data() {
    return {
      name: "",
      unique_name: "",
      price: "",
      files: ""
    };
  },

  methods: {
    /*processForm() {
      let formData = new FormData();
      formData.append("name", this.name);
      formData.append("unique_name", this.unique_name);
      formData.append("price", this.price);
      formData.append("file", this.files);

      axios
        .post(BASE_URL + "/api/products", formData, {
          headers: {
            "Content-Type": "multipart/form-data"
          }
        })
        .then(function() {
          console.log("SUCCESS!!");
        })
        .catch(function() {
          console.log("FAILURE!!");
        });
    },*/
/*
    handleFileUpload() {
      this.file = this.$refs.file.files[0];
    },
*/
    submitFiles() {
      let formData = new FormData();

      formData.append("name", this.name);
      formData.append("unique_name", this.unique_name);
      formData.append("price", this.price);

      for (var i = 0; i < this.$refs.file.files.length; i++) {
        let file = this.$refs.file.files[i];
        console.log(file);
        formData.append("files[" + i + "]", file);
      }

      axios
        .post(BASE_URL + "/api/products", formData, {
          headers: {
            "Content-Type": "multipart/form-data"
          }
        })
        .then(function() {})
        .catch(function() {});
    }
  }
};
</script>