<?php 


    if ($_SERVER['REQUEST_METHOD'] === "POST")
     {

        $isValid = true;
        if (empty($_POST['Fname']))
        {
            echo "Please Fill up the Firstname Properly";
            echo "<br>";
            $isValid=false;

        }

        if (empty($_POST['Lname']))
        {
            echo "Please Fill up the Firstname Properly";
            echo "<br>";
            $isValid=false;

        }

        if (empty($_POST['email']))
        {
            echo "Please Fill up the Email Properly";
            echo "<br>";
            $isValid=false;
        }

        if (empty($_POST['pwd']))
        {
            echo "Please Fill up the Password Properly";
            echo "<br>";
            $isValid=false;
        }

        if (empty($_POST['cpwd']))
        {
            echo "Please Fill up the Confirm Password Properly";
            echo "<br>";
            $isValid=false;
        }

        if($_POST['pwd'] != $_POST['cpwd'])
        {
            echo "password does not match";
            echo "<br>";
            $isValid = false;
        }

        else  
      {  
           if(file_exists('../Model/AdminF.json'))  
           {   
            
                echo sanitize($_POST['Fname']);
                echo sanitize($_POST['Lname']);
                echo sanitize($_POST['email']);
                echo sanitize($_POST['pwd']);
                $current_data = file_get_contents('data.json');
                $arr_data = json_decode($current_data, true);  
                $arr = array('Fname' => $_POST['Fname'], "Lname" => $_POST['Lname'],'pwd'=>$_POST['pwd']);
                $arr_data[] = $arr;  
                $final_data = json_encode($arr_data);
                var_dump($arr);
                $file = fopen("../Model/AdminF.json", "w");  
                
                if(file_put_contents('../Model/AdminF.json', $final_data))  
                {  
                     $message = "File Appended Success fully";  
                }  
           }  
           else  
           {  
                $error = 'JSON File not exits';  
           }
      }

        /*if ($isValid) 
        {
            echo sanitize($_POST['Fname']);
            echo sanitize($_POST['Lname']);
            echo sanitize($_POST['email']);
            echo sanitize($_POST['pwd']);

            $arr = array('Fname' => $_POST['Fname'], "Lname" => $_POST['Lname'],'pwd'=>$_POST['pwd']);
            $array_data[] = $arr;  
            $final_data = json_encode($array_data);  

            var_dump($arr);

            $file = fopen("data.json", "w");
            fwrite($file, $final_data);
        }*/

    }

    function sanitize($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }



?>
