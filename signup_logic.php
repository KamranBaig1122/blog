<?php
require 'config/database.php';

echo 'hello';

if(isset($_POST['submit'])){
    $firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $username = filter_var($_POST['username'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $createpass = filter_var($_POST['createpass'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $confrmpass = filter_var($_POST['confrmpass'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $avatar =  $_FILES['avatar'];
    // echo $firstname, $lastname, $username, $email, $createpass, $confrmpass;

    if(!$firstname){
        $_SESSION['signup'] = "Please enter your First Name";
    }else if(!$lastname){
        $_SESSION['signup'] = "Please enter your Last Name";
    }else if(!$username){
        $_SESSION['signup'] = "Please enter your Username";
    }else if(!$email){
        $_SESSION['signup'] = "Please enter your a valid email";
    }else if(strlen($createpass)<8 || strlen($confrmpass)<8){
        $_SESSION['signup'] = "Password Should greater than 8 chracters";
    }else if(!$avatar['name']){
        $_SESSION['signup'] = "Please add avatar";
    }else{
        if($createpass !== $confrmpass){
            $_SESSION['signup'] = "Password do not match";
        }else{
            $hashed_password = password_hash($createpass, PASSWORD_DEFAULT);
            // echo $createpass . '<br/>';
            // echo $hashed_password;

            //user already exist or not 
            $user_check_query = "SELECT * from users WHERE username='$username' OR email='$email'";
            $user_check_result = mysqli_query($connection, $user_check_query);

            if(mysqli_num_rows($user_check_result)>0){
                $_SESSION['signup'] = "Username or Email Already Exist";
            }else{
                //avatar working
                $time = time();
                $avatar_name = $time . $avatar['name'];
                $avatar_tmp_name = $avatar['tmp_name'];
                $avatar_destination_path = 'images/' . $avatar_name;

                $allowed_files = ['png','jpg','jpeg'];
                $extention = explode('.', $avatar_name);
                $extention = end($extention);

                if(in_array($extention, $allowed_files)){
                    if($avatar['size']<1000000){
                        move_uploaded_file($avatar_tmp_name, $avatar_destination_path);
                    }else{
                        $_SESSION['signup'] = 'File size too big. Should be less than 1mb';
                    }
                }else{
                    $_SESSION['signup'] = "File should be png, jpg, jpeg";
                }
            }

        }
    }

    if(isset($_SESSION['signup'])){
        $_SESSION['signup-data'] = $_POST;
        header('location: ' . ROOT_URL . 'signUp.php');
        die();
    }else{
        $insert_user_query = "INSERT INTO users 
        SET firstname='$firstname', lastname='$lastname', username='$username', email='$email', password='$hashed_password', avatar='$avatar_name', is_admin=0";        
        $insert_user_result = mysqli_query($connection, $insert_user_query);

        if(!mysqli_errno($connection)){
            $_SESSION['signup-success'] = "Registration successful. Please log in";
            header('location: ' . ROOT_URL . 'signin.php');
            die();
        }
    }

// var_dump($avatar);

}else{
    header('location: ' . ROOT_URL . 'signUp.php');
}

// echo 'hello';