<!DOCTYPE HTML>
<html>
  <head>
    <title>Form</title>
    <link rel="stylesheet" href="form.css">
  </head>
  <body>
  <?php
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

  echo "<table border='1' class='form'>
  <tr>
  <th>Address</th>
  <th>City</th>
  <th>State</th>
  <th>Zip</th>
  <th>Loan Type</th>
  <th>Customer</th>
  <th>Insert Date</th>
  <th>Delete Row</th>
  </tr>";

  $result = mysqli_query($link, "SELECT * FROM Table1");

  while ($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['Address'] . "</td>";
    echo "<td>" . $row['City'] . "</td>";
    echo "<td>" . $row['State'] . "</td>";
    echo "<td>" . $row['Zip'] . "</td>";
    echo "<td>" . $row['LoanType'] . "</td>";
    echo "<td>" . $row['Customer'] . "</td>";
    echo "<td>" . $row['InsertDate'] . "</td>";
    echo "<td>" . "<form method='post'>";
    echo "<input type='submit' name='delete' value='Delete'>";
    echo "<input type='hidden' name='id' value='".$row['ID']."'>";
    echo "</form>" . "</td>";
    echo "</tr>";
  }
  echo "</table>";
  echo "<form action='demo-form.php'>
  <input type='submit' name='add' value='Add More'>
  </form>";

  if(isset($_POST['delete'])){
    $stmt = $link->prepare("DELETE FROM Table1 WHERE ID = (?)");
    $stmt->bind_param("s", $_POST['id']);
    $stmt->execute();
    header('Location: '.$_SERVER["PHP_SELF"]);
  }

  $link->close();
  ?>

  </body>
</html>