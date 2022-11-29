<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Salutare utente con form</title>
  <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3' crossorigin='anonymous'>
</head>
<body>
  

<div class="container mt-5">
  <h1>Fill the form</h1>
  <form action="greetings.php" method="get">
  <div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" name="name" id="name" class="form-control" placeholder="Mario" aria-describedby="nameHelper">
    <small id="nameHelper" class="text-muted">Just type your name here</small>
  </div>
  <div class="mb-3">
    <label for="lastname" class="form-label">Lastname</label>
    <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Rossi" aria-describedby="lastnameHelper">
    <small id="lastnameHelper" class="text-muted">Just type your lastname here</small>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
  <button type="reset" class="btn btn-danger">Reset</button>
  </form>
</div>
</body>
</html>