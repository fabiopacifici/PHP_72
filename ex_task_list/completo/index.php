<!doctype html>
<html lang='en'>

<head>
  <meta charset='utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <title>Task app</title>
  <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3' crossorigin='anonymous'>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
  <link href='./style.css' rel='stylesheet'>
</head>

<body class="bg-dark d-flex justify-content-center text-white vh-100">
  <div id='app' class="col-4">

    <div class="container mt-5">
      <div class="col-12">
        <h1 class="display-2 text-warning text-center">Tasks</h1>

        <div class="add_task d-flex mb-2">
          <input type="text" v-model="newTask" @keyup.enter="storeTask" class="w-100 rounded-0">
          <button type="button" class="btn btn-outline-warning rounded-0" @click="storeTask">Add</button>

        </div>
        <div class="tasks" v-if="tasks">
          <ul class="list-group list-flush">
            <li v-for="(task, index) in tasks" class="d-flex justify-content-between list-group-item" :class="{'text-decoration-line-through': task.done}">
              <span @click.stop="task.done = !task.done">
                {{ task.title }}
              </span>
              <button class="btn btn-danger btn-sm"><i class="fas fa-trash" @click.stop="deleteTask(index)"></i></button>
            </li>
          </ul>
        </div>
        <div v-else>
          <p class="lead">No tasks</p>
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