<?php
        $errUser = $errPass ="";
        $user = $pass ="";
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <style>
                .error{color: #ff0000;}
        </style>
</head>
<body>
<?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (empty($_POST["user"])) {
                        $errUser = "Username is required";
                      } else {
                        $user = test_input($_POST["user"]);

                        //User must be digits and letters param 6 is using for atleast 6 char long
                        if(preg_match("/^[A-Za-z][A-Za-z]*([._][A-Za-z0-9]+)?$/", $_POST["user"]) === 0){
                                $errUser ="enter username correctly";
                       //"/[a-zA-Z][^a-z]*[a-z]/i"       
                       //[^a-z]*[a-z]){2,}
                       //(?=.*[A-Za-z]{2,})
                      }
        }
        if (empty($_POST["pass"])) {
                $errPass = "Password is required";
              } else {
                $pass = test_input($_POST["pass"]);
                if(preg_match("/^.*(?=.{8,})(?=.*[@,#,$]).*$/", $_POST["pass"]) === 0){
                $errPass ="password must contain at least 8 characters and one special character (@,#,$)";
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
                <legend>Login</legend>
                <label>User Name</label>
                <input type="text" name = "user"/>
                <span class="error">* <?php echo $errUser;?></span><br />
                <label>Password</label>
                <input type="password" name = "pass"/>
                <span class="error">* <?php echo $errPass;?></span>
        </fieldset>

        <input type="submit"><br>

</body>
</html>