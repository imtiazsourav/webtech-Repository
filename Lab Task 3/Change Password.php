<?php
        $errpassword = $error = $errcpassword = $errpasswordr ="";
        $password = $cpassword = $passwordr ="";
        $cpass ="abc@1234";
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Change Password</title>
        <style>
                .error{color: #ff0000;}
                .green{color: #00afcd;}
        </style>
</head>
<body>
<?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                
    //Validates password & confirm passwords.
    if(!empty($_POST["password"]) && ($_POST["password"] == $_POST["cpassword"])) {
        $password = test_input($_POST["password"]);
        $cpassword = test_input($_POST["cpassword"]);
        if (strlen($_POST["password"]) <= '8') {
            $errpassword = "Your Password Must Contain At Least 8 Characters!";
        }
        elseif(!preg_match("#[0-9]+#",$password)) {
            $errpassword = "Your Password Must Contain At Least 1 Number!";
        }
        elseif(!preg_match("#[A-Z]+#",$password)) {
            $errpassword = "Your Password Must Contain At Least 1 Capital Letter!";
        }
        elseif(!preg_match("#[a-z]+#",$password)) {
            $errpassword = "Your Password Must Contain At Least 1 Lowercase Letter!";
        } else {
            $errcpassword = "Please Check You've Entered Or Confirmed Your Password!";
        }
    }
    
        
}
        
function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data; }    
?>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
                     <?php   
                     if(isset($error))  
                     {  
                          echo $error;  
                     }  
                     ?>  
                     <br>
        <fieldset>
                <legend>CHANGE PASSWORD</legend>
                <label>Current Password</label>
                <input type="password" name = "cpassword"/>
                <span> <?php echo $errcpassword;?></span> <br>

                <label class="green">New Password</label>
                <input type="password" name = "password"/>
                <span class="error"> <?php echo $errcpassword;?></span> <br>

                <label class="error">Retype New Password</label>
                <input type="password" name = "passwordr"/>
                <span class="error"> <?php echo $errpasswordr;?></span> <br>

        </fieldset>

        <input type="submit"><br>

</body>
</html>

<?php
/*/
if (empty($_POST["pass"])) {
                $errPass = "Password is required";
              } else {
                $pass = test_input($_POST["pass"]);
                if(preg_match("/^.*(?=.{8,})(?=.*[@,#,$]).*$/", $_POST["pass"]) === 0){
                $errPass ="password must contain at least 8 characters and one special character (@,#,$)";
                }
              }
*/