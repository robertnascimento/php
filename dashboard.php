<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <style>
    body{
      width: 100vw;
      height: 100vh;
      background-image: linear-gradient(
          45deg,
          rgb(4, 3, 112),
          rgb(140, 0, 255),
          rgb(79, 2, 109)
        );
      align-items: center;
      justify-content: center;
      display: flex;
      font-family: "Rethink Sans", sans-serif;
    }

    button {
        background-color: rgb(8, 253, 151);
        color: white;
        font-family: "Rethink Sans", sans-serif;
        width: 85px;
        height: 40px;
        border-radius: 12px;
        border: none;
        margin-left: 260px;
      }

      div{
        width: 400px;
        border-radius: 10px;
        justify-content: space-around;
        display: flex;
        flex-direction: column;
        align-items: center;
        height: 300px;
        background-color: white;
      }
  </style>
  <link
  rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
/>
</head>
<body>
  <div>
    <h2>Dashboard</h2>
    <p>Bem-vindo, <?php echo $_SESSION['login_user']; ?>!</p>
    <form method="post">
        <button type="submit" value="Logout">Logout</button>
    </form>
  </div>
</body>
</html>