<template>
  <div id="1111">XXXXXXAAAAAAAAAAAAAASSSSSSSSSS</div>
</template>

<script>
export default {
  name: "myimg",
  data() {
    return {
      componentVar: "someVar"
    };
  },
  created() {
    this.someFunc();
  },
  methods: {
    someFunc() {
      alert(this.componentVar);
    }
  }
};
</script>

<!--script>
  const someVar = 'whut';
  export default {
    name: "testvar",  
    data() {
      return {
        componentVar: someVar
      }
    },
    methods: {
      someFunc() {
        alert(this.componentVar)
      }
    },
    created() {
      this.someFunc()
    }
  }
</script-->

