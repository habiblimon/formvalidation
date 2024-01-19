<?php 

    function clean($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }



    if(isset($_POST['sub123']) && $_SERVER['REQUEST_METHOD'] == "POST"){
        $name   = clean($_POST['name']);
        $email  = clean($_POST['email']);
        $gender  = clean($_POST['gender'] ?? null);
        $pass = clean($_POST['pass'])?? null;
        $cpass = clean($_POST['cpass'])?? null;  

        if(empty($name)){
            $errName = "Please enter your name";

        }elseif(!preg_match("/^[A-Za-z. ]*$/", $name)){
            $errName = "Please enter a valid name"; 
        }else{
            $crrName = $name;
        }


        if(empty($email)){
            $errEmail = "Please enter your email";
        }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errEmail = "Please enter a valid email";
        }else{
            $crrEmail = $email;
        }

        if(empty($gender)){
            $errGender = "Please select your gender";
        }else{
            $crrGender = $gender;
        }


        if(empty($pass)){
            $errPass = "Please enter your password";
        }elseif(!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*]).{8,}$/", $pass)){
            $errPass = "Password must be at least 8 characters";
        }else{
            $crrPass = $pass;
        }

        if(empty($cpass)){
            $errCPass = "Please confirm your password";
        }elseif($pass!= $cpass){
            $errCPass = "Passwords do not match";
        }else{
            $crrCPass = $cpass;
        }




    }



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Validation topic </title>






    
    <!-- Bosstrap 5.3.1 CSS  cdn link  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" integrity="<KEY>" crossorigin="anonymous">
   


</head>
<body>
    
    <div class="container">
        <div class="row min-vh-100 d-flex">
            <div class="col-md-6 m-auto border rounded shadow p-4">
                <form action="<?= $_SERVER['PHP_SELF'];?>" method="post">
                    <div class="mb-3 form-floating ">
                        <input type="text" placeholder="Your Name " name="name" class="form-control <?= isset($errName)? 'is-invalid':null; ?> <?= isset($crrName)? 'is-valid': null; ?>" value="<?= $name??null;   ?>">
                        <label for="">Your Name</label>
                        <div class="invalid-feedback">
                            <?= $errName ?? null; ?>
                        </div>
                        <div class="valid-feedback">
                            <?= $crrName ?? null; ?>
                        </div>
                    </div>


                    <div class="mb-3 form-floating ">
                        <input type="text" placeholder="Your Email " name="email" class="form-control <?= isset($errEmail)? 'is-invalid':null; ?> <?= isset($crrEmail)? 'is-valid': null; ?>" value="<?= $email??null;   ?>">
                        <label for="">Your Email</label>
                        <div class="invalid-feedback">
                            <?= $errEmail ?? null; ?>
                        </div>
                        <div class="valid-feedback">
                            <?= $crrEmail ?? null; ?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <!-- Gender -->
                        
                        <div for="" class="form-check form-check-inline">
                            <label for="male" class="form-check-label">Gender : </label>
                        </div>
                        <div for="" class="form-check form-check-inline">
                            <input type="radio"  value="Male" class="form-check-input" id="male" name="gender" <?= isset($gender) && $gender == "Male"? "checked":null; ?>>
                            <label for="male" class="form-check-label">Male</label>
                        </div>
                        <div for="" class="form-check form-check-inline">
                            <input type="radio"  value="Female" class="form-check-input" id="female" name="gender" <?= isset($gender) && $gender == "Female"? "checked":null; ?>>
                            <label for="female" class="form-check-label">Female</label>
                        </div>
                        <div class="form-check form-check-inline text-danger ">
                            <?= $errGender ?? null; ?>
                        </div>
                    </div>


                    <!-- Password & Re-type password validation  -->
                    <div class="mb-3 form-floating ">
                        <input type="password" placeholder="Password" name="pass" class="form-control <?= isset($errPass)? 'is-invalid':null;?> <?= isset($crrPass)? 'is-valid': null;?>" value="">
                        <label for="">Password</label>
                        <div class="invalid-feedback">
                            <?= $errPass?? null;?>
                        </div>
                        <div class="valid-feedback">
                            <?= isset($crrPass)? 'Accepted Your Strong Password':null; ?>
                        </div>
                    </div>

                    <!-- Confrim password validation  -->
                    <div class="mb-3 form-floating ">
                        <input type="password" placeholder="<PASSWORD>" name="cpass" class="form-control <?= isset($errCPass)? 'is-invalid':null;?> <?= isset($crrCPass)? 'is-valid': null;?>" value="">
                        <label for="">Confirm Password</label>
                        <div class="invalid-feedback">
                            <?= $errCPass?? null;?>
                        </div>
                        <div class="valid-feedback">
                            <?= isset($crrCPass)? 'Accepted Your Strong Password':null;?>
                        </div>
                    </div>
                   



                    <input type="submit" class="btn btn-dark btn-lg" name="sub123">
                </form>
            </div>
        </div>
    </div>






<!--Bootstrap 5.3.1 JS cdn link  -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="<KEY>" crossorigin="anonymous"></script>
</body>
</html>