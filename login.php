<?php include ('assets/php_files/login.php')?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="assets/styles/style.css"/>
</head>
<body class="dm-sans">  
    <nav class="navigation">
        <img src="./assets/images/logo.svg" class="site-logo" alt="logo" width="100px" height="100px"/>
    </nav>
    <main>
        <div class="container-large">
            <div class="width-40">
        <h3 class="heading-md">Hai gia un account?</h3>
        <form class="form-card width-100" action="assets/php files/register.php">
            <div>
           
            <label for="email">Inserisci I'email</label>
            <input type="email" placeholder="name@example.com" id="email" class="input_field_custom"/>
        

        
            <label for="password">Inserisci la password</label>
            <input type="password" placeholder="Scrivila qui" id="password" class="input_field_custom"/>
            
            <div>
                <input type="button" value="ACCEDI"/>
            </div>
            <div class="text-center">
                Non hai ancora un profilo? <a href="./index.php">Registrati </a>
            </div>
           
        </div>
    </form>
    </div>
    </div>
    </main>
</body>
</html>