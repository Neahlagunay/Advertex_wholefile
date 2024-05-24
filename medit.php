<?php
  include "connection.php";
  $id = "";
  $products = "";
  $quantity = "";
  $date = "";

  $error = "";
  $success = "";

  if ($_SERVER["REQUEST_METHOD"] == 'GET') {
    if (!isset($_GET['id'])) {
      header("Location: materials.php");
      exit;
    }

    $id = $_GET['id'];
    $sql = "SELECT * FROM materials WHERE id = $id";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $products = $row["products"];
      $quantity = $row["quantity"];
      $date = $row["date"];
    } else {
      header("Location: materials.php");
      exit;
    }
  } elseif ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $id = $_POST["id"];
    $products = $_POST["products"];
    $quantity = $_POST["quantity"];
    $date = $_POST["date"];

    $sql = "UPDATE materials SET products='$products', quantity='$quantity', date='$date' WHERE id='$id'";
    if ($con->query($sql) === TRUE) {
      $success = "Record updated successfully";
    } else {
      $error = "Error updating record: " . $con->error;
    }
  }
?>

<!DOCTYPE html>
<html>

<head>
    <title>UPDATE</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="edit.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>

<!-- Add this button at the top of your body section -->
<button id="darkModeToggle" class="btn btn-secondary"><i class="fas fa-moon"></i></button>

<body>
    <div class="col-lg-6 m-auto">
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <br><br>
            <div class="card" style="margin-top: 90px;">
                <div class="card-header bg-dark">
                    <h1 class="text-white text-center">Update Materials</h1>
                </div><br>

                <!-- Display error message if there is an error -->
                <?php if (!empty($error)) : ?>
    <div class="alert alert-danger text-center">
        <?php echo $error; ?>
    </div>
<?php endif; ?>


                <!-- Display success message if there is a success -->
                <?php if (!empty($success)) : ?>
                    <div class="alert alert-success">
                        <?php echo $success; ?>
                    </div>
                <?php endif; ?>

                <input type="hidden" name="id" value="<?php echo $id; ?>" class="form-control">
                <input type="text" name="products" value="<?php echo $products; ?>" class="form-control">
                <input type="text" name="quantity" value="<?php echo $quantity; ?>" class="form-control">
                <input type="date" name="date" value="<?php echo $date; ?>" class="form-control">

                <button class="btn btn-success" type="submit" name="submit">Submit</button>
                <a class="btn btn-info" href="materials.php">Cancel</a>
            </div>
        </form>

    </div>
    <!-- Add this script at the end of your body section -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const darkModeToggle = document.getElementById('darkModeToggle');
            const body = document.body;

            // Check if dark mode preference is stored in local storage
            const isDarkMode = localStorage.getItem('darkMode') === 'true';

            // Apply dark mode if the preference is true
            if (isDarkMode) {
                body.classList.add('dark-mode');
            }

            // Toggle dark mode on button click
            darkModeToggle.addEventListener('click', function () {
                body.classList.toggle('dark-mode');
                const isDarkModeActive = body.classList.contains('dark-mode');

                // Store the dark mode preference in local storage
                localStorage.setItem('darkMode', isDarkModeActive);
            });
        });
    </script>

</body>

</html>

