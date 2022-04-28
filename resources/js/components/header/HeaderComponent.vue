<template>
    <div id="header">
        <div id="menu" ref="menu">
        <span @click="displayMenu('none')">X</span>
        <ul @click="displayMenu('none')" >
            <li><a><router-link :to="{ name: 'home'}">HOME</router-link></a></li>
            <li><a><router-link :to="{ name: 'rooms'}">ROOMS</router-link></a></li>
            <li><a href="#">ABOUT</a></li>
            <li><a href="#">CONTACT</a></li>
        </ul>
        </div>
        <span @click="displayMenu('block')">
            <span></span>
            <span></span>
            <span></span>
        </span>
    </div>
</template>
<script>
export default {
    methods: {
        displayMenu(status){
            this.$refs.menu.style.display = status;
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

@media screen and (max-width: 600px)
{
    #menu {
        background-color: #386F9E;
        position:fixed;
        top: 0px;
        left: 0px;
        width: 100%;
        height: 100%;
        display: none;
        z-index: 3;
    }
    #menu span {
        display: inline-block;
        font-size: 50px;
        width: 60px;
        height: 60px;
        text-align: center;
        line-height: 60px;
        position: fixed;
        right: 60px;
        top:60px;
        color: #F9FAFA;
    }
    #menu ul li,a {
        text-decoration: none;
        list-style: none;
        display: inline-block;
    }
    #menu ul li a {
        font-size: 20px;
        line-height: 80px;
    }
    #menu ul li a:active{
        color: white;
    }
    #menu ul {
        display: inline-block;
        height: 300px;
        width: 200px;
        margin-top: 100px;
        margin-left: calc((100% - 200px)/2);
        background-color: transparent;
    }
    #menu ul li {
        height: 80px;
        width: 200px;
        text-align: center;
    }
    #menu ul li:nth-child(2),li:nth-child(1),li:nth-child(3) {
        border-bottom: 2px solid white;
    }

    #header {
        height: 90px;
        background-color: #F9FAFA;
        width: 100%;
        padding-bottom: 20px;
        padding-top: 20px;
    }
    #header > span {
        display: inline-block;
        width: 50px;
        height: 50px;
        background-color: #386F9E;
        border-radius: 3px;
        margin-right: 15px;
        margin-left: auto;
        display: flex;
        flex-direction: column;
        justify-content: space-around;
    }
    #header > span > span {
        display: inline-block;
        width: 20px;
        height: 4px;
        background-color: #FFFFFF;
        border-radius: 2px;
        align-self: center
    }
}
</style>