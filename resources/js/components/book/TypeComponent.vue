<template>
    <div>
        <img :src="src">
        <span id = "info">
            <span>{{name}}</span>
            <br>
            <span>Price : ${{price}}</span>
            <br>
            <span>Rest : {{number}}</span>
        </span>
        <span id = "number">
            <i class="bi bi-caret-up-fill" @click="order_increase()"></i>
            <i>{{this.$store.state.type_room[id].order}}</i>
            <i class="bi bi-caret-down-fill" @click="order_reduce()"></i>
        </span>
    </div>
</template>
<script>
export default {
    props: ['src','name','price','number','id'],
    data () {
        return {
            
        }
    },
    methods: {
        order_increase() {
            if(this.$store.state.type_room[this.id].order < this.$store.state.type_room[this.id].quantity)
            {
                this.$store.state.type_room[this.id].order++;
            }
        },
        order_reduce() {
            if(this.$store.state.type_room[this.id].order > 0)
            {
                this.$store.state.type_room[this.id].order--;
            }
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
    div {
        margin-right: 5%;
        margin-left: 5%;
        height: 200px;
        display: flex;
        justify-content: space-between;
    }
    div img {
        height: 100%;
        width: 200px;
        object-fit: cover;
        border-radius: 3px;
    }
    #info {
        margin-top: 20px;
        display: inline-block;
        height: 80%;
        width: 200px;
        font-size: 27px;
        color: #3B5C8A;
        line-height: 50px;
        text-align: center;
    }
    #info span:nth-child(1){
        font-weight: 600;
    }
    #number {
        margin-top: 15px;
         display: inline-block;
        height: 80%;
        width: 50px;
        font-size: 50px;
        color: #3B5C8A;
        line-height: 48px;
        text-align: center;
    }
    #number i:nth-child(2) {
        font-size: 35px;
    }
}
</style>