1. Connecting to a MySQL Database
<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>


2. Need to redirect your users to another page?
header("Location: https://www.yourwebsite.com");
    exit;

3. Query a MySQL Database
$sql = "SELECT id, firstname, lastname FROM MyGuests";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
}
} else {
echo "0 results";
}
$conn->close();


3. Simple registration form
  <?php 
    session_start();
    if (isset($_POST['submit'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $mobile = $_POST['mobile'];
        $query="insert into users (login,password,mobile) VALUES ('$email','$password','$mobile')";
        $result=mysqli_query($conn,$query);
        if($result){
            $query="select id from users where login = '$email' and password = '$password'";
            $request=mysqli_query($conn,$query);
            $row=$request->fetch_assoc();
            $id = $row["id"];
            $_SESSION["userid"]=$id;
            print($query);
            print($id);
            die(mysqli_error($conn));
        }

        }
?>


<div class="container">
<form method="post" class="row g-3">
  <h3>Форма регистрации</h3>
  <div class="col-lg-12 col-md-6">
    <label  for="email_input" class="form-label">Email</label>
    <input type="email" name="email" class="form-control" id="email_input">
  </div>
  <div class="col-lg-12 col-md-6">
    <label  for="password_input" class="form-label">Password</label>
    <input type="password" name="password" class="form-control" id="password_input">
  </div>
  <div class="col-lg-12 col-md-6">
    <label  for="mobile_input" class="form-label">Номер телефона</label>
    <input type="text" class="form-control" name="mobile" id="mobile_input" placeholder="+79999999999">
  </div>
  <div class="col-12">
    <button type="submit" name="submit" class="btn btn-primary">Зарегистроваться</button>
  </div>
</form>

4. Another query
      <?php
        include_once("connect.php");
        $count = 0;
        $query = mysqli_query($conn,"SELECT * FROM 1");
                foreach($query as $row){
                    $count++;
                    $pos = strpos($row["name"], "//");
                    if ($pos != 0) {
                        $row["name"] = substr($row["name"], 0 , $pos);
                    }
                }
    ?>


5. From-to form

    <form method="post">
                <div class="form-group">
                  <label>From Date:</label>
                  <input type="date" class="form-control" name="fromdate" placeholder="From Date" required>
                </div>
                <div class="form-group">
                  <label>To Date:</label>
                  <input type="date" class="form-control" name="todate" placeholder="To Date" required>
                </div>
                <div class="form-group">
                  <textarea rows="4" class="form-control" name="message" placeholder="Message" required></textarea>
                </div>
              <?php if($_SESSION['userid'])
                  {?>
                  <div class="form-group">
                    <input type="submit" class="btn"  name="submit" value="Book Now">
                  </div>
                  <?php } else { ?>
                        <a href="#loginform" class="btn btn-xs uppercase" data-toggle="modal" data-dismiss="modal">Login For Book</a>

                  <?php } ?>
              </form>
