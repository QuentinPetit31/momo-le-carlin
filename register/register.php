<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pugmania - Create your account</title>
    <link rel="stylesheet" href="./register.css">
    <link rel="icon" href="../favicon.ico" type="image/x-icon">
    <?php //include './register-php.php';?>
</head>
<body>

    <div class="container">
        <div class="band">
            <h2>Create your account</h2>
        </div>
    </div>

    <form id="register" action="./register-php.php" method="post">
        <label for="username">Username (4 to 25 characters) :</label>
        <input type="text" id="username" name="pseudo_client" class="input" 
        required minlength="4" maxlength="25" placeholder="Enter your username here">

        <label for="lastname">Name :</label>
        <input type="text" id="lastname" name="prenom_client" class="input" placeholder="Enter your name here">

        <label for="firstname">First name :</label>
        <input type="text" id="firstname" name="nom_client" class="input" placeholder="Enter your firstname here">

        <label for="email">Email :</label>
        <input type="email" id="email" name="email_client" class="input" placeholder="Enter your email here">

        <label for="password_user">Password (7 characters at least) :</label>
        <input type="text" id="password_user" name="password_client" class="input" 
        placeholder="Enter your password here" required minlength="7" maxlength="100">

        <label for="confirm_password_client">Please confirm your password :</label>
        <input type="text" id="confirm_password_client" name="confirm_password_client" 
        class="input" placeholder="Confirm your password here" required minlength="7" maxlength="100">
        
        <input type="submit" class="button-submit" value="Submit" name="submit">
    </form>

<footer>
<img id="pug-langue1" img src="assets/img/pug-langue.png" alt="footer-img">
<img id="pug-langue2" src="assets/img/pug-langue-2.png" alt="footer-img">  
</footer>   
</body>
</html>
