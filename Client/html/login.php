<?php
    session_unset();
    // session_destroy();

    $params = session_get_cookie_params();
    setcookie('PHPSESSID', '', time() - 86400, $params['path'], $params['domain']);

    session_start();
    require_once '../relation/database.php';
    // header('Location: index.php');
    // exit;

    @include('partials/header.php');
    @include('partials/menu.php');

    $isRegisterRequest = ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['_method'] ?? '') === 'register');
    $isLoginRequest = ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['_method'] ?? '') === 'login');

    if ($isLoginRequest) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){ 

                $email= $_POST['email'] ?? '';
                $password= $_POST['password'] ?? '';
            
                // SELECT user from database
                $sql = 'SELECT * FROM client WHERE email = :email';
            
                // Prepare the SELECT statement
                $stmt = $pdo->prepare($sql);
            
                // Params for prepared statement
                $params = ['email' => $email];
            
                // Execute the statement
                $stmt->execute($params);
            
                // Fetch the post from the database
                $user = $stmt->fetch(PDO::FETCH_ASSOC);
            
                if(!$user){
                  header('Location: login.php');
                  exit;
                }
                    
                //verify password
                if(password_verify($password,$user['password'])){
                    //set session
                    $_SESSION['user']=[
                        'id' => $user['id'],
                        'prenom' => $user['prenom'],
                    ];
                    $_SESSION['loggedIn']=true;
                    header('Location: ../index.php');
                    exit;
                     
                }
            }
        }

    if ($isRegisterRequest) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){

            $nom= $_POST['nom'] ?? '';
            $prenom= $_POST['prenom'] ?? '';
            $email= $_POST['email'] ?? '';
            $password= $_POST['password'] ?? '';
            // $password_confirmation=$_POST['password_confirmation'] ?? '';

            //validate fields

            echo $nom;
            echo $prenom;
            echo $email;

            //save new user
            // INSERT statement with placeholders for title and body
            $sql = 'INSERT INTO client (nom, prenom, email, password) VALUES (:nom, :prenom, :email, :password)';

            // Prepare the statement
            $stmt = $pdo->prepare($sql);

            // Params for prepared statement
            $params = [
                'nom' => $nom,
                'prenom' => $prenom,
                'email' => $email,
                'password' => password_hash($password, PASSWORD_DEFAULT)
            ];

            // Execute the statement
            $stmt->execute($params);

            header('Location: login.php');
            exit;

        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CKEI - Login</title>
    <link rel="stylesheet" href="../css/login.css" >
    <!-- <link rel="website icon" type="png" href="../image/beautiful-mountain-road-landscape.jpg"> -->
    <script src="../js/login.js"></script>
</head>
<body>
    <div class="container">
        <!-- <div class="xx">
            
        </div> -->
        <div class="loginContainer">
            <div class="joinOptions">
                <div onclick=registerHandler() class="option" id="register">
                    <p>Register</p>
                </div>
                <div onclick=loginHandler() class="option activeLogin" id="login">
                    <p>Login</p>
                </div>
            </div>
            <div class="loginCont">
            <form method="POST" action="login.php">
                <div class="inputContainer">
                    <div class="emailPasswordInput">
                        <img src="../image/envelope.png" >
                        <input placeholder="Email ID" type="email" name="email" required>
                    </div>
                </div>
                <div class="inputContainer">
                    <div class="emailPasswordInput">
                        <img src="../image/eye-crossed.png" >
                        <input placeholder="Password" type="password" name="password" required>
                    </div>
                </div>
                <div class="info">
                    <div class="checkbox">
                        <input type="checkbox" >
                        <p>Remember me</p>
                    </div>
                    <div class="forgotPassword">
                        <a href="../html/FPEmail.php">Forgot Password?</a>
                    </div>
                </div>
                <div class="buttonContainer">
                    <div class="button">
                        <input type="hidden" name="_method" value="login">
                        <!-- <a href="../index.php">Login</a> -->
                        <button type="submit" style="border: 0px white;background-color: white;cursor: pointer;">Login</button>
                    </div>
                </div>
                <!-- <div class="register">
                    <p>Don't have an account? </p>
                    <a href="#Register">Register</a>
                </div> -->
                </form>
            </div>
            <div class="registerCont">
                <form method="POST" action="login.php">
                <div class="userName">
                    <div class="firstNameInput">
                        <label class="inputValue" for="firstName" >First name</label>
                        <input class="nameInput" type="text" placeholder="First name" name="prenom" required/>
                    </div>
                    <div class="lastNameInput">
                        <label class="inputValue" for="lastName">Last name</label>
                        <input class="nameInput" type="text" placeholder="Last name" name="nom" required/>
                    </div>
                </div>
                <div class="inputContainerRegister">
                    <label class="inputValue" for="email">E-mail</label>
                    <input class="inputType" type="email" placeholder="Email" name="email" required/>
                </div>
                <div class="inputContainerRegister">
                    <label class="inputValue" for="password">password</label>
                    <input class="inputType" type="password" placeholder="Password" name="password" required/>
                </div>
                <!-- <div class="inputContainer">
                    <label class="inputValue" for="confPassword">password</label>
                    <input type="inputType" placeholder="confirmation password" />
                </div> -->
                <div class="btnRegisterContainer">
                    <div class="btnRegister">
                        <!-- <a href="#">Register</a> -->
                        <input type="hidden" name="_method" value="register">
                        <button type="submit" style="border: 0px white;background-color: white;cursor: pointer;">Register</button>
                    </div>
                </div>
                
                </form>
            </div>
        </div>
    </div>
</body>
</html>