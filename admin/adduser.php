<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>add user form</title>
      
      <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <style type="text/css">
      	
      	@import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
*{
  margin: 0;
  padding: 0;
  outline: none;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}
body{
  display: flex;
  align-items: center;
  justify-content: center;
  min-height: 100vh;
  padding: 40px;
  background: linear-gradient(115deg, #56d8e4 10%, #9f01ea 90%);
}
.container{
  max-width: 800px;
  background: #fff;
  width: 800px;
  padding: 25px 40px 10px 40px;
  box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
}
.container .text{
  text-align: center;
  font-size: 35px;
  font-weight: 600;
  background: -webkit-linear-gradient(right, #56d8e4, #9f01ea, #56d8e4, #9f01ea);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
}
.container form{
  padding: 30px 0 0 0;
}
.container form .form-row{
  display: flex;
  margin: 32px 0;
}
form .form-row .input-data{
  width: 100%;
  height: 40px;
  margin: 0 20px;
  position: relative;
}
form .form-row .textarea{
  height: 70px;
}
.input-data input,
.textarea textarea{
  display: block;
  width: 100%;
  height: 100%;
  border: none;
  font-size: 17px;
  border-bottom: 2px solid rgba(0,0,0, 0.12);
}
.input-data input:focus ~ label, .textarea textarea:focus ~ label,
.input-data input:valid ~ label, .textarea textarea:valid ~ label{
  transform: translateY(-20px);
  font-size: 14px;
  color: #3498db;
}
.textarea textarea{
  resize: none;
  padding-top: 10px;
}
.input-data label{
  position: absolute;
  pointer-events: none;
  bottom: 10px;
  font-size: 16px;
  transition: all 0.3s ease;
}
.textarea label{
  width: 100%;
  bottom: 40px;
  background: #fff;
}
.input-data .underline{
  position: absolute;
  bottom: 0;
  height: 2px;
  width: 100%;
}
.input-data .underline:before{
  position: absolute;
  content: "";
  height: 2px;
  width: 100%;
  background: #3498db;
  transform: scaleX(0);
  transform-origin: center;
  transition: transform 0.3s ease;
}
.input-data input:focus ~ .underline:before,
.input-data input:valid ~ .underline:before,
.textarea textarea:focus ~ .underline:before,
.textarea textarea:valid ~ .underline:before{
  transform: scale(1);
}
.submit-btn .input-data{
  overflow: hidden;
  height: 45px!important;
  width: 25%!important;
}
.submit-btn .input-data .inner{
  height: 100%;
  width: 300%;
  position: absolute;
  left: -100%;
  background: -webkit-linear-gradient(right, #56d8e4, #9f01ea, #56d8e4, #9f01ea);
  transition: all 0.4s;
}
.submit-btn .input-data:hover .inner{
  left: 0;
}
.submit-btn .input-data input{
  background: none;
  border: none;
  color: #fff;
  font-size: 17px;
  font-weight: 500;
  text-transform: uppercase;
  letter-spacing: 1px;
  cursor: pointer;
  position: relative;
  z-index: 2;
}
@media (max-width: 700px) {
  .container .text{
    font-size: 30px;
  }
  .container form{
    padding: 10px 0 0 0;
  }
  .container form .form-row{
    display: block;
  }
  form .form-row .input-data{
    margin: 35px 0!important;
  }
  .submit-btn .input-data{
    width: 40%!important;
  }
}
      </style>
   </head>
   <body>
    <div class="container">
        <div class="text">add user form here</div>
        <form action="#" method="post">
           <div class="form-row">
              <div class="input-data">
                 <input type="text" required name="fname">
                 <div class="underline"></div>
                 <label for="">First Name</label>
              </div>
              <div class="input-data">
                 <input type="text" required name="lname">
                 <div class="underline"></div>
                 <label for="">Last Name</label>
              </div>
           </div>


           <div class="form-row">


              <div class="input-data">
                 <input type="text" required name="email">
                 <div class="underline"></div>
                 <label for="">Email Address</label>
              </div>
              <div class="input-data">
                 <input type="text" required name="password">
                 <div class="underline"></div>
                 <label for="">password</label>
              </div>
           </div>


  <div class="form-row">

           	
              <div class="input-data">
                 <input type="text" required name="cpassword">
                 <div class="underline"></div>
                 <label for="">confirm password</label>
              </div>
             
           </div>


           <div class="form-row">
              <div class="input-data textarea">
              
              
<p id="output">email alreayd exists</p>
              
                 <div class="form-row submit-btn">
                    <div class="input-data">
                       <div class="inner"></div>
                       <input type="submit" value="submit" name="submit">
                    </div>
                 </div>
              </div>
           </div>
        </form>
     </div>
   </body>
</html>


<?php 	

include 'connection.php';
if(isset($_POST['submit']))
{


$fname = $_POST['fname'];
$lname= $_POST['lname'];
$email = $_POST['email'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];

$select = "SELECT * FROM user WHERE email = '$email'";
$query = mysqli_query($conn,$select);
$rows = mysqli_num_rows($query);
if($rows > 0 )
{
	?>
<script type="text/javascript">
var x = document.getElementById("output").innerHTML="Email is already exists please enter anoter email";
</script>
	<?php

}else
{
if($password===$cpassword)
{

$insert  = "INSERT INTO user (fname,lname,email,password,cpassword) VALUES('$fname','$lname','$email','$password','$cpassword')";
$insertQuery = mysqli_query($conn,$insert);
if($insertQuery)
{
	header("location:userShow.php");
}



}else
{
	
	?>
<script type="text/javascript">
var x = document.getElementById("output").innerHTML="both of your password are not match please re-enter password";
</script>
	<?php


}





}




}




 ?>