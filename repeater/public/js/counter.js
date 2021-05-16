



export default {
  name: 'app',
  data() {
      return {
          counter: 0
      }
      },
      mounted() {
        setInterval(() => {
          this.counter++
        }, 1000)
  }
}



//   const Counter = {
//     data() {
//     return {
//         counter: 0
//     }
//     },
//     mounted() {
//       setInterval(() => {
//         this.counter++
//       }, 1000)
// }
// }
// Vue.createApp(Counter).mount('#proba')