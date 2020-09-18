<!DOCTYPE HTML>
<html>
  <head>
    <title>Demo Form</title>
    <link rel="stylesheet" href="main.css">
  </head>
  <body>

    <?php
    // define variables and set to empty values
    $addressErr = $cityErr = $stateErr = $zipErr = $addressErr = $loadType = $customer = "";
    $flag = true;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      define('DB_NAME', 'Demo');
      define('DB_USER', 'root');
      define('DB_PASSWORD', 'password');
      define('DB_HOST', '127.0.0.1');

      $link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

      if (!$link) {
        die('Could not connect: ' . mysqli_error($link));
      }

      $db_selected = mysqli_select_db(DB_NAME, $link);

      if ($db_selected) {
        die('Can\'t use ' . DB_NAME . ': ' . mysqli_error($db_selected));
      }

      if (empty($_POST['Address'])) {
        $flag = false;
        $addressErr = "Address is required";
      } else {
        $address = $_POST["Address"];
      }

      if (empty($_POST['City'])) {
        $flag = false;
        $cityErr = "City is required";
      } else {
        $city = $_POST["City"];
      }

      if (empty($_POST['State'])) {
        $flag = false;
        $stateErr = "State is required";
      } else {
        $state = $_POST["State"];
      }

      if (empty($_POST['Zip'])) {
        $flag = false;
        $zipErr = "Zip is required";
      } else {
        $zip = $_POST["Zip"];
      }

      if (empty($_POST['LoanType'])) {
        $flag = false;
        $loanTypeErr = "Loan Type is required";
      } else {
        $loanType = $_POST["LoanType"];
      }

      if (empty($_POST['Customer'])) {
        $flag = false;
        $customerErr = "Customer is required";
      } else {
        $customer = $_POST["Customer"];
      }

      if ($flag) {
        $stmt = $link->prepare("INSERT INTO Table1 (Address, City, State, Zip, LoanType, Customer) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $address, $city, $state, $zip, $loanType, $customer);
        $stmt->execute();
      }
    }
    ?>

    <p class="title"> Demo Form </p>
    <p class="required">* required field</p>
    <div class="container">
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <label>Address</label>
        <span class="error">* <?php echo $addressErr;?></span>
        <input type="text" name="Address"><br />
        <label>City</label>
        <span class="error">* <?php echo $cityErr;?></span>
        <input type="text" name="City"><br />
        <label>State</label>
        <span class="error">* <?php echo $stateErr;?></span>
        <input type="text" name="State"><br />
        <label>Zip</label>
        <span class="error">* <?php echo $zipErr;?></span>
        <input type="text" name="Zip"><br />
        <label>Loan Type</label>
        <span class="error">* <?php echo $loanTypeErr;?></span>
        <input type="text" name="LoanType"><br />
        <label>Customer</label>
        <span class="error">* <?php echo $customerErr;?></span>
        <input type="text" name="Customer"><br />
        <input type="submit" name="submit" value="Submit">
        <input type="submit" name="show" value="Show All" onclick="form.php">
      </form>
    </div>
  </body>
</html>

<?php
if(isset($_POST['show'])){
  $link->close();
  header("Location: http://localhost:8888/form.php");
  exit;
}
?>