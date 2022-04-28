import { createStore } from 'vuex'

export const store = createStore({
    state: {
      check_in: '',
      check_out: '',
      numbers: 0,
      selected: false,
      type_room: []
    },
    mutations: {
      set_check_in (state, day) {
        state.check_in = `${day.getFullYear()}-${day.getMonth()}-${day.getDate()}`;
      },
      set_check_out (state,day) {
        state.check_out = `${day.getFullYear()}-${day.getMonth()}-${day.getDate()}`;
      },
      set_numbers (state, numbers) {
          state.numbers = numbers;
      },
      set_selected (state) {
          state.selected = true;
      },
      set_number_type_room (state, array) {
        state.type_room = array;
          for(var i = 0;i < array.length;i++)
          {
            state.type_room[i].quantity = 0;
            state.type_room[i].order = 0;
            state.type_room[i].rooms = [];
          }
      },
      set_type_room (state, array) {
          for(var a of array) {
            state.type_room[a.room_type_id -1].quantity++;
            state.type_room[a.room_type_id -1].rooms.push(a.id);
          }
      }
    },
    // actions: {
    //   increment (context) {
    //     context.commit('increment')
    //   }
    // }
  })