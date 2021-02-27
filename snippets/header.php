<img src = "/img/logo.png" alt = "Logo">
<p><?php 
if ($_SESSION['loggedin']){
    echo "<a href = '/accounts/index.php?action=Logout'>Log Out</a>";
} else {
    echo "<a href = '/accounts/index.php?action=login'>My Account</a>";
}
?>

</p><?php
if($_SESSION['loggedin']){
    echo "<a href = '/accounts/index.php/?action=none' class = 'name-label'>Welcome ".$_SESSION['clientData']['clientFirstname']."</a>";
} ?>