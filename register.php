<?php
    
     // define variables and set to empty values
     $emailErr = $passwordErr = $cpasswordErr = $firstErr = $lastErr = "";
     $email  = $password = $cpassword = $firstname = $lastname = "";
     
     $valid = true;
     // The preg_match() function searches a string for pattern, returning true if the pattern exists, and false otherwise.
     if ($_SERVER["REQUEST_METHOD"] == "POST") {
         //Validates email
         if (empty($_POST["email"])) {
          $valid=false;
             $emailErr = "You Forgot to Enter Your Email!";
         } else {
             $email = test_input($_POST["email"]);
             // check if e-mail address syntax is valid
             if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email)) {
              $valid=false;
                 $emailErr = "You Entered An Invalid Email Format"; 
             }
         }
        

         //Validates password & confirm passwords.
         if(!empty($_POST["password"]) && ($_POST["password"] == $_POST["cpassword"])) {
            $password = test_input($_POST["password"]);
            $cpassword = test_input($_POST["cpassword"]);
            if (strlen($_POST["password"]) <= '8') {
              $valid=false;
                $passwordErr = "Your Password Must Contain At Least 8 Characters!";
            }
            elseif(!preg_match("#[0-9]+#",$password)) {
              $valid=false;
                $passwordErr = "Your Password Must Contain At Least 1 Number!";
            }
            elseif(!preg_match("#[A-Z]+#",$password)) {
              $valid=false;
                $passwordErr = "Your Password Must Contain At Least 1 Capital Letter!";
            }
            elseif(!preg_match("#[a-z]+#",$password)) {
              $valid=false;
                $passwordErr = "Your Password Must Contain At Least 1 Lowercase Letter!";
            }
        }
        elseif(!empty($_POST["password"])) {
          $valid=false;
            $cpasswordErr = "Please Check You've Entered Or Confirmed Your Password!";
        } else {
          $valid=false;
             $passwordErr = "Please enter password   ";
        }

        //Validates firstname
    if (empty($_POST["firstname"])) {
      $valid=false;
        $firstErr = "You Forgot to Enter Your First Name!";
    } else {
        $firstname = test_input($_POST["firstname"]);
        //Checks if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/",$firstname)) {
          $valid=false;
            $firstErr = "Only letters and white space allowed"; 
        }
    }
    if (empty($_POST["lastname"])) {
      $valid=false;
        $lastErr = "You Forgot to Enter Your Last Name!";
    } else {
        $lastname = test_input($_POST["lastname"]);
        //Checks if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/",$lastname)) {
          $valid=false;
            $lastErr = "Only letters and white space allowed"; 
        }
    }
    if($valid){
      header('location:Processor.php');
      exit();
  }
   
   
}
/*Each $_POST variable with be checked by the function*/
function test_input($data) {
     $data = trim($data);
     $data = stripslashes($data);
     $data = htmlspecialchars($data);
     return $data;
}


?>

<!--
  <?php  
    if(isset($_POST['submit'])) {  
    if($firstErr == "" && $lastErr == "" &&  $emailErr == "" && $passwordErr == "" && $cpasswordErr == "") {  
        echo "<h3 color = #FFFFFF> <b>You have sucessfully registered.</b> </h3>";  
        echo "<h2>Your Input:</h2>";  
        echo " first Name: " .$firstname;  
        echo "<br>"; 
        echo " last Name: " .$lastname;  
        echo "<br>";  
        echo "Email: " .$email;  
        echo "<br>";  
        echo "password: " .$password;  
        echo "<br>";  
        
    } else {  
        echo "<h3> <b>You didn't filled up the form correctly.</b> </h3>";  
    }  
    }  
?>  
-->

<!DOCTYPE html>

<html>

    <head>
        <title>Register</title>
    </head>
    
  <style>
    
    @import url(https://fonts.googleapis.com/css?family=Roboto:400,300,600,400italic);
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  -webkit-font-smoothing: antialiased;
  -moz-font-smoothing: antialiased;
  -o-font-smoothing: antialiased;
  
   text-rendering: optimizeLegibility;
}

