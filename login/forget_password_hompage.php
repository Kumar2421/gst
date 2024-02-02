<?php
 session_start();
 include_once('db.php');
// $errors = array();
if(!isset($_SESSION["email"])){
    header("Location: index.php");
    exit();
}?>
<?php
$errors = array(); // Initialize the $errors array
$email = ""; // Initialize $email variable (or set it to the appropriate value) 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style1.css">
</head>
<body>
<form action="password_request.php" method="POST" autocomplete="" onsubmit="return showAlert()">
   <h2 class="text-center">Forgot Password</h2>
   <p class="text-center">Enter your email address</p>

   <!-- Additional fields for name and department -->
   <div class="form-group">
      <input class="form-control" type="text" name="name" placeholder="Your Name" required>
   </div>
   <!-- Existing email field -->
   <div class="form-group">
      <input class="form-control" type="email" name="email" placeholder="Enter email address" required value="<?php echo $email ?>">
   </div>

   <div class="form-group">
      <input class="form-control button" type="submit">
   </div>
</form>


<script>
   function validateForm() {
      // Validate email format
      var email = document.getElementById('email').value;
      var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      
      if (!emailRegex.test(email)) {
         alert("Invalid email format");
         return false; // Prevent form submission
      }

     

      alert("Your form has been submitted! Please wait for confirmation.");
      return true; // Allow form submission
   }
</script>


</body>
</html>
