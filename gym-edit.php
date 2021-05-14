<?php
session_start();
include("includes/rooms-header.php");
$con = mysqli_connect('localhost', 'root', '', 'phplogin');

    if(isset($_POST['gym-room-edit'])){
        $id = $_POST['gym-edit-id'];

        $query = "SELECT * FROM gymroom WHERE id='$id' ";
        $query_run = mysqli_query($con, $query);
        foreach($query_run as $row){
        ?>
            <div class="register">
                <form action="code.php" method="POST" style="border:1px solid #ccc">
                    <div class="container">
                        <div class="header">
                            <h1>Edit <span style="color:#7E7E7E;font-weight:bold">Gym Room</span> User</h1>
                        </div>
                        <input type="hidden" name="gym-edit-id" value="<?php echo $row['id'];?>">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <label for="firstName">First Name</label>
                                    <input type="text" placeholder="Enter First Name" value="<?php echo $row['firstName']?>" id="first-name" name="gymFirstName" required>
                                </div>
                                <div class="col">
                                    <label for="lastName">Last Name</label>
                                    <input type="text" placeholder="Enter Last Name" value="<?php echo $row['lastName']?>" id="last-name" name="gymLastName" required>     
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <label for="address"><b>Address</b></label>
                                    <input type="text" placeholder="Address" value="<?php echo $row['userAddress']?>" id="address" name="gymUserAddress" required>    
                                </div>
                                <div class="col">
                                    <label for="phone_number"><b>Phone Number</b></label>
                                    <input type="text" placeholder="0912-345-6789" value="<?php echo $row['phoneNum']?>" id="phone_number" name="gymPhoneNum" required>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <label for="email"><b>Email</b></label>
                                    <input type="text" placeholder="name@email.com" value="<?php echo $row['email']?>" id="email" name="gymEmail" required>                
                                </div>
                                <div class="col">
                                    <label for="nationality"><b>Nationality</b></label>
                                    <input type="text" value="<?php echo $row['nationality']?>" id="nationality" name="gymNationality" required>                
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <label for="checkIn"><b>Check In Date</b></label>
                                    <input type="text" value="<?php echo $row['checkIn']?>" id="checkIn" name="gymCheckIn" required>    
                                </div>  
                                <div class="col">
                                    <label for="checkIn"><b>Check Out Date</b></label>
                                    <input type="text" value="<?php echo $row['checkOut']?>" id="checkOut" name="gymCheckOut" required>                
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <label for="remarks"><b>Remarks</b></label>
                                    <input type="text" value="<?php echo $row['remarks']?>" id="remarks" name="gymRemarks" required>
                                </div>
                                <div class="col">
                                    <label for="userStatus"><b>Status</b></label>
                                    <input type="text" value="<?php echo $row['userStatus']?>" id="userStatus" name="gymUserStatus" required>                
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <a href="admin.php" class="btn btn-danger"> CANCEL</a>
                                </div>
                                <div class="col">
                                    <button type="submit" name="gym-room-update" class="btn btn-primary">UPDATE</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                </div>
            <?php
        }
    }
include("includes/rooms-footer.php");
include("includes/script.php");
?>