<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP Badwords</title>
  <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3' crossorigin='anonymous'>

</head>

<body>


  <div class="container">
    <h1>Censor</h1>
    <form action="script.php" method="get">
      <div class="mb-3">
        <label for="paragraph" class="form-label">Paragraph</label>
        <textarea name="paragraph" id="paragraph" class="form-control" rows="5" cols="5"></textarea>
      </div>

      <div class="mb-3">
        <label for="badword" class="form-label">Badword</label>
        <input type="text" name="badword" id="badword" class="form-control" placeholder="LOREM" aria-describedby="badwordHelper">
        <small id="badwordHelper" class="text-muted">Type a badword</small>
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>
      <button type="reset" class="btn btn-secondary">Reset</button>
  </form>
  </div>

</body>
</html>