<template>
    <div id="rooms">
        <img src="https://static.wixstatic.com/media/84770f_c6d1279308f647658ddbf0b28f32198c.jpg/v1/fill/w_640,h_340,al_c,q_80,usm_0.66_1.00_0.01,enc_auto/84770f_c6d1279308f647658ddbf0b28f32198c.jpg">
        <div id="text">OUR ROOMS</div>
        <span></span>
        <div id="select" @click="this.$router.push({name : 'home'})">Select Dates</div>
        <div id="result" v-show="this.$store.state.selected">
            <p>Results For:</p>
            <p>{{this.$store.state.check_in}} To {{this.$store.state.check_out}}</p>
        </div>
            <RoomComponent v-for="(type,index) in type_room" :key="index" 
            :src=type.src_img
            :name=type.name
            :price=type.price
            :stt=index
            :stt_show="stt"
            @show="show"
            v-show="this.has(index)"
            />
        <div id="book" @click="this.$router.push({name : 'book'})" v-show="this.$store.state.selected">Book Rooms</div>
    </div>
        

</template>
<script>
import RoomComponent from './RoomComponent.vue';
import { mapState } from 'vuex'
export default {
    components: {
        RoomComponent,
    },
    methods: {
        show(a){
            this.stt = a;
        },
        has(index) {
            if(this.$store.state.selected) {
                if(this.$store.state.type_room[index].quantity == 0) return false;
            }
            return true;
        }
    },
    computed: {
        ...mapState(['type_room'])
    },
    data () {
        return {
            stt: -1,
        }
    },
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
    #rooms > img {
        height: 220px;
        width: 100%;
        object-fit: cover;
    }
    #text {
        height: 100px;
        font-size: 35px;
        line-height: 100px;
        color: #3B5F8A;
        text-align: center;
    }
    #rooms span {
        display: inline-block;
        width: 150px;
        height: 3px;
        border-radius: 1px;
        background-color: #3B5F8A;
        margin-left: calc((100% - 150px)/2);
    }
    #select,#book {
        margin-top: 20px;
        margin-right: 10%;
        margin-left: 10%;
        font-size: 20px;
        color: aliceblue;
        background-color: #3B5F8A;
        height: 50px;
        line-height: 50px;
        text-align: center;
        border-radius: 3px ;
    }
    #result {
        text-align: center;
        margin-top: 20px;
    }
    #result p:nth-child(1){
        font-size: 20px;
        color: #3B5F8A;
        font-weight: 600;
    }
    #result p:nth-child(2) {
        font-size: 15px;
        color: #3B5F8A;
    }
    .room {
        height: 150px;

    }
    #book {
        margin-bottom: 20px;
    }
}
</style>
