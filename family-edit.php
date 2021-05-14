<?php
session_start();
include("includes/rooms-header.php");
$con = mysqli_connect('localhost', 'root', '', 'phplogin');

    if(isset($_POST['family-room-edit'])){
        $id = $_POST['family-edit-id'];

        $query = "SELECT * FROM familyroom WHERE id='$id' ";
        $query_run = mysqli_query($con, $query);
        foreach($query_run as $row){
        ?>
            <div class="register">
                <form action="code.php" method="POST" style="border:1px solid #ccc">
                    <div class="container">
                        <div class="header">
                            <h1>Edit <span style="color:red;">FA</span><span style="color:green;">M</span><span style="color:blue;">I</span><span style="color:black;">LY</span> <span style="color:blue;">R</span><span style="color:green;">O</span><span style="color:red;">OM</span> User</h1>
                        </div>
                        <input type="hidden" name="family-edit-id" value="<?php echo $row['id'];?>">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <label for="firstName">First Name</label>
                                    <input type="text" placeholder="Enter First Name" value="<?php echo $row['firstName']?>" id="first-name" name="familyFirstName" required>
                                </div>
                                <div class="col">
                                    <label for="lastName">Last Name</label>
                                    <input type="text" placeholder="Enter Last Name" value="<?php echo $row['lastName']?>" id="last-name" name="familyLastName" required>     
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <label for="address"><b>Address</b></label>
                                    <input type="text" placeholder="Address" value="<?php echo $row['userAddress']?>" id="address" name="familyUserAddress" required>    
                                </div>
                                <div class="col">
                                    <label for="phone_number"><b>Phone Number</b></label>
                                    <input type="text" placeholder="0912-345-6789" value="<?php echo $row['phoneNum']?>" id="phone_number" name="familyPhoneNum" required>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <label for="email"><b>Email</b></label>
                                    <input type="text" placeholder="name@email.com" value="<?php echo $row['email']?>" id="email" name="familyEmail" required>                
                                </div>
                                <div class="col">
                                    <label for="nationality"><b>Nationality</b></label>
                                    <input type="text" value="<?php echo $row['nationality']?>" id="nationality" name="familyNationality" required>                
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <label for="checkIn"><b>Check In Date</b></label>
                                    <input type="text" value="<?php echo $row['checkIn']?>" id="checkIn" name="familyCheckIn" required>    
                                </div>  
                                <div class="col">
                                    <label for="checkIn"><b>Check Out Date</b></label>
                                    <input type="text" value="<?php echo $row['checkOut']?>" id="checkOut" name="familyCheckOut" required>                
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <label for="remarks"><b>Remarks</b></label>
                                    <input type="text" value="<?php echo $row['remarks']?>" id="remarks" name="familyRemarks" required>
                                </div>
                                <div class="col">
                                    <label for="userStatus"><b>Status</b></label>
                                    <input type="text" value="<?php echo $row['userStatus']?>" id="userStatus" name="familyUserStatus" required>                
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <a href="admin.php" class="btn btn-danger"> CANCEL</a>
                                </div>
                                <div class="col">
                                    <button type="submit" name="family-room-update" class="btn btn-primary">UPDATE</button>
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