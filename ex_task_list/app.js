const { createApp } = Vue
createApp(
  {
    data() {
      return {
        api_url: 'Controllers/read-tasks.php',
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
            'Controllers/store-tasks.php',
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

      },
      updateTask(index) {
        console.log('updating...');
        //this.tasks[index].done = !this.tasks[index].done
        const data = {
          'task_index': index,
          'done': true
        }

        axios
          .post('Controllers/update-tasks.php', data, { headers: { "Content-Type": 'multipart/form-data' } })
          .then(response => {
            console.log(response);
            this.tasks = response.data
          })
          .catch(err => {
            console.error(err.message);
          })
      },
      deleteTask(index) {
        console.log('deleting', this.tasks[index], 'task');
        const data = {
          'task_index': index
        }

        axios
          .post('Controllers/delete-tasks.php', data, { headers: { "Content-Type": "multipart/form-data" } })
          .then(response => {
            console.log(response);
            this.tasks = response.data
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