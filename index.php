<?php
session_start();
if(isset($_POST['login'])){
  $email=$_POST['email'];
  $pass=$_POST['password'];
  include('data/db.php');
  $query=$conn->prepare("SELECT * FROM `employer` WHERE email='$email';");
  $query->execute();
  $results=$query->fetchAll();
  if(sizeof($results)!=0){
    $password=$results[0]['password'];
    if($password==$pass){
        header('location:adminUserface.php');
    }
    else{
        $message="Password incorrect!";
    }
}else{
    $message="Email didn't exist !!!!";
}
}
else{
    $message=".Shop-Now";

}


?>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./styles/login.css" />
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
      integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/"
      crossorigin="anonymous"
    />
    <title>Login to your Account</title>
  </head>
  <body data-new-gr-c-s-check-loaded="14.1045.0" data-gr-ext-installed="">
    <main>
      <div class="lf-section-display center-lz">
        <div class="container-sel center">
          <img src="./images/logo-white.svg" alt="" />
          <div class="con-sml stre uni">
            <h2>
              Every project starts with a story. <br />
              Let us hear yours!
            </h2>
          </div>
        </div>
      </div>
      <div class="rh-section-display center-ls">
        <div class="line"></div>
        <form action="" method="post">
            <img src="./images/logo-white.svg" alt="" />
            <h2><b><?php echo $message?> </b> Admin platform</h2>
          <br>
          <input type="email" name="email" placeholder="Email or client ID." />
          <input name="password" type="password" placeholder="Your password" />
          <button type="submit" name="login" class="btlz-zcs">Login now</button>
        </form>
      </div>
    </main>
  </body>
</html>
