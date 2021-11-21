const app = Vue.createApp({
    data() {
        return {
          seen: true
        }
    }
  })
app.component('first-section', {
    template: `<div id="firstSection"></div>`
})
  
// mount app
app.mount('#main');
