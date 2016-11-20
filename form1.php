<?php
 
    if (isset($_POST['Submit'])) {
 
        if ($_POST['Username'] != "") {
            $_POST['Username'] = filter_var($_POST['Username'], FILTER_SANITIZE_STRING);
            if ($_POST['Username'] == "") {
                $errors .= 'Please enter a valid name.<br/><br/>';
            }
        } else {
            $errors .= 'Please enter your Username.<br/>';
        }
 
        if ($_POST['email'] != "") {
            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors .= "$email is <strong>NOT</strong> a valid email address.<br/><br/>";
            }
        } else {
            $errors .= 'Please enter your email address.<br/>';
        }
 
        if ($_POST['pwd'] != "") {
            $pwd = filter_var($_POST['pwd'],   FILTER_VALIDATE_REGEXP);
 
        } else {
            $errors .= 'Please enter your password.<br/>';
        }
 
        if (!$errors) {

            $message  = 'Username: ' . $_POST['Username'] . "\n";
            $message .= 'Email: ' . $_POST['email'] . "\n";
            $message .= 'Password: ' . $_POST['pwd'] . "\n";

        } else {
            echo '<div style="color: red">' . $errors . '<br/></div>';
        }
    }
?>
 
<form name="form1" method="post" action="form1.php">

  Username: <br/>
  <input type="text" name="Username" value="<?php echo $_POST['name']; ?>" size="50" /><br/><br/>
  Email Address: <br/>
  <input type="text" name="email" value="<?php echo $_POST['email']; ?>" size="50"/> <br/><br/>
  Password: <br/>
  <input type="password" name="pwd" value="<?php echo $_POST['pwd']; ?>" size="50" /> <br/><br/>
  <input type="submit" name="Submit" />

</form>