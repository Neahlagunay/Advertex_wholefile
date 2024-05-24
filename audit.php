
<?php
    include "connection.php";

    // Close the database connection
    mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <link rel="stylesheet" type="text/css" href="dst.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="main.js" defer></script>
	<title>Audit Log</title>
	
</head>
<body>
  <div class="sidebar">
    <div class="logo">
    <a href="#"><img width="100px" height="100px" src="logo.png"></a>
    </div>
    <ul class="menu">
      <li class="active">
        <a href="#" >
          <i class="fas fa-user"></i>
          <span>Hi, Admin</span>
        </a>
      </li>
      <li>
        <a href="home.php">
        <i class="fa-solid fa-list"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li>
        <a href="materials.php">
        <i class="fa-solid fa-boxes-stacked"></i>
          <span>Materials</span>
        </a>
      </li>
      <li>
        <a href="requestor.php">
          <i class="fas fa-pen"></i>
          <span>Requestor</span>
        </a>
      </li>
      <li>
        <a href="incoming.php">
          <i class="fas fa-sign-in"></i>
          <span>Incoming</span>
        </a>
      </li>
      <li>
        <a href="outgoing.php">
          <i class="fas fa-sign-out"></i>
          <span>Outgoing</span>
        </a>
      </li>
      <li>
        <a href="supplier.php">
          <i class="fa-solid fa-table-list"></i>
          <span>Audit</span>
        </a>
      </li>
      <li>
        <a href="lockusers.php">
        <i class="fa-solid fa-users"></i>
          <span>Users</span>
        </a>
      </li>
      <li class="logout">
        <a href="logout-user.php">
          <i class="fas fa-sign-out-alt"></i>
        <span>Logout</span>
        </a>
      </li>
   </ul>
  </div>

  <?php
// Function to read and parse the audit log
function getAuditLog()
{
    global $con;

    // Assuming your table name is 'audit_log' and columns are 'timestamp', 'email', and 'status'
    $query = "SELECT timestamp, email, status FROM audit_log ORDER BY timestamp DESC";
    $result = mysqli_query($con, $query);

    $logEntries = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $logEntries[] = $row;
    }

    return $logEntries;
}

// Fetch the audit log
$auditLog = getAuditLog();

?>
     
<!<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Audit Log</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h2 class="text-center">Audit Log</h2>
                <?php if (!empty($auditLog)) : ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Timestamp</th>
                                <th>Email</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($auditLog as $logEntry) : ?>
                                <tr>
                                    <td><?= $logEntry['timestamp'] ?></td>
                                    <td><?= $logEntry['email'] ?></td>
                                    <td><?= $logEntry['status'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else : ?>
                    <p>No audit log entries found.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html>


            </div>
        </div>
    </div>




</body>
</html>