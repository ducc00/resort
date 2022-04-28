<template>
    <div>
        <div id="img" @click="show">
            <img :src="src" alt="">
            <span>
            <p>{{name}}</p>
            <p>${{price}} ></p>
            </span>
        </div>
        <div id="info" v-if="this.stt_show == this.stt">
            <ul>
                <li>
                    <i class="bi bi-snow"></i>
                    <span>Air Conditioning</span>
                </li>
                <li>
                    <i class="bi bi-wifi"></i>
                    <span>Internet (Wi-Fi)</span>
                </li>
                <li>
                    <i class="bi bi-tv"></i>
                    <span>TV</span>
                </li>
                <li>
                    <i class="bi bi-safe"></i>
                    <span>Safe</span>
                </li>
                <li>
                    <i class="bi bi-telephone"></i>
                    <span>Telephone</span>
                </li>
            </ul>
            <div>
            <p>260 sq ft</p>
            <p>2 Double(s)</p>
            <br>
            <p>Affordable luxury. Our Junior Suites are the perfect option if you’re looking for a little extra luxury. With an open 400 square foot floor plan, the Junior Suites offer the extra space you need to spread out and enjoy the breathtaking views of the city skyline.</p>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props:  ['src','name','price','stt','stt_show'],
    data() {
        return {
            show_info: false,
        }
    },
    methods: {
        show() {
            this.$emit('show',this.stt);
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
        #img {
            margin-top: 20px;
            margin-left: 10%;
            margin-right: 10%;
            position: relative;
        }
        #img img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        #img span p{
            display: inline;
            font-size: 20px;
            color: #FFFFF3;
            line-height: 60px;
            font-weight: 600;
        }
        #img span p:nth-child(1) {
            text-align: right;
            margin-left: 10%;
        }
        #img span p:nth-child(2) {
            float: right;
            margin-right: 10%;
        }
        #img span {
            display: inline-block;
            width: 100%;
            height: 60px;
            position: absolute;
            bottom:0px;
            left: 0px;
            box-shadow: 0px -40px 30px rgb(99, 92, 92) inset;
        }
        #info {
            margin-top: 20px;
            margin-left: 10%;
            margin-right: 10%;
        }
        #info ul {
            border-top:#3B5F8A 1px solid;
            border-bottom: #3B5F8A 1px solid;
            margin-bottom: 10px;
        }
        #info ul li {
            font-size: 25px;
            color: #3B5F8A;
        }
        #info ul li i {
            margin-right: 10px;
            font-size: 30px;
        }
        #info div p {
            color: #3B5F8A;
        }

        }
</style>
