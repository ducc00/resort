<template>
    <div>
        <div id="select_day">
            <span class="select">
                <span>
                    <p>Check-In</p>
                    <i class="bi bi-calendar2"></i>
                </span>
                <span @click="show(show_picker_date_in,'in')">
                    <a href="#" v-show="!selected_in">Select Dates</a>
                    <div class="selected" v-show="selected_in">
                        <span class="date">{{this.date_in.getDate()}}</span>
                         <span class="mounth">{{this.date_in.toDateString().split(' ')[1]}}</span>
                         <br>
                        <span class="day">{{this.date_in.toDateString().split(' ')[0]}}</span>
                    </div>
                </span>
                <div v-if="show_picker_date_in.display">
                    <datepicker 
                    inline=true 
                    :value="date_in" 
                    v-model="date_in"
                    @selected="show(show_picker_date_in,'in')">
                    </datepicker>
                    </div>
            </span>
            <span class="select">
                <span>
                    <p>Check-Out</p>
                    <i class="bi bi-calendar2"></i>
                </span>
                <span @click="show(show_picker_date_out,'out')">
                    <a href="#" v-show="!selected_out">Select Dates</a>
                     <div class="selected" v-show="selected_out">
                        <span class="date">{{this.date_out.getDate()}}</span>
                         <span class="mounth">{{this.date_out.toDateString().split(' ')[1]}}</span>
                         <br>
                        <span class="day">{{this.date_out.toDateString().split(' ')[0]}}</span>
                       
                    </div>
                </span>
                <div v-if="show_picker_date_out.display">
                    <datepicker 
                    inline=true 
                    :value="date_out" 
                    v-model="date_out"
                    @selected="show(show_picker_date_out,'out')">
                    </datepicker></div>
            </span>
        </div>
        <search-component />

    </div>
</template>

<script>

import Datepicker from 'vuejs3-datepicker';
import SearchComponent from './SearchComponent.vue';
export default {
    data() {
        return {
                show_picker_date_in: {
                    display: false
                },
                show_picker_date_out: {
                    display: false
                },
                date_in: new Date(),
                date_out: new Date(),
                selected_in: false,
                selected_out: false,
             }
 },
    components: {
         SearchComponent,
         Datepicker
    },
    methods: {
        show(status,select) {
            status.display = !status.display;
            if(select == 'in') this.selected_in = true;
            if(select == 'out') this.selected_out = true;
        }
    },
    watch: {
        date_in : {
            deep: true,
            handler(date_last,date_new) {
                this.$store.commit('set_check_in',date_last);
                console.log(this.$store.state.check_in);
            }
        },
        date_out : {
            deep: true,
            handler(date_last,date_new) {
                this.$store.commit('set_check_out',date_last);
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
    #select_day {
        display: flex;
        justify-content: space-between;
        margin-top: 20px;
        margin-left: 10%;
        margin-right: 10%;
    }

    .select {
        display: inline-block;
        height: 100px;
        width: 160px;
        border-radius: 2px;
        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
    }
    .select > span:nth-child(1) {
        display: inline-block;
        height: 30px;
        border-bottom: 1px solid white;
        width: 100%;
        padding-left: 7px;
        position: relative;
        z-index: 1;
    }
    .select > span:nth-child(1) p {
        font-size: 15px;
        line-height: 30px;
        color: #3B5C8A;
    }
    .select > span:nth-child(1) i {
        position: absolute;
        right: 5px;
        top: 0px;
        font-size: 20px;
        color: #3B5C8A;
        
    }
    .select > span:nth-child(2) a {
        font-size: 22px;
        color: #3B5C8A;
        font-weight: 600;
    }
    .select > span:nth-child(2) {
        display: inline-block;
        text-align: center;
        height: 78px;
        width: 100%;
        line-height: 72px;
    }
    .select > div {
        display: inline-block;
        position: fixed;
        top: 200px;
        left: 20%;
        z-index: 2;
        }
    .date {
        display: inline-block;
        font-size: 30px;
        color: #C1D4EF;
        line-height: 50px;
        float: left;
        margin-left: 10px;
        margin-top: 10px;
        
    }
    .selected {
        display: inline-block;
        width: 160px;
        height: 75px;
        line-height: 1;
    }
    .mounth {
        font-size: 20px;
        font-weight: 600;
        color: #35537C;
        line-height: 30px;

    }
    .day {
         color: #35537C;
         font-size: 20px;
         line-height: 40px;
    }

}
</style>
