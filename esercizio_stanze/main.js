Vue.config.devtools = true;
var app = new Vue({
  el: "#root",
  data: {
    stanze: [],
  },
   created(){
     
     axios.get("http://localhost/db-hotel/esercizio_stanze/stanze.php")
      .then((response) => {
        this.stanze = response.data.response;
        console.log(this.stanze);
      })
    },  
  });