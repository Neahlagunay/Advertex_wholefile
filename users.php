<?php
    include "connection.php";

    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
     

        // Check if the form is submitted and not just loaded
        if (!empty($name) && !empty($email) && !empty($password)) {
            $q = "INSERT INTO usertable (name, email, password,) VALUES ('$name', '$email',  '$password', )";
            $query = mysqli_query($con, $q);

            if ($query) {
                // Redirect to prevent form resubmission on page reload
                header("Location: ".$_SERVER['PHP_SELF']);
                exit();
            } else {
                echo "Error: " . mysqli_error($con);
            }
        }
    }

    // Close the database connection
    mysqli_close($con);
?><?php 
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <link rel="stylesheet" type="text/css" href="dst.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="main.js" defer></script>
	<title>Users</title>
	
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
        <a href="audit.php">
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
        <a href="login.php" href="logout.php">
          <i class="fas fa-sign-out-alt"></i>
        <span>Logout</span>
        </a>
      </li>
   </ul>
  </div>

  <div class="main--content">
    <div class="header--wrapper">
      <div class="header--title">
        <h2>Users</h2>
  </div>
  <div class="datetime">
  <div class="time"></div>
  <div class="date"></div>
</div>
</div>

<div class="container1">  
      <div class="wrapper">
      </div>
     
      <div class="container my-4">
    <table class="table">
    <thead class="table-secondary">
      <tr>
        <th>NAME</th>
        <th>EMAIL</th>
        <th>PASSWORD</th>
        <th>ACTIONS</th>
      </tr>
    </thead>
    <tbody>
    <?php
        include "connection.php";
        $sql = "select * from usertable";
        $result = $con->query($sql);
        if(!$result){
          die("Invalid query!");
        }
        while($row=$result->fetch_assoc()){
          echo "
      <tr>
        <td>$row[name]</td>
        <td>$row[email]</td>
        <td>$row[password]</td>
        <td>      
                <div>
                  <a class='btn btn-danger' href='udelete.php?id=$row[id]'>Delete</a>
                  </div>
                </td>
      </tr>
      ";  
        }
      ?>
</div>

      <div class="title">
        <h2>List of Users</h2>
      </div>
  
  </div>

  <script>
    let popup= document.getElementById("popup");

    function openPopup(){
      popup.classList.add("open-popup");

    }
    function closePopup(){
      popup.classList.remove("open-popup");
      
    }
  </script>

  <script>
    let popup2=document.getElementById("popup2");
    function openPopup2(){
      popup2.classList.add("open-popup2");
    }
    function closePopup2(){
      popup2.classList.remove("open-popup2");
    }
  </script>

  <script>
    let popup3=document.getElementById("popup3");
    function openPopup3(){
      popup3.classList.add("open-popup3");
    }
    function closePopup3(){
      popup3.classList.remove("open-popup3");
    }
  </script>
 <?php
            ?>
</body>
</html>