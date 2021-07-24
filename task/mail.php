
<?php
include 'db.php';
if(isset($_POST["submit"])){
$email=$_POST["email"];
$pass=$_POST["pass"];

$receiver = $_POST["email"];
$subject = "OTP Verification";
$otp = mt_rand(000000,999999);
$body = "Is OTP to login fb messanger OTP-$otp ";
$sender = "From:sakthisaravanan1410@gmail.com";
$query = "INSERT INTO login (email,password,otp,verification_status) VALUES('$email','$pass','$otp','Not-Verified')";
$result=mysqli_query($con,$query);
if($result){
if(mail($receiver, $subject, $body, $sender)){
    $msg="Email sent successfully to $receiver";
    

    }else{
    $error="Sorry, <b>failed</b> while sending mail!";
    }
}
else{
    $error="Sorry, <b>failed</b> while Updating Data Please Try again!";
}}
?>
<?php 
ob_start();
    include 'db.php';
    if(isset($_POST["verify"])){
        $otp=$_POST["otp"];
        $email= $_GET["email"];
        $fetch_query="SELECT * FROM login WHERE email='$email'";
        $result=mysqli_query($con,$fetch_query);
        $res=mysqli_fetch_assoc($result);
        
        $totp=$res["otp"];
        if($otp==$totp){
            $verify_query="UPDATE login SET verification_status='Verified',otp=null WHERE email = '$email'";
            mysqli_query($con,$verify_query);
            header('Location:main.php');
           
        }
        else{
            $warning= "Incorrect OTP Check your Mail or click Resend OTP";
            
        }
    }

?>
<!doctype html>
<html lang="en">
  <head>
    <title>Email Verify</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
  <div class="container mt-5">
        <div class="card">
        <div class="card-header bg-primary text-center text-white ">
        <b style="font-size: large;">OTP Confirmation</b>
        </div>
        <div class="card-body">
        <div class="alert <?php if(isset($msg)){echo "alert-success";} else{echo "alert-danger";}?>" role="alert">
  <?php if(isset($error)){echo $error; echo "  <a href='index.php'>Click Here</a>";} else if(isset($msg)){echo $msg;}  else if(isset($warning)){echo $warning;}?>
  
</div>
            <div class="card-text w-50 mx-auto">
            <form action="mail.php?email=<?php echo $email?>" method="POST" class="form-group" >
            <div class="input-group mt-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" >OTP</span>
                </div>
                <input type="password" class="form-control" placeholder="Enter OTP Send on Email" name="otp">
            </div>
            <input type="submit" class="btn btn-primary w-100 mt-4" value="Submit" name="verify">
            </form>
            </div>
        </div>
        </div>
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
