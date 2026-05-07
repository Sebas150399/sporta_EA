<?php
include("functions.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Segoe UI', sans-serif;
    }

    body {
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      background: linear-gradient(135deg, #4facfe, #00f2fe);
    }

    .card {
      background: rgba(255, 255, 255, 0.1);
      backdrop-filter: blur(15px);
      padding: 40px 30px;
      border-radius: 15px;
      width: 320px;
      box-shadow: 0 8px 32px rgba(0,0,0,0.2);
      color: white;
      animation: fadeIn 1s ease;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .card h2 {
      text-align: center;
      margin-bottom: 25px;
    }

    .input-group {
      position: relative;
      margin-bottom: 20px;
    }

    .input-group input {
      width: 100%;
      padding: 12px 40px 12px 10px;
      border: none;
      border-radius: 8px;
      outline: none;
      background: rgba(255,255,255,0.2);
      color: white;
      font-size: 14px;
    }

    .input-group input::placeholder {
      color: #000000;
    }

    .input-group input:focus {
      background: rgba(255,255,255,0.3);
    }

    /* Botón ojo */
    .toggle-password {
      position: absolute;
      right: 10px;
      top: 50%;
      transform: translateY(-50%);
      cursor: pointer;
      font-size: 14px;
      color: #eee;
    }

    .btn {
      width: 100%;
      padding: 12px;
      border: none;
      border-radius: 8px;
      background: white;
      color: #333;
      font-weight: bold;
      cursor: pointer;
      transition: 0.3s;
    }

    .btn:hover {
      background: #ddd;
      transform: scale(1.03);
    }

    .links {
      margin-top: 20px;
      text-align: center;
    }

    .links a {
      display: block;
      margin-top: 8px;
      font-size: 13px;
      color: #eee;
      text-decoration: none;
    }

    .links a:hover {
      text-decoration: underline;
      color: white;
    }
  </style>
</head>
<body>

  <div class="card">
    <h2>Bienvenido</h2>

    <!-- FORM listo para PHP -->
    <form action="login.php" method="POST">

      <div class="input-group">
        <input type="email" name="email" placeholder="Correo electrónico" required>
      </div>

      <div class="input-group">
        <input type="password" name="password" id="password" placeholder="Contraseña" required>
        <span class="toggle-password" onclick="togglePassword()">👁️</span>
      </div>

      <button type="submit" class="btn">Iniciar sesión</button>

    </form>

    <div class="links">
      <a href="#">¿Olvidaste tu contraseña?</a>
      <a href="#">Crear cuenta</a>
    </div>
  </div>

  <script>
    function togglePassword() {
      const input = document.getElementById("password");

      if (input.type === "password") {
        input.type = "text";
      } else {
        input.type = "password";
      }
    }
  </script>

</body>
</html>
<?php
Usuarios::iniciarSesion($_POST['usuario'],$_POST['contra']);
?>