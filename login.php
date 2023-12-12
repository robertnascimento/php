<?php
session_start();

$servername = "localhost";
$username = "robert";
$password = "Sa32r4t1@r13";
$dbname = "meusistema";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST['login'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM usuarios WHERE login='$login' AND senha='$senha'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $_SESSION['login_user'] = $login;
        header("location: dashboard.php");
    } else {
        $error = "Usuário ou senha inválidos.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <style>
      @import url("https://fonts.googleapis.com/css2?family=Rethink+Sans:wght@600&display=swap");
      body {
        width: 100vw;
        height: 100vh;
        display: flex;
        flex-direction: row;
        margin: 0;
        padding: 0;
      }

      .left {
        display: flex;
        flex-direction: column;
        justify-content: center;
        background-image: linear-gradient(
          45deg,
          rgb(4, 3, 112),
          rgb(140, 0, 255),
          rgb(79, 2, 109)
        );
        filter: grayscale(60%);
        width: 67vw;
        height: 100vh;
        padding: 0 0 0 100px;
      }

      .left .web {
        color: white;
        display: flex;
        font-size: 50px;
        font-family: "Rethink Sans", sans-serif;
        pointer-events: none;
      }

      .left h1 {
        color: white;
        font-family: "Rethink Sans", sans-serif;
        pointer-events: none;
      }
      .left div {
        margin-top: 10px;
        background-image: linear-gradient(
          to right,
          rgb(255, 0, 157),
          rgb(196, 13, 141)
        );
        width: 270px;
        height: 48px;
        border-radius: 29px;
        display: flex;
        align-items: center;
        justify-content: center;
      }
      .left div p {
        color: white;
        font-size: 30px;
        font-family: "Rethink Sans", sans-serif;
      }

      .right {
        width: 26vw;
        background-image: linear-gradient(
          -45deg,
          rgb(255, 0, 119),
          rgb(148, 3, 177),
          rgb(148, 3, 177),
          rgb(255, 2, 200)
        );
        border-left: solid 7px;
        border-left-color: rgb(8, 253, 151);
        filter: grayscale(28%);
      }

      .principal {
        display: flex;
        flex-direction: column;
        color: white;
        padding: 27px;
        z-index: 1;
        font-family: "Rethink Sans", sans-serif;
      }

      .principal button {
        background-color: rgb(8, 253, 151);
        color: white;
        font-family: "Rethink Sans", sans-serif;
        width: 85px;
        height: 40px;
        border-radius: 12px;
        border: none;
        margin-left: 170px;
        margin-top: 15px;
      }

      .principal form{
        width: 200;
        height: 300px;
        display: flex;
        flex-direction: column;
      }

      .principal form input {
        background-color: grey;
        color: white;
        border: none;
        width: 90%;
        height: 30px;
        border-radius: 20px;
        margin-top: 15px;
      }

      input::placeholder {
        color: rgb(255, 255, 255);
        padding-left: 10px;
      }

      .error{
        width: 60%;
        margin-left: 20%;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 5px;
        color:  rgb(255, 2, 200);
        background-color: rgb(8, 253, 151);
      }
    </style>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    />
  </head>
  <body>
    <div class="left">
      <h1><i class="fa-solid fa-cloud"></i> Azure</h1>
      <p class="web">
        DESENVOLVIMENTO<br />
        WEB NUVEM
      </p>
      <div>
        <p>ROBERT IVER</p>
      </div>
    </div>

    <div class="right">
      <div class="principal">
        <h2>Login</h2>
        <p>Preencha os campos abaixo com o seus dados de acesso.</p>
        <form method="post" action="">
          <input type="text" name="login" placeholder="Digite o seu login" />
          <input
            type="password"
            name="senha"
            placeholder="Digite sua senha"
            aria-placeholder="white"
          />
          <button type="submit">ENTRAR</button>
        </form>
      </div>
      <div class="error">
        <h2> <?php if(isset($error)) { echo $error; } ?></h2>
      </div>
    </div>
  </body>
</html>
