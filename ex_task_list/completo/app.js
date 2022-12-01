const { createApp } = Vue
createApp(
  {
    data() {
      return {
        tasks: null,
        newTask: ''
      }
    },
    methods: {
      getAllTasks() {
        axios.get('server.php').then(resp => {
          console.log(resp.data);
          this.tasks = resp.data
        }).catch(err => { console.log(err.message); })
      },
      storeTask() {
        console.log('storing a new task..');
        /*  this.tasks.push({ title: this.newTask, done: false })
         this.newTask = '' */
        const data = { title: this.newTask }
        axios.post('tasks_store.php', data, {
          headers: {
            'Content-Type': 'multipart/form-data'
          }
        }).then(response => {
          console.log(response);
          this.tasks = response.data
          this.newTask = ''
        }).catch(err => {
          console.log(err);
        })
      },
      deleteTask(index) {
        const data = {
          post_index: index
        }
        axios.post('delete_task.php', data, { headers: { "Content-Type": "multipart/form-data" } })
          .then(resp => {
            console.log(resp);
            this.tasks = resp.data
          })
          .catch(err => { console.log(err); })
      }
    },
    mounted() {
      this.getAllTasks();
    }
  }
).mount('#app')/*  */