body {
  font-family: "Roboto", Helvetica, Arial, sans-serif;
  font-weight: 100;
  font-size: 12px;
  line-height: 30px;
  color:green;
  background: #e8e0e8;
}

.container {
  max-width: 400px;
  width: 100%;
  margin: 0 auto;
  position: relative;
}

#contact input[type="text"],
#contact input[type="email"],
#contact input[type="tel"],
#contact input[type="password"],
#contact input[type="password"],

#contact button[type="submit"] {
  font: 400 12px/16px "Roboto", Helvetica, Arial, sans-serif;
}

#contact {
  background: #F9F9F9;
  padding: 25px;
  margin: 150px 0;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}

#contact h3 {
  display: block;
  font-size: 30px;
  font-weight: 300;
  margin-bottom: 10px;
}

#contact h4 {
  margin: 5px 0 15px;
  display: block;
  font-size: 13px;
  font-weight: 400;
}

fieldset {
  border: medium none !important;
  margin: 0 0 10px;
  min-width: 100%;
  padding: 0;
  width: 100%;
}

#contact input[type="text"],
#contact input[type="email"],
#contact input[type="tel"],
#contact input[type="password"],
#contact input[type="password"],
#contact textarea {
  width: 100%;
  border: 1px solid #ccc;
  background: #FFF;
  margin: 0 0 5px;
  padding: 10px;
}


#contact input[type="text"]:hover,
#contact input[type="email"]:hover,
#contact input[type="tel"]:hover,
#contact input[type="password"]:hover,
#contact input[type="password"]:hover
 {
  cursor: pointer;
  width: 100%;
  border: none;
  background: #ffffff;
  color: #1b1c1a;
  margin: 0 0 5px;
  padding: 10px;
  font-size: 15px;
}
#contact button[type="submit"] {
  cursor: pointer;
  width: 100%;
  border: none;
  background: #4f11f7;
  color: #1b1c1a;
  margin: 0 0 5px;
  padding: 10px;
  font-size: 15px;
}



#contact button[type="submit"]:hover {
  background: #ed0955;
  -webkit-transition: background 0.3s ease-in-out;
  -moz-transition: background 0.3s ease-in-out;
  transition: background-color 0.3s ease-in-out;
}

#contact button[type="submit"]:active {
  box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.5);
}

#contact input:focus,
#contact textarea:focus {
  outline: 0;
  border: 1px solid #aaa;
}

::-webkit-input-placeholder {
  color: #888;
}

:-moz-placeholder {
  color: #888;
}

::-moz-placeholder {
  color: #888;
}

:-ms-input-placeholder {
  color: #888;
}

     .error {
       font-size: 14px;
       color: red;
       position: relative;
       top: 3px;

     }
    </style>
    


    <body>
    
        
     

            <div class="container">  
  <form id="contact" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <h3 style="text-align: center;">Register</h3>
  
    
    <label for="firstname"></label>
                <input type="text" placeholder="firstname" name="firstname" >
                <div class="error"> <?php echo $firstErr; ?></div>

  
     
    <label for="lastname"></label>
                <input type="text" placeholder="lastname" name="lastname" >
                <div class="error"> <?php echo $lastErr; ?></div>
  
    

     
    <label for="email"></label>
                <input type="text" placeholder="email" name="email" required>
                <div class="error"> <?php echo  $emailErr; ?></div>
   
    

      <input placeholder="Your Phone Number" type="tel" tabindex="3" required>
    

    <label for="password"></label>
                <input type="password" placeholder="password" name="password" required>
                <div class="error"> <?php echo $passwordErr; ?></div>

    
  
    <label for="cpassword"></label>
                <input type="password" placeholder="confirm password" name="cpassword" required>
                <div class="error"> <?php echo $cpasswordErr; ?></div>
     
 
    
    
      <button name="submit" type="submit" id="submit"  >Submit</button>
  

  </form>
</div>

        
    
    </body>


</html>