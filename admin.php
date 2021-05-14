<?php
session_start();
include("includes/header.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#"><img src="img/logo-nostalgia.png"width="30" height="30" class="d-inline-block align-top" alt="Logo">
            Nostalgia
        </a>
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
          <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="#gym-room">Gym Room Table</a>
            </li>
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="#green-room">Green Room</a>
            </li>
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="#couple-room">Couple Room</a>
            </li>
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="#family-room">Family Room</a>
            </li>
          </ul>
        </div>
      </nav>
  <div class="container">
    <div class="table-title">
        <h2>Admin Table</h2>
    </div>
    <table class="table table-hover table-bordered">
      <?php
        $connection = mysqli_connect("localhost","root","","phplogin");
        
        $query = "SELECT * FROM accounts";
        $query_run = mysqli_query($connection, $query);
      ?>
      <thead class="thead-dark">
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Username</th>
          <th scope="col">Email</th>
          <th scope="col">Password</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if(mysqli_num_rows($query_run) > 0)
        {
          while($row = mysqli_fetch_assoc($query_run))
          {
            ?>
          <tr>
              <td><?php echo $row['id'];?></td>
              <td><?php echo $row['username'];?></td>
              <td><?php echo $row['email'];?></td>
              <td><?php echo $row['password'];?></td>
          </tr>
            <?php
          }
        }
        else
        {
          echo "No Record Found";
        }
        ?>
      </tbody>
      </table>

<!-- GYM ROOM TABLE -->
  <div class="table-title" id="gym-room">
    <h2 class="gym-thead"><span style="color:#7E7E7E;font-weight:bold">Gym Room</span> Table</h2>
  </div>
        <table class="table table-hover table-bordered" >
          <?php
            $connection = mysqli_connect("localhost","root","","phplogin");
            
            $query = "SELECT * FROM gymroom";
            $query_run = mysqli_query($connection, $query);
          ?>
          <thead class="gym-icon-bg">
            <tr>
              <th scope="col">ID</th>
              <th scope="col">First Name</th>
              <th scope="col">Last Name</th>
              <th scope="col">Address</th>
              <th scope="col">Phone Number</th>
              <th scope="col">Email</th>
              <th scope="col">Nationality</th>
            </tr>
          </thead>
          <tbody>
          <?php
        if(mysqli_num_rows($query_run) > 0)
        {
          while($row = mysqli_fetch_assoc($query_run))
          {
            ?>
            <tr>
              <td><?php echo $row['id'];?></td>
              <td><?php echo $row['firstName'];?></td>
              <td><?php echo $row['lastName'];?></td>
              <td><?php echo $row['userAddress'];?></td>
              <td><?php echo $row['phoneNum'];?></td>
              <td><?php echo $row['email'];?></td>
              <td><?php echo $row['nationality'];?></td>
            </tr>
            <?php
          }
        }
        else
        {
          echo "No Record Found";
        }
        ?>
          </tbody>
        </table>

        <table class="table table-hover table-bordered">
        <?php
            $connection = mysqli_connect("localhost","root","","phplogin");
            
            $query = "SELECT * FROM gymroom";
            $query_run = mysqli_query($connection, $query);
          ?>
          <thead class="gym-icon-bg">
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Check in Date</th>
              <th scope="col">Check out Date</th>
              <th scope="col">Remarks</th>
              <th scope="col">Status</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
          <?php
        if(mysqli_num_rows($query_run) > 0)
        {
          while($row = mysqli_fetch_assoc($query_run))
          {
            ?>
            <tr>
              <td><?php echo $row['id'];?></td>
              <td><?php echo $row['checkIn'];?></td>
              <td><?php echo $row['checkOut'];?></td>
              <td><?php echo $row['remarks'];?></td>
              <td><?php echo $row['userStatus'];?></td>
              <td>
                <form action="gym-edit.php" method="post">
                <input type="hidden" name="gym-edit-id" value="<?php echo $row['id'];?>">
                <button type="submit" name="gym-room-edit" class="btn gym-icon-bg">EDIT</button>
                </form>
              </td>
            </tr>
            <?php
          }
        }
        else
        {
          echo "No Record Found";
        }
        ?>
          </tbody>
        </table>
<!-- GREEN ROOM TABLE -->
        <div class="table-title" id="green-room">
          <h2 class="green-thead"> <span style="color:#76EE00; font-weight:bold">Green Room</span> Table</h2>
        </div>
        <table class="table table-hover table-bordered" >
          <?php
            $connection = mysqli_connect("localhost","root","","phplogin");
            
            $query = "SELECT * FROM greenroom";
            $query_run = mysqli_query($connection, $query);
          ?>
          <thead class="green-icon-bg">
            <tr>
              <th scope="col">ID</th>
              <th scope="col">First Name</th>
              <th scope="col">Last Name</th>
              <th scope="col">Address</th>
              <th scope="col">Phone Number</th>
              <th scope="col">Email</th>
              <th scope="col">Nationality</th>
            </tr>
          </thead>
          <tbody>
          <?php
        if(mysqli_num_rows($query_run) > 0)
        {
          while($row = mysqli_fetch_assoc($query_run))
          {
            ?>
            <tr>
              <td><?php echo $row['id'];?></td>
              <td><?php echo $row['firstName'];?></td>
              <td><?php echo $row['lastName'];?></td>
              <td><?php echo $row['userAddress'];?></td>
              <td><?php echo $row['phoneNum'];?></td>
              <td><?php echo $row['email'];?></td>
              <td><?php echo $row['nationality'];?></td>
            </tr>
            <?php
          }
        }
        else
        {
          echo "No Record Found";
        }
        ?>
          </tbody>
        </table>

        <table class="table table-hover table-bordered">
        <?php
            $connection = mysqli_connect("localhost","root","","phplogin");
            
            $query = "SELECT * FROM greenroom";
            $query_run = mysqli_query($connection, $query);
          ?>
          <thead class="green-icon-bg">
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Check in Date</th>
              <th scope="col">Check out Date</th>
              <th scope="col">Remarks</th>
              <th scope="col">Status</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
          <?php
        if(mysqli_num_rows($query_run) > 0)
        {
          while($row = mysqli_fetch_assoc($query_run))
          {
            ?>
            <tr>
              <td><?php echo $row['id'];?></td>
              <td><?php echo $row['checkIn'];?></td>
              <td><?php echo $row['checkOut'];?></td>
              <td><?php echo $row['remarks'];?></td>
              <td><?php echo $row['userStatus'];?></td>
              <td>
                <form action="green-edit.php" method="post">
                <input type="hidden" name="green-edit-id" value="<?php echo $row['id'];?>">
                <button type="submit" name="green-room-edit" class="btn green-icon-bg">EDIT</button>
                </form>
              </td>
            </tr>
            <?php
          }
        }
        else
        {
          echo "No Record Found";
        }
        ?>
          </tbody>
        </table>
<!-- COUPLE ROOM TABLE -->
        <div class="table-title" id="couple-room">
          <h2 class="couple-thead"><span style="color:#FFB7C5;font-weight:bold">Couple Room</span> Table</h2>
        </div>
        <table class="table table-hover table-bordered" >
        <?php
            $connection = mysqli_connect("localhost","root","","phplogin");
            
            $query = "SELECT * FROM coupleroom";
            $query_run = mysqli_query($connection, $query);
          ?>
          <thead class="couple-icon-bg">
            <tr>
              <th scope="col">ID</th>
              <th scope="col">First Name</th>
              <th scope="col">Last Name</th>
              <th scope="col">Address</th>
              <th scope="col">Phone Number</th>
              <th scope="col">Email</th>
              <th scope="col">Nationality</th>
            </tr>
          </thead>
          <tbody>
          <?php
        if(mysqli_num_rows($query_run) > 0)
        {
          while($row = mysqli_fetch_assoc($query_run))
          {
            ?>
            <tr>
              <td><?php echo $row['id'];?></td>
              <td><?php echo $row['firstName'];?></td>
              <td><?php echo $row['lastName'];?></td>
              <td><?php echo $row['userAddress'];?></td>
              <td><?php echo $row['phoneNum'];?></td>
              <td><?php echo $row['email'];?></td>
              <td><?php echo $row['nationality'];?></td>
            </tr>
            <?php
          }
        }
        else
        {
          echo "No Record Found";
        }
        ?>
          </tbody>
        </table>
        <table class="table table-hover table-bordered">
        <?php
            $connection = mysqli_connect("localhost","root","","phplogin");
            
            $query = "SELECT * FROM coupleroom";
            $query_run = mysqli_query($connection, $query);
          ?>
          <thead class="couple-icon-bg">
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Check in Date</th>
              <th scope="col">Check out Date</th>
              <th scope="col">Remarks</th>
              <th scope="col">Status</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
          <?php
        if(mysqli_num_rows($query_run) > 0)
        {
          while($row = mysqli_fetch_assoc($query_run))
          {
            ?>
            <tr>
              <td><?php echo $row['id'];?></td>
              <td><?php echo $row['checkIn'];?></td>
              <td><?php echo $row['checkOut'];?></td>
              <td><?php echo $row['remarks'];?></td>
              <td><?php echo $row['userStatus'];?></td>
              <td>
                <form action="couple-edit.php" method="post">
                <input type="hidden" name="couple-edit-id" value="<?php echo $row['id'];?>">
                <button type="submit" name="couple-room-edit" class="btn couple-icon-bg">EDIT</button>
                </form>
              </td>
            </tr>
            <?php
          }
        }
        else
        {
          echo "No Record Found";
        }
        ?>
          </tbody>
        </table>

<!-- FAMILY ROOM TABLE -->
        <div class="table-title" id="family-room">
          <h2 class="family-thead"><span style="color:red;">FA</span><span style="color:green;">M</span><span style="color:blue;">I</span><span style="color:black;">LY</span> <span style="color:blue;">R</span><span style="color:green;">O</span><span style="color:red;">OM</span> Table</h2>
        </div>
        <table class="table table-hover table-bordered">
          <?php
            $connection = mysqli_connect("localhost","root","","phplogin");
            
            $query = "SELECT * FROM familyroom";
            $query_run = mysqli_query($connection, $query);
          ?>
          <thead class="family-icon-bg">
            <tr>
              <th scope="col">ID</th>
              <th scope="col">First Name</th>
              <th scope="col">Last Name</th>
              <th scope="col">Address</th>
              <th scope="col">Phone Number</th>
              <th scope="col">Email</th>
              <th scope="col">Nationality</th>
            </tr>
          </thead>
          <tbody>
          <?php
        if(mysqli_num_rows($query_run) > 0)
        {
          while($row = mysqli_fetch_assoc($query_run))
          {
            ?>
            <tr>
              <td><?php echo $row['id'];?></td>
              <td><?php echo $row['firstName'];?></td>
              <td><?php echo $row['lastName'];?></td>
              <td><?php echo $row['userAddress'];?></td>
              <td><?php echo $row['phoneNum'];?></td>
              <td><?php echo $row['email'];?></td>
              <td><?php echo $row['nationality'];?></td>
            </tr>
            <?php
          }
        }
        else
        {
          echo "No Record Found";
        }
        ?>
          </tbody>
        </table> 
        <table class="table table-hover table-bordered">
        <?php
            $connection = mysqli_connect("localhost","root","","phplogin");
            
            $query = "SELECT * FROM familyroom";
            $query_run = mysqli_query($connection, $query);
          ?>
          <thead class="family-icon-bg">
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Check in Date</th>
              <th scope="col">Check out Date</th>
              <th scope="col">Remarks</th>
              <th scope="col">Status</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
          <?php
        if(mysqli_num_rows($query_run) > 0)
        {
          while($row = mysqli_fetch_assoc($query_run))
          {
            ?>
            <tr>
              <td><?php echo $row['id'];?></td>
              <td><?php echo $row['checkIn'];?></td>
              <td><?php echo $row['checkOut'];?></td>
              <td><?php echo $row['remarks'];?></td>
              <td><?php echo $row['userStatus'];?></td>
              <td>
                <form action="family-edit.php" method="post">
                <input type="hidden" name="family-edit-id" value="<?php echo $row['id'];?>">
                <button type="submit" name="family-room-edit" class="btn family-icon-bg">EDIT</button>
                </form>
              </td>
            </tr>
            <?php
          }
        }
        else
        {
          echo "No Record Found";
        }
        ?>
          </tbody>
        </table>
  </div>
</body>
</html>
<?php
include("includes/script.php");
?>