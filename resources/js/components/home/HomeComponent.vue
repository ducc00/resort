<template>
    <div id="home">
            <p>LAGUNA <br> RESORT</p>
            <p>LIFE AS IT SHOULD BE.</p>
            <div>
                <DateComponent />
            </div>
    </div>
</template>
<script>
import DateComponent from './DateComponent.vue'
export default {
    components: {
        DateComponent,
    },
    created () {
        this.axios.post('http://localhost:8000/api/all_room')
                    .then(response => {
                         this.$store.commit('set_number_type_room', response.data);
                         console.log(this.$store.state.type_room);
                    })
                    .catch(err => console.log(err));
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
#home {
    width: 100%;
    background-color: blue;
    height: 851px;
    background-image: url(https://static.wixstatic.com/media/9c608a_fd5bdc161f854fd6bdba4d88e633a5fa.jpg/v1/fill/w_1000,h_941,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/9c608a_fd5bdc161f854fd6bdba4d88e633a5fa.jpg);
    background-position: center center;
    padding-top: 35px;
}
#home p:nth-child(1) {
    font-size: 50px;
    line-height: 60px;
    color: #E5E5E5;
    text-align: center;
}
#home p:nth-child(2) {
    font-size: 25px;
    text-align: center;
    line-height: 70px;
    color: #E5E5E5;
}

}
</style>