const { createApp } = Vue
createApp({
  data() {
    return {
      tasks: [],
      api_url: 'server.php',
      task: ''
    }
  },
  methods: {
    readTasks(url) {
      axios
        .get(url)
        .then(response => {
          console.log(response);
          this.tasks = response.data
        })
        .catch(err => {
          console.error(err.message);
        })
    },
    saveTasks() {
      const data = {
        task
      }
      axios
        .post(this.url, data, {
          headers: { 'Content-Type': 'multipart/form-data' }
        })
        .then(resp => {
          // gestisci il response

        })
        .catch(err => {
          // gestisco l'err
        })
    }
  },
  mounted() {
    this.readTasks(this.api_url);
  }
}).mount('#app')