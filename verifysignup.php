<?php

require_once('dbcon.php');

if(isset($_GET['email']) && !empty($_GET['email']) && isset($_GET['hash']) && !empty($_GET['hash']))
{

    $verifyemail = $_GET['email'];
    $verifyhash = $_GET['hash'];

    $verifysql = "SELECT email,hash,active FROM numbers WHERE email = '$verifyemail' AND hash = '$verifyhash' AND  active = 'Not Verified' ";

    $verifysqlresult = $conn->query($verifysql);

    if ($verifysqlresult-> num_rows > 0)
    {
        // We have a match, activate the account
        $accountverified = "UPDATE numbers SET active = 'Verified' WHERE email = '$verifyemail' AND hash= '$verifyhash' AND active = 'Not Verified' ";
        $accountverifiedresult = $conn->query($accountverified);

        echo 'Your account has been activated, you can now 
        <a href="loginform.php">login</a>.';
    }

    else
    {
        echo 'invalid verification attempt';
    }
}
else
{
    // Invalid approach
    echo 'invalid verification link';
}


$conn->close();

?>