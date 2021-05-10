Vue.config.devtools = true;
var app = new Vue({
  el: "#root",
  data: {
    rooms: [],
    room: null
  },
   created(){
     axios.get("http://localhost/db-hotel/esercizio_stanze/stanze.php")
      .then((response) => {
        this.rooms = response.data.response;
        console.log(this.rooms);
      })
    },
    methods: {
      roomInfos: function (id) {
        axios.get(`http://localhost/db-hotel/esercizio_stanze/stanze.php?id=${id}`)
        .then((response) => {
          this.room = response.data.response[0];
          console.log(this.room);
        })   
      }
    }  
  });