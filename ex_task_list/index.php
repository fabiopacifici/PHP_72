<!doctype html>
<html lang='en'>

<head>
  <meta charset='utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <title>Tasks App</title>
  <!-- FontAwesome 6.2.0 CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- (Optional) Use CSS or JS implementation -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js" integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3' crossorigin='anonymous'>


</head>

<body class="bg-dark text-white vh-100 d-flex flex-column align-items center justify-content-center ">
  <div id='app'>
    <div class="container">
      <h1>Tasks</h1>
      <div class="col-4">
        <div class="add-task d-flex mb-2">
          <input type="text" v-model="newTask" @keyup.enter="saveTask" class="form-control rounded-0">
          <button @click="saveTask" class="btn btn-outline-primary rounded-0">Add</button>
        </div>
        <div class="tasks" v-if="tasks.length">
          <ul class="list-group list-group-flush">
            <li class="list-group-item d-flex justify-content-between" v-for="(task, index) in tasks">
              <span @click.stop="updateTask(index)" :class="{'text-decoration-line-through' : task.done}">
                {{task.title}}
              </span>

              <button type="button" class="btn btn-danger btn-sm" @click="deleteTask(index)">
                <i class="fas fa-trash fa-xs fa-fw"></i>
              </button>
            </li>
          </ul>
        </div>
        <div v-else>
          <p>No tasks!</p>
        </div>
      </div>

    </div>
  </div>



  <script src='https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js'></script>
  <!-- Development only cdn, disable in production -->
  <script src='https://unpkg.com/vue@3/dist/vue.global.js'></script>
  <script src='./app.js'></script>
</body>

</html>