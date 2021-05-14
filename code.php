<?php
session_start();
// Change this to your connection info.
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'phplogin';
// Try and connect using the info above.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

if (mysqli_connect_errno()) {
    // If there is an error with the connection, stop the script and display the error.
    exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

//Register
if(isset($_POST['sign-up-user'])){
    // Now we check if the data was submitted, isset() function will check if the data exists.
    if (!isset($_POST['username'], $_POST['password'], $_POST['email'])) {
        // Could not get the data that should have been sent.
        $_SESSION['status'] = "Please complete the registration form!";
        $_SESSION['status_code'] = "warning";
        header('Location: home.php');
    }
    // Make sure the submitted registration values are not empty.
    if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email'])) {
        // One or more values are empty.
        $_SESSION['status'] = "Please complete the registration form!";
        $_SESSION['status_code'] = "info";
        header('Location: home.php');
    }
    // We need to check if the account with that username exists.
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $_SESSION['status'] = "Email is not valid!";
        $_SESSION['status_code'] = "error";
        header('Location: home.php');
    }
    if (preg_match('/[A-Za-z0-9]+/', $_POST['username']) == 0) {
        $_SESSION['status'] = "Username is not valid!";
        $_SESSION['status_code'] = "error";
        header('Location: home.php');
    }
    if (strlen($_POST['password']) > 20 || strlen($_POST['password']) < 5) {
        $_SESSION['status'] = "Password must be between 5 and 20 characters long!";
        $_SESSION['status_code'] = "info";
        header('Location: home.php');
    }
    if ($stmt = $con->prepare('SELECT id, password FROM accounts WHERE username = ?')) {
        // Bind parameters (s = string, i = int, b = blob, etc), hash the password using the PHP password_hash function.
        $stmt->bind_param('s', $_POST['username']);
        $stmt->execute();
        $stmt->store_result();
        // Store the result so we can check if the account exists in the database.
        if ($stmt->num_rows > 0) {
            // Username already exists
            $_SESSION['status'] = "Username exists, please choose another!";
            $_SESSION['status_code'] = "info";
            header('Location: home.php');
        } else {
            // Username doesnt exists, insert new account
            if ($stmt = $con->prepare('INSERT INTO accounts (username, password, email) VALUES (?, ?, ?)')) {
                // We do not want to expose passwords in our database, so hash the password and use password_verify when a user logs in.
                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $stmt->bind_param('sss', $_POST['username'], $password, $_POST['email']);
                $stmt->execute();
                $_SESSION['status'] = "You have successfully registered, you can now login!";
                $_SESSION['status_code'] = "success";
                header('Location: home.php');
            } else {
                // Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
                $_SESSION['status'] = "Could not prepare statement!";
                $_SESSION['status_code'] = "error";
                header('Location: home.php');
            }
        }
        $stmt->close();
    } else {
        // Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
        $_SESSION['status'] = "Could not prepare statement!";
        $_SESSION['status_code'] = "error";
        header('Location: home.php');
    }
};

// login
if(isset($_POST['login_user'])){
    // Now we check if the data from the login form was submitted, isset() will check if the data exists.
    if ( !isset($_POST['username'], $_POST['password']) ) {
        // Could not get the data that should have been sent.
        $_SESSION['status'] = "Please fill both the username and password fields!";
        $_SESSION['status_code'] = "error";
        header('Location: home.php');
    }
    // Prepare our SQL, preparing the SQL statement will prevent SQL injection.
    if ($stmt = $con->prepare('SELECT id, password FROM accounts WHERE username = ?')) {
        // Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
        $stmt->bind_param('s', $_POST['username']);
        $stmt->execute();
        // Store the result so we can check if the account exists in the database.
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($id, $password);
            $stmt->fetch();
            // Account exists, now we verify the password.
            // Note: remember to use password_hash in your registration file to store the hashed passwords.
            if (password_verify($_POST['password'], $password)) {
                // Verification success! User has loggedin!
                // Create sessions so we know the user is logged in, they basically act like cookies but remember the data on the server.
                session_regenerate_id();
                $_SESSION['loggedin'] = TRUE;
                $_SESSION['name'] = $_POST['username'];
                $_SESSION['id'] = $id;
                header('Location: user.php');
            } else {
                // Incorrect password
                $_SESSION['status'] = "Incorrect username and/or password!";
                $_SESSION['status_code'] = "warning";
                header('Location: home.php');
            }
        } else {
            // Incorrect username
            $_SESSION['status'] = "Incorrect username and/or password!";
            $_SESSION['status_code'] = "warning";
            header('Location: home.php');
        }
    }
}

