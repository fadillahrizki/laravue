import Vue from 'vue'
import Vuex from 'vuex'
import axios from 'axios'

Vue.use(Vuex)

var BASE_URL = 'http://127.0.0.1:8000/api/'

const store = new Vuex.Store({
  state: {
    all:[],
    popular:[],
    followers:[],
  },
  mutations: {
    sortArtist (state,type) {
      var data = state.all
      switch (type) {
        case "latest":
            
            state.all = data.sort((a,b) => b.id - a.id);

            break;

        case "longest":
            
            state.all = data.sort((a,b) => a.id - b.id);

            break;

        case "followers":
            
            state.all = data.sort((a,b) => b.followers - a.followers);

            break;
      }
    }
  },
  actions:{
      async getAll({state}){
        let res = await axios.get(BASE_URL+'artist')
        let data = await res.data
        
        state.all = data
      },
      async getPopular({state}){
        let res = await axios.get(BASE_URL+'artist/most-popular')
        let data = await res.data

        state.popular = data
      },
      async register({},formData){
        try{
          await axios.post(BASE_URL+'artist/store',formData,
              {
                  headers: {
                      'Content-Type': 'multipart/form-data'
                  }
              }
          )

          return true
        }catch{
          return false
        }
        
      }
  }
})

export default store