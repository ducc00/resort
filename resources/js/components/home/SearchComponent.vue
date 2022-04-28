<template>
    <div>
        <div id="number">
            <span>Peoples</span>
            <div>
            <i class="bi bi-plus-circle" @click="this.peoples++"></i>
            <span>{{peoples}}</span>
            <i class="bi bi-dash-circle i" @click="reduction"></i>
            </div>
        </div>
        <div id="button" @click="find_room">Search</div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            peoples: 1
        }
    },
    methods: {
        reduction() {
            if(this.peoples > 1)
            {
                this.peoples--;
            }
        },
        find_room () {
             this.axios
                    .post('http://localhost:8000/api/find_room', {
                        'check_in' : this.$store.state.check_in,
                        'check_out' : this.$store.state.check_out
                    })
                    .then(response => {
                        console.log(response.data);
                        this.$store.commit('set_selected');
                        this.$store.commit('set_type_room',response.data);
                        this.$router.push({name: 'rooms'});
                    })
                    .catch(err => console.log(err))
                    .finally(() => this.loading = false)
        }
    },
    watch: {
        peoples: {
            deep: true,
            handler (l,n) {
                this.$store.commit('set_numbers',n);
                console.log(this.$store.state.numbers);
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
    #number {
        margin-top: 20px;
        margin-left: 10%;
        margin-right: 10%;
        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        border-radius: 2px;
        height: 35px;
    }
    #number > span:nth-child(1) {
        font-size: 20px;
        line-height: 35px;
        color: #3B5C8A;
        margin-left: 5px;
    }
    #number div {
        display: inline-block;
        width: 120px;
        margin-left: 150px;
        text-align: center;
    }
    #number div i,span {
        font-size: 25px;
        color: #3B5C8A;
        line-height: 34px;
    }
    #number div > i:nth-child(1) {
        float: left;
    }
    #number div > .i {
        float: right;
    }
    #button {
        
        margin-top: 20px;
        margin-left: 10%;
        margin-right: 10%;
        border-radius: 4px;
        background-color: rgb(193,212,239);
        height: 50px;
        font-size: 25px;
        color: #3B5C8A;
        text-align: center;
        line-height: 50px;
    }
}
</style>