if(isset($_POST['gym-room-submit'])){
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $userAddress = $_POST['userAddress'];
    $phoneNum = $_POST['phoneNum'];
    $email = $_POST['email'];
    $nationality = $_POST['nationality'];
    if ($stmt = $con->prepare('INSERT INTO gymroom (firstName, lastName, userAddress, phoneNum, email, nationality) VALUES (?, ?, ?, ?, ?, ?)')) {
        $stmt->bind_param('sssiss', $_POST["firstName"], $_POST["lastName"],$_POST["userAddress"], $_POST["phoneNum"], $_POST["email"], $_POST["nationality"]);
        $stmt->execute();
        $_SESSION['status'] = "You have successfully submitted your form! Please wait for the conformation from the admin";
        $_SESSION['status_code'] = "success";
        header('Location: user.php');

    } else {
        // Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
        $_SESSION['status'] = "Could not prepare statement!";
        $_SESSION['status_code'] = "error";
        header('Location: user.php');
    }
    $stmt->close();
}
if(isset($_POST['green-room-submit'])){
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $userAddress = $_POST['userAddress'];
    $phoneNum = $_POST['phoneNum'];
    $email = $_POST['email'];
    $nationality = $_POST['nationality'];
    if ($stmt = $con->prepare('INSERT INTO greenroom (firstName, lastName, userAddress, phoneNum, email, nationality) VALUES (?, ?, ?, ?, ?, ?)')) {
        $stmt->bind_param('sssiss', $_POST["firstName"], $_POST["lastName"],$_POST["userAddress"], $_POST["phoneNum"], $_POST["email"], $_POST["nationality"]);
        $stmt->execute();
        $_SESSION['status'] = "You have successfully submitted your form! Please wait for the conformation from the admin";
        $_SESSION['status_code'] = "success";
        header('Location: user.php');

    } else {
        // Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
        $_SESSION['status'] = "Could not prepare statement!";
        $_SESSION['status_code'] = "error";
        header('Location: user.php');
    }
    $stmt->close();
}
if(isset($_POST['couple-room-submit'])){
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $userAddress = $_POST['userAddress'];
    $phoneNum = $_POST['phoneNum'];
    $email = $_POST['email'];
    $nationality = $_POST['nationality'];
    if ($stmt = $con->prepare('INSERT INTO coupleroom (firstName, lastName, userAddress, phoneNum, email, nationality) VALUES (?, ?, ?, ?, ?, ?)')) {
        $stmt->bind_param('sssiss', $_POST["firstName"], $_POST["lastName"],$_POST["userAddress"], $_POST["phoneNum"], $_POST["email"], $_POST["nationality"]);
        $stmt->execute();
        $_SESSION['status'] = "You have successfully submitted your form! Please wait for the conformation from the admin";
        $_SESSION['status_code'] = "success";
        header('Location: user.php');

    } else {
        // Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
        $_SESSION['status'] = "Could not prepare statement!";
        $_SESSION['status_code'] = "error";
        header('Location: user.php');
    }
    $stmt->close();

}
if(isset($_POST['family-room-submit'])){
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $userAddress = $_POST['userAddress'];
    $phoneNum = $_POST['phoneNum'];
    $email = $_POST['email'];
    $nationality = $_POST['nationality'];
    if ($stmt = $con->prepare('INSERT INTO familyroom (firstName, lastName, userAddress, phoneNum, email, nationality) VALUES (?, ?, ?, ?, ?, ?)')) {
        $stmt->bind_param('sssiss', $_POST["firstName"], $_POST["lastName"],$_POST["userAddress"], $_POST["phoneNum"], $_POST["email"], $_POST["nationality"]);
        $stmt->execute();
        $_SESSION['status'] = "You have successfully submitted your form! Please wait for the conformation from the admin";
        $_SESSION['status_code'] = "success";
        header('Location: user.php');

    } else {
        // Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
        $_SESSION['status'] = "Could not prepare statement!";
        $_SESSION['status_code'] = "error";
        header('Location: user.php');
    }
    $stmt->close();

}
// GYM ROOM UPDATE USER
if(isset($_POST['gym-room-update'])){

    $id = $_POST['gym-edit-id'];
    $firstName = $_POST['gymFirstName'];
    $lastName = $_POST['gymLastName'];
    $userAddress = $_POST['gymUserAddress'];
    $phoneNum = $_POST['gymPhoneNum'];
    $email = $_POST['gymEmail'];
    $nationality = $_POST['gymNationality'];
    $checkIn = $_POST['gymCheckIn'];
    $checkOut = $_POST['gymCheckOut'];
    $remarks = $_POST['gymRemarks'];
    $userStatus = $_POST['gymUserStatus'];

    $query = "UPDATE gymroom SET firstName = '$firstName', lastName = '$lastName', userAddress = '$userAddress', phoneNum = '$phoneNum', email = '$email', nationality = '$nationality', checkIn = '$checkIn', checkOut = '$checkOut', remarks = '$remarks', userStatus = '$userStatus' WHERE id='$id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run){
        $_SESSION['status'] = "Your Data is Updated";
        $_SESSION['status_code'] = "success";
        header('Location: admin.php');
    }
    else{
        $_SESSION['status'] = "Your Data is NOT Updated";
        $_SESSION['status_code'] = "error";
        header('Location: admin.php');
    }
}
// GREEN ROOM UPDATE USER
if(isset($_POST['green-room-update'])){

    $id = $_POST['green-edit-id'];
    $firstName = $_POST['greenFirstName'];
    $lastName = $_POST['greenLastName'];
    $userAddress = $_POST['greenUserAddress'];
    $phoneNum = $_POST['greenPhoneNum'];
    $email = $_POST['greenEmail'];
    $nationality = $_POST['greenNationality'];
    $checkIn = $_POST['greenCheckIn'];
    $checkOut = $_POST['greenCheckOut'];
    $remarks = $_POST['greenRemarks'];
    $userStatus = $_POST['greenUserStatus'];

    $query = "UPDATE greenroom SET firstName = '$firstName', lastName = '$lastName', userAddress = '$userAddress', phoneNum = '$phoneNum', email = '$email', nationality = '$nationality', checkIn = '$checkIn', checkOut = '$checkOut', remarks = '$remarks', userStatus = '$userStatus' WHERE id='$id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run){
        $_SESSION['status'] = "Your Data is Updated";
        $_SESSION['status_code'] = "success";
        header('Location: admin.php');
    }
    else{
        $_SESSION['status'] = "Your Data is NOT Updated";
        $_SESSION['status_code'] = "error";
        header('Location: admin.php');
    }
}
// COUPLE ROOM UPDATE USER
if(isset($_POST['couple-room-update'])){

    $id = $_POST['couple-edit-id'];
    $firstName = $_POST['coupleFirstName'];
    $lastName = $_POST['coupleLastName'];
    $userAddress = $_POST['coupleUserAddress'];
    $phoneNum = $_POST['couplePhoneNum'];
    $email = $_POST['coupleEmail'];
    $nationality = $_POST['coupleNationality'];
    $checkIn = $_POST['coupleCheckIn'];
    $checkOut = $_POST['coupleCheckOut'];
    $remarks = $_POST['coupleRemarks'];
    $userStatus = $_POST['coupleUserStatus'];

    $query = "UPDATE coupleroom SET firstName = '$firstName', lastName = '$lastName', userAddress = '$userAddress', phoneNum = '$phoneNum', email = '$email', nationality = '$nationality', checkIn = '$checkIn', checkOut = '$checkOut', remarks = '$remarks', userStatus = '$userStatus' WHERE id='$id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run){
        $_SESSION['status'] = "Your Data is Updated";
        $_SESSION['status_code'] = "success";
        header('Location: admin.php');
    }
    else{
        $_SESSION['status'] = "Your Data is NOT Updated";
        $_SESSION['status_code'] = "error";
        header('Location: admin.php');
    }
}
// FAMILY ROOM UPDATE USER
if(isset($_POST['family-room-update'])){

    $id = $_POST['familyedit-id'];
    $firstName = $_POST['familyFirstName'];
    $lastName = $_POST['familyLastName'];
    $userAddress = $_POST['familyUserAddress'];
    $phoneNum = $_POST['familyPhoneNum'];
    $email = $_POST['familyEmail'];
    $nationality = $_POST['familyNationality'];
    $checkIn = $_POST['familyCheckIn'];
    $checkOut = $_POST['familyCheckOut'];
    $remarks = $_POST['familyRemarks'];
    $userStatus = $_POST['familyUserStatus'];

    $query = "UPDATE familyroom SET firstName = '$firstName', lastName = '$lastName', userAddress = '$userAddress', phoneNum = '$phoneNum', email = '$email', nationality = '$nationality', checkIn = '$checkIn', checkOut = '$checkOut', remarks = '$remarks', userStatus = '$userStatus' WHERE id='$id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run){
        $_SESSION['status'] = "Your Data is Updated";
        $_SESSION['status_code'] = "success";
        header('Location: admin.php');
    }
    else{
        $_SESSION['status'] = "Your Data is NOT Updated";
        $_SESSION['status_code'] = "error";
        header('Location: admin.php');
    }
}
$con->close();
?>
