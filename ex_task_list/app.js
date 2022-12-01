const { createApp } = Vue
createApp(
  {
    data() {
      return {
        api_url: 'read-tasks.php',
        tasks: [],
        newTask: ''
      }
    },
    methods: {
      readTasks(url) {

        axios
          .get(url)
          .then(response => {
            console.log(response); // { config:{}, data: {} }
            this.tasks = response.data
          })
          .catch(err => {
            console.error(err.message);
          })
      },
      saveTask() {
        console.log('Saving...');
        const data = {
          title: this.newTask
        }
        axios
          .post(
            'store-tasks.php',
            data,
            { headers: { 'Content-Type': 'multipart/form-data' } })
          .then(response => {
            console.log(response);
            this.tasks = response.data
            this.newTask = ''
          })
          .catch(err => {
            console.error(err.message);
          })

      }
    },
    mounted() {
      this.readTasks(this.api_url)
    }
  }
)
  .mount('#app')