<template>
<div>
<div ref="book">
    <div v-for="(type,index) in type_room" :key="index">
      <TypeComponent
        :src=type.src_img
        :name=type.name
        :price=type.price
        :number=type.quantity
        :id=index
      /> 
        <br>
    </div>
   <div id="a">
    <label for="fname">Full Name</label>
    <input type="text" id="fname" name="fullname" placeholder="Your name.." v-model="this.customer.fullname">
    <label for="lname">Email</label>
    <input type="text" id="lname" name="email" placeholder="Your email" v-model="this.customer.email">
    <label for="lname">Phone Number</label>
    <input type="text" id="lname" name="phone" placeholder="Phone Number" v-model="this.customer.phone_number">
  
    <input type="submit" @click="book_room">
</div>
</div>
<span id="booked" ref="booked">
    <i class="bi bi-check-circle-fill"></i>
    <p>Check your email for booking information</p>
    <span @click="this.$router.push({name : 'home'})">OK</span>
  </span>
</div>
</template>
<script>
import TypeComponent from './TypeComponent.vue'
import {mapState} from 'vuex'
export default {
    components: {
        TypeComponent
    },
    computed: {
      ...mapState(['type_room'])
    },
    data() {
      return {
        customer: {
          phone_number : '',
          email : '',
          fullname : '',
        },
        date: {
          check_in : this.$store.state.check_in,
          check_out : this.$store.state.check_out,
        },
        room: [],
      }
    },
    methods: {
      book_room () {
        for( var a of this.type_room)
        {
          for(var b = 0; b < a.order; b++)
          {
            this.room.push(a.rooms[b]);
          }
        }
        this.axios
        .post('http://localhost:8000/api/book_room', {
          customer : this.customer,
          date : this.date,
          rooms : this.room
        })
        .then( (reponse) => console.log(reponse));
        this.$refs.book.style.opacity = 0.3;
        this.$refs.booked.style.display = "inline-block";
      }
    }
}
</script>

<style scoped>
* {
  border: 0px;
  padding: 0px;
  box-sizing: border-box;
  margin: 0px;
  list-style: none;
  text-decoration: none;
}

@media screen and (max-width: 600px) {
input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

#a {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
label {
    color: #3B5C8A;
}
#booked {
  display: none;
   box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
   width: 100%;
   height: 200px;
   text-align: center;
   padding-top: 15px;
   position: fixed;
   top: 250px;
   background-color: white;
   
}
#booked span {
  display: inline-block;
  background-color: #45a049;
  width: 300px;
  height: 50px;
  text-align: center;
  line-height: 50px;
  font-size: 25px;
  color: white;
}
#booked i {
  color: #45a049;
  font-size: 50px;
}
#booked p {
  color: #3B5C8A;
  font-size: 20px;
  margin-top: 10px;
  margin-bottom: 10px;
}
}

</style>