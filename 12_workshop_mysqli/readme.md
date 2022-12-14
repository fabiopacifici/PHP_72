# Workshop Mysqli

## 0. Configuration

- import the db dump via workbench
- inspect the db with the students
- point the attention to the users table

## 1. add a login form to the page

The login form has two fields

- password
- username

```html
<form action="/login.php" method="post">
  <div class="mb-3">
    <label for="username" class="form-label">Username</label>
    <input type="text" class="form-control" name="username" id="username" aria-describedby="usernameHelper" placeholder="Mario">
    <small id="usernameHelper" class="form-text text-muted">Type your user Name</small>
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" name="password" id="password" class="form-control" placeholder="password" aria-describedby="passwordHelper">
    <small id="passwordHelper" class="text-muted">Type your password</small>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
```

## 2. Handle the login process

The form is submitted to a login.php file, so we need to create it.

```bash
mkdir login.php
```

To login a user we need to establish a connection with the database first then perform a sql query to the users table so that we can check if there is a user with the username and password provided at log in, then redirect to the desided page.

These are the tasks to write down in the login.php file:

- 1. Open a db connection
- 2. Perform a SQL query to search for the given user
- 3. If there is a user save it to the session $_SESSION.
- 4. redirect to a get route.

## 2.1 Database connection

To connect with a database we need to establish the connection using the `new mysqli()` class constructor. The constructor expects 4 parameters at least that we can define in a dedicated file as constants variables.

### Define the constants variables

Let's put the constants in a dedicated file.

```php
//env.php
define("DB_SERVERNAME", "localhost:3307");
define("DB_USERNAME", "fab");
define("DB_PASSWORD", "password");
define("DB_NAME", "72_mysqli_workshop");

```

And now we can import them and open the connection:

```php
require __DIR__ . '/env.php';

$connection = new mysqli(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME);
if($connection && $connection->connect_error) {
  echo "Database Connection Failed";
  die;
}
var_dump($connection);
```

In the code above we create the instance of the `mysqli` then check if the connection was established but with errors and return an error message. Finally we dump the connection object the screen.

Every time we need to make a SQL query we will need to open a connection and then close it using the following instructions

```php
$connection->close();
var_dump($connection);
```

To keep our code organized we can create a class that will handle the connection with the
database. Our class could have two static methods, one to open a connection `DB::connect()` and one to close it `DB::disconnect()`;

### OOP Approach - Refactor into a dedicated class

Let's create a class called DB.php and refactor the connection code into a dedicated static method `connect` and make it return the connection object and a `disconnect` method to close the connection.

```php
// DB.php file

require __DIR__ . '/env.php'; // '👈 Import the env file'

class DB
{

  public static function connect()
  {
    // Create a new instance of the mysqli classs
    // and pass the servername, username, password, and db name
    // using the constants defined in the env.php file
    $connection = new mysqli(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME);

    if($connection && $connection->connect_error) {
      throw new Exception("Database Connection Failed.");
    }
    //var_dump($connection);
    return $connection;
  }

  public static function disconnect($connection)
  {
    $connection->close();
  }
}

```

The connect method implementation is the same we initially wrote in the login.php file.For the disconnect function we only need to pass the `$connection` parameter and pass the connection object when we call the method.

### Import the db class in the login file and open a connection

Now back in the **login.php** file we can delete everything and just import the db class and call it's methods.

```php

// Open a db connection
require_once __DIR__ . '/DB.php';
$connection = DB::connect();
var_dump($connection)
// Perform a SQL query to search for the given user

// If there is a user save it to the session $_SESSION.

// redirect to a get route.

```

Now that our connection has been established we can perform the sql query to log the user in.

## 2.2 Perform SQL query to search for the given user

Still in the login.php file, let's move forward and handle the form submission and perform the query.

```php
# Perform a SQL query to search for the given user
// check if the form was submitted correctly
if (isset($_POST['username']) && isset($_POST['password'])) {
  $username = $_POST['username'];
  // hash the password
  // perform the sql query and save the result
  
}
```

In the code above we first check if the form has the fields `username` and `password` using the POST superglobal. Then we list the next steps.

The SQL query we need to perform is the following:

```SQL

SELECT `username`, `password` from `users` WHERE `password` = ? AND `username` = ?;
```

We know that run a sql query using the data we got from the user exposes our app to SQL injections `SELECT username, password from users WHERE password = $md5Password AND username = $_POST['username'];`, so let's prepare our statement first and only then execute it.

```php
//login.php
if (isset($_POST['username']) && isset($_POST['password'])) {
  $username = $_POST['username'];
  // hash the password
  $md5password = md5($_POST['password']);

  // 👉 perform the sql query and save the result
  $statement = $connection->prepare("SELECT `id`, `username` FROM `users` WHERE `username` = ? and `password` = ?");
  // bind the parameters username and md5password with the placeholders
  $statement->bind_param('ss',
    $username,
    $md5password
  );

  // execute the query
  $statement->execute();
  var_dump($statement);
  
  // Get all results
  $result = $statement->get_result();
  var_dump($result);

  // Get the number of results (rows) obtained
  $num_rows = $result->num_rows; 
  var_dump($num_rows);

  if ($num_rows > 0) {
    $row = $result->fetch_assoc();
    var_dump($row);
  } else {
    var_dump('nothing');
  }
}

```

On the mysqli_result object we can call the `$result->fetch_assoc()` method to get the resulting row as an associative array, the data we get could be stored in the session.

Before moving to the next step, where we save the user into the session
so we can keep the login process active, let's refactor this code in a dedicated class, so that by the end we can run something like that `User::find()`.

### OOP Approach - Refactor

Let's cretea User class and move there all the come we implemented above to perform the SQL query

```php
class User
{
  protected $table = 'users';

  public static function find($username, $password, $connection)
  {
    
    // 👉 perform the sql query and save the result
    $statement = $connection->prepare("SELECT `id`, `username` FROM `users` WHERE `username` = ? and `password` = ?");

    $statement->bind_param(
      'ss',
      $username,
      $password
    );

    $statement->execute();
    //var_dump($statement);
    $result = $statement->get_result();
    //var_dump($result);
    $num_rows = $result->num_rows;
    //var_dump($num_rows);

    if ($num_rows > 0) {
      $row = $result->fetch_assoc();
      return $row;
    }
    return false;
  }
}
```

The class method `find` performs only the query and returns either the array with the data or false.
We can now call this method in the login.php file and save it's result in the session.

### All toghether login.php

This is how the login file looks now after the refactoring

```php
require_once __DIR__ . '/Models/User.php'; // 👈 Import the User class
# Open a db connection
require_once __DIR__ . '/DB.php';
$connection = DB::connect();
//var_dump($connection);

# Perform a SQL query to search for the given user
// check if the form was submitted correctly
if (isset($_POST['username']) && isset($_POST['password'])) {
  $username = $_POST['username'];
  // hash the password
  $md5password = md5($_POST['password']);

  // perform the sql query and save the result  
  // 👇 Call the find method of the User class 
  $result = User::find($username, $md5password, $connection); 

}

# If there is a user save it to the session $_SESSION.


# redirect to a get route.


```

## 2.3 Save the user to the session

Now we can take the results and save the user details to the session.

```php
//login.php
//....
# If there is a user save it to the session $_SESSION.
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
if($result) {
  $_SESSION['userId'] = $result['id'];
  $_SESSION['username'] = $result['username'];
} else {
  // otherwise save empty values
  $_SESSION['userId'] = 0;
  $_SESSION['username'] = '';
}
session_write_close();

# redirect to a get route.
var_dump('Time to redirect the user to a page');
```

In the code above we first check the session status (session active but empty) and start the session, save the id and username (or empty values) and then we close the session.

If we see the dump message we are all sorted and can move forward and redirect back to the previous page where we can recover the data from the session.

## 2.4. Redirect

```php
//login.php
//..

# redirect to a get route.
//var_dump('Time to redirect the user to a page');
header('Location: /index.php');
```

And next we can test the form submission by adding at the top of the index file this code snippet

```php
// index.php
session_start();
if(!empty($_SESSION['username'])) {
  echo 'Hi ' . $_SESSION['username'];
}
```

After completing the login form, we should be redirected back to the form and see a greeting message like 'Hi mario'.

## 3 Show all departments to the logged in user

Now that we have a login process we can use query the db to obtain all departments and show them to the user in a table.

let's create a class so that later inside the index.php file we can run simply run `Department::all()` to query the db.

```php
require_once __DIR__ . '/../DB.php';
class Department {
  public static function all()
  {
    // connect to the db
    $connection = DB::connect();
    // make the query
    $result = $connection->query('SELECT * FROM `departments`');
    // close the connection
    DB::disconnect($connection);
    // return the data
    return $result;
  }
}
```

Now call the method in the index.php file

```php
session_start();
if(!empty($_SESSION['username'])) {
  echo 'Hi ' . $_SESSION['username'];
  
  #3 Get all departments
  require_once __DIR__ . '/Models/Department.php';
  
  $departments = Department::all();
  var_dump($departments);

}

```

If the query goes well we should get a `mysqli_result` object as response.
We can use this response to loop over the results and show the data in a table.

```php
// show the content of the num_rows
var_dump($departments->num_rows);
// show the result of this condition to see if we have rows
var_dump($departments->num_rows > 0);
// Show that fetch assoc can be called many times per the number of num_rows
var_dump($departments->fetch_assoc());
var_dump($departments->fetch_assoc());
var_dump($departments->fetch_assoc());
var_dump($departments->fetch_assoc());
//..

```

We can use this knowlege to create a markup and outsput the recors on the page.

### Show departments

Let's first check if the session has `userId` and `username` keys first and if so
we show the departments, otherwise we can assume the user is not logged in and we can just show the login card.

```php
<main>

  <?php if (
      !empty($_SESSION["userId"]) && 
      !empty($_SESSION['username'])) { 
    ?>
    <h3>Benvenuto <?php echo $_SESSION['username']; ?> </h3>
    
    /* IF/WHILE Loop $departments->fetch_assoc()*/
  
    <?php } else { ?>
    /* LOGIN CARD - !Move the Login Card Here! */
  <?php } ?>

</main>
```

Now after YOU MOVED the login card inside the else block, you can loop over the rows of the database table and show the departments.

```php
<div class="row">

  <div class="col-12">

    <ul class="list-group">
    <?php
      // la query è andata a buon fine e ci sono delle righe di risultati
      if ($departments && $departments->num_rows > 0) :
        /* finché ci sono righe di risultati */
        while ($department = $departments->fetch_assoc()) : 
        ?>
        
        <li class="list-group-item">
          <?php echo $department['email']; ?>
          <?php echo $department['name']; ?>
        </li>

        <?php 
        endwhile; 
        /* TODO: Other cases: no records or error */
      endif; ?>

    </div>
  </div>
</div>


```

We should see all 12 departments names and emails on the screen.

Next we need to consider two other cases:

- if the query returns 0 rows
- or if it returns an error
 before closing the endif.

 ```php
 <?php endwhile;
 elseif ($departments) : ?>
<!-- la query è andata a buon fine ma non ci sono righe di risultati -->
  <li class="list-group-item d-flex justify-content-between align-items-start">
    <div class="ms-2 me-auto">
      <?php echo "0 results"; ?>
    </div>
  </li>
<?php else : ?>
  <!-- si è verificato un errore nella query (es: nome tabella sbagliato) -->
  <li class="list-group-item d-flex justify-content-between align-items-start">
    <div class="ms-2 me-auto">
      <?php echo "query error"; ?>
    </div>
  </li>
<?php endif; ?>

```

Now let's output everything, this is how the index.php file markup looks like

```html
<main>

    <!-- verifichiamo se le variabili di sessione sono valide -->
    <?php if (!empty($_SESSION["userId"]) && !empty($_SESSION['username'])) { ?>
      <section class="university bg-light">
        <div class="container">

          <h3>Benvenuto <?php echo $_SESSION['username']; ?> </h3>

          <div class="row">

            <div class="col-12">

              <ul class="list-group">

                <?php if ($departments && $departments->num_rows > 0) {
                  // la query è andata a buon fine e ci sono delle righe di risultati
                  while ($row = $departments->fetch_assoc()) {
                ?>
                    <!-- finché ci sono righe di risultati -->
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                      <div class="ms-2 me-auto">
                        <div class="fw-bold"><?php echo $row['email']; ?></div>
                        <?php echo $row['name']; ?>
                      </div>
                    </li>

                  <?php }
                } elseif ($result) { ?>
                  <!-- la query è andata a buon fine ma non ci sono righe di risultati -->
                  <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                      <?php echo "0 results"; ?>
                    </div>
                  </li>
                <?php } else { ?>
                  <!-- si è verificato un errore nella query (es: nome tabella sbagliato) -->
                  <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                      <?php echo "query error"; ?>
                    </div>
                  </li>
                <?php } ?>

              </ul>

            </div>

          </div>
        </div>
      </section>

    <?php } else { ?>

      <div class="container d-flex justify-content-center align-items-center">
        <div class="card m-5 col-6">
          <h3 class="p-4">Login</h3>
          <div class="card-body">
            <form action="/test/login.php" method="post">
              <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" name="username" id="username" aria-describedby="usernameHelper" placeholder="Mario">
                <small id="usernameHelper" class="form-text text-muted">Type your user Name</small>
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="password" aria-describedby="passwordHelper">
                <small id="passwordHelper" class="text-muted">Type your password</small>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
      </div>
    <?php } ?>
  </main>

```

## 4 Implement a Logout

To log the user out, we need a form to send a post request to a file that destroys the session.

In the header let's put the logout form

```php
 <form action="logout.php" method="post">
  <input type="text" name="logout" id="logout" value="1" hidden>
  <button type="submit" class="btn btn-outline-success">Log out</button>
</form>
```

We placed an hidden input to send to the server a value so that we can use it to log out the user.

Let's handle the form submision by creating a logout.php file

```php
// check if the session status and start the session
// https://www.php.net/manual/en/function.session-status.php
if (session_status() === PHP_SESSION_NONE) {
  // start the session
    session_start();
}
// check if there is a logout in the post superglobal 

$has_logout = boolval($_POST['logout']);

if($has_logout) {
  var_dump("destroy the session and redirect back");
// destroy the session
  session_destroy();
// redirect the user back with a query param that we can use to show an alert on the screen for correct logout
  header("Location: index.php?logout=success");
}

```

Let's show an alert message for the successful logout

```php

  <?php if ($_GET['logout']) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      <strong>Logged out successfully</strong>
    </div>
  <?php endif ?>
```

Now we need to show the logout button only if we haven't already logged out, so let's wrap our form in an if statement.

```php
<?php if (!$_GET['logout']) : ?>

  <form action="logout.php" method="post">
    <input type="text" name="logout" id="logout" value="1" hidden>
    <button type="submit" class="btn btn-outline-success">Log out</button>
  </form>

<?php endif ?>
```
