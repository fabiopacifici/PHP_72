<!doctype html>
<html lang='en'>

<head>
  <meta charset='utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <title>Document</title>
  <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3' crossorigin='anonymous'>
  <link href='./style.css' rel='stylesheet'>

</head>

<body>
  <div id='app'>
    <div class="container d-flex flex-column align-items-center">
      <h1 class="text-center">Tasks</h1>
      <div class="col-4">
        <!-- <ul class="list-group list-group-flush">
          <li class="list-group-item" v-for="task in tasks">{{task}}</li>
        </ul> -->
        <form action="server.php" method="post">
          <div class="mb-3 d-flex mt-2">
            <input type="text" name="task" id="task" class="form-control rounded-0" placeholder="Add a new task" aria-describedby="taskHelper" v-model='task' @keyup.enter="saveTasks">

            <button type="submit" class="btn btn-primary rounded-0">
              Submit
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script src='https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js'></script>
  <!-- Development only cdn, disable in production -->
  <script src='https://unpkg.com/vue@3/dist/vue.global.js'></script>
  <script src='./app.js'></script>
</body>

</html>