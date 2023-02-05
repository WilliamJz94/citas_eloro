<?php
  require '../assets/db/config.php';

  
  if (isset($_POST['nombrep'])) {
    $dnipa = $_POST['dnipa'];
    $nombrep = $_POST['nombrep'];
    $apellidop = $_POST['apellidop'];
    $tele = $_POST['tele'];
    $sexo = $_POST['sexo'];
    $email = $_POST['email'];
    $ciudad = $_POST['ciudad'];
    $direccion = $_POST['direccion'];
    $nacimiento = $_POST['nacimiento'];
    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];
    $cargo = $_POST['cargo'];
  
    $query = $connect->query("select * from customers where nombrep='$nombrep'");
  
  
  
    if ($data == false) {
      $errMsg = "Usuario $usuario no encontrado.";
    } else {
  
      if ($clave == $data['clave']) {
  
        $_SESSION['id'] = $data['id'];

        $_SESSION['nombre'] = $data['nombre'];
        $_SESSION['dnipa'] = $data['dnipa'];
        $_SESSION['usuario'] = $data['usuario'];
        $_SESSION['email'] = $data['email'];
        $_SESSION['clave'] = $data['clave'];
        $_SESSION['cargo'] = $data['cargo'];
        $_SESSION['tele'] = $data['tele'];
  
  
        if ($_SESSION['cargo'] == 1) {
          header('Location: admin/pages-admin.php');
        } else if ($_SESSION['cargo'] == 2) {
          header('Location: user-patients/patiens-mostrar.php');
        }
  
  
        exit;
      } else
        $errMsg = 'Contraseña incorrecta.';
    }
  
    if ($query->num_rows > 0) {
  
  ?>
      <span>Username already exist.</span>
    <?php
    } elseif (!preg_match("/^[a-zA-Z0-9_]*$/", $usuario)) {
    ?>
      <span style="font-size:11px;">Invalid username. Space & Special Characters not allowed.</span>
    <?php
    } elseif (!preg_match("/^[a-zA-Z0-9_]*$/", $clave)) {
    ?>
      <span style="font-size:11px;">Invalid password. Space & Special Characters not allowed.</span>
    <?php
    } else {
      $clave = md5($clave);
      $connect->query("insert into customers (dnipa,nombrep,apellidop,tele, sexo,email,ciudad,direccion,nacimiento,usuario, clave, cargo) values ('$dnipa','$nombrep','$apellidop','$tele','$sexo','$email','$ciudad','$direccion','$nacimiento','$usuario','$clave','$cargo')");
  
      if ($query != null) {
        print "<script>alert(\"Registro exitoso. Proceda a logearse\");window.location='./user-patients/patiens-mostrar.php';</script>";
      }
    ?>
      <span>Sign up Successful.</span>
  <?php
    }
  }



















?>
<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="../assets/css/tailwind.output.css" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="../assets/js/init-alpine.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="flex items-center min-h-screen p-6 bg-primary-50 dark:bg-gray-900">
        <div class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800">
            <div class="flex flex-col overflow-y-auto md:flex-row">
                <div class="h-32 md:h-auto md:w-1/2">
                    <img aria-hidden="true" class="object-cover w-30 h-40 p-5 dark:hidden" src="../assets/img/register1.jpg"
                        alt="Office" />

                </div>
                <div class="flex items-center justify-center p-8 sm:p-12 md:w-1/2">
                    <div class="w-full">
                        <form class="container" autocomplete="off" method="post" role="form">
                            <h1 class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200">
                                REGISTRO EN LINEA
                            </h1>
                            <?php
    if(isset($errMsg)){
    echo '<div style="color:#FF0000;text-align:center;font-size:20px;">'.$errMsg.'</div>';  
         }
?>

                            <label class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Cédula</span>
                                <input
                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                    placeholder="Digita tu Cédula" name="dnipa" maxlength="10"
                                    value="<?php if(isset($_POST['dnipa'])) echo $_POST['dnipa'] ?>"
                                    autocomplete="off" />
                            </label>

                            <label class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Nombre</span>
                                <input
                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                    placeholder="Digita tu Nombre" name="nombrep"
                                    value="<?php if(isset($_POST['nombrep'])) echo $_POST['nombrep'] ?>"
                                    autocomplete="off" />
                            </label>
                            <label class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Apellido</span>
                                <input
                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                    placeholder="Digita tu Apellido" name="apellidop"
                                    value="<?php if(isset($_POST['apellidop'])) echo $_POST['apellidop'] ?>"
                                    autocomplete="off" />
                            </label>
                           
                            <label class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Telèfono</span>
                                <input
                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                    placeholder="Digita tu telèfono" name="tele" maxlength="10"
                                    value="<?php if(isset($_POST['tele'])) echo $_POST['tele'] ?>"
                                    autocomplete="off" />
                            </label>
                            <label class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Gènero</span>
                                <input
                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                    placeholder="Digita tu gènero" name="sexo"
                                    value="<?php if(isset($_POST['sexo'])) echo $_POST['sexo'] ?>" autocomplete="off" />
                            </label>
                            <label class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Email</span>
                                <input
                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                    placeholder="Digita tu Correo" name="email"
                                    value="<?php if(isset($_POST['email'])) echo $_POST['email'] ?>"
                                    autocomplete="off" />
                            </label>
                            <label class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Ciudad</span>
                                <input
                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                    placeholder="Digita tu ciudad" name="ciudad"
                                    value="<?php if(isset($_POST['ciudad'])) echo $_POST['ciudad'] ?>"
                                    autocomplete="off" />
                            </label>
                            <label class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Direcciòn</span>
                                <input
                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                    placeholder="Digita tu direcciòn" name="direccion"
                                    value="<?php if(isset($_POST['direccion'])) echo $_POST['direccion'] ?>"
                                    autocomplete="off" />
                            </label>

                            <label class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Fecha de Nacimiento</span>
                                <input
                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                    placeholder="Digita tu fecha de nacimiento" name="nacimiento" type="date"
                                    value="<?php if(isset($_POST['nacimiento'])) echo $_POST['nacimiento'] ?>"
                                    autocomplete="off" />
                            </label>

                            <label class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Usuario</span>
                                <input
                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                    placeholder="Digita tu Usuario" name="usuario"
                                    value="<?php if(isset($_POST['usuario'])) echo $_POST['usuario'] ?>"
                                    autocomplete="off" />
                            </label>

                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Contraseña</span>
                                <input
                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                    placeholder="Digita tu contraseña" type="password" required="true" name="clave"
                                    value="<?php if(isset($_POST['clave'])) echo MD5($_POST['clave']) ?>" />
                            </label>

                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">
                                    Rol
                                </span>
                                <select name="cargo"
                                    class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                                    <option>Seleccione un rol</option>
                                    
                                    <option value="2">Paciente</option>
                                </select>
                            </label>


                            <hr class="my-8" />
                            <button
                                class="flex items-center justify-center btn btn-success w-full px-4 py-2 text-sm font-medium leading-5 text-white text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray"
                                name='registro' type="submit">Registrate</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>