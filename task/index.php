<!doctype html>
<html lang="en">
  <head>
    <title>Register</title>
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
        <b style="font-size: large;">Email Verification</b>
        </div>
        <div class="card-body">
            <div class="card-title  p-2 rounded">
            
            </div>
            <div class="card-text w-50 mx-auto">
            <form action="mail.php" method="POST" class="form-group" >
            <input type="email" class="w-100 mt-4 form-control" placeholder="Enter Your Email" name="email"autocomplete="off">
            <small class="form-text text-muted">We'll never share your email with anyone else.</small><br>
            <input type="password" class="w-100 form-control" placeholder="New Password" name="pass"><br>
            <input type="password" class="w-100 form-control" placeholder="Confirm Password" name="cpass"><br>
            <input type="submit" class="btn btn-primary w-100" value="Register" name="submit">
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