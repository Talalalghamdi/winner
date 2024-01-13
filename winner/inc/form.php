<?php
$firstName = '';
$lastName = '';
$email = '';

$errors = [
'firstNameError' => '',
'lastNameError' => '',
'emailError' => '',
];

if(isset($_POST['submit'])){
    $firstName =  mysqli_real_escape_string($conn,$_POST['firstName']);
    $lastName = mysqli_real_escape_string($conn,$_POST['lastName']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);

    if(empty($firstName)){
        $errors['firstNameError'] ='يرجى ادخال الاسم الأول';
    }

    if(empty($lastName)){
        $errors['lastNameError'] ='يرجى ادخال الاسم الأخير';
    }

    if(empty($email)){
        $errors['emailError'] ='يرجى ادخال البريد الالكتروني';
    }elseif(! filter_var($email,FILTER_VALIDATE_EMAIL)){
        $errors['emailError'] ='يرجى ادخال بريد الكتروني صحيح';
    }

    if(! array_filter($errors)){
      $sql ="INSERT INTO `users`(`firstName`, `lastName`, `email`) VALUES ('$firstName','$lastName','$email')";
    
      if(mysqli_query($conn,$sql)){
         header('location: '. $_SERVER['PHP_SELF']);
      }
      else{
        echo 'Error: ' . mysqli_error($conn);
      }
        
    }
}








?>