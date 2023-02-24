<?php
require '../assets/db/config.php';

if (isset($_POST['login'])) {
    $errMsg = '';

    // Get data from FORM
    $usuario = $_POST['usuario'];

    $clave = MD5($_POST['clave']);

    if ($usuario == '') {
        $errMsg = 'Digite su usuario';
    }
    if ($clave == '') {
        $errMsg = 'Digite su contraseña';
    }

    if ($errMsg == '') {
        try {
            $stmt = $connect->prepare(
                'SELECT id, nombre, usuario, email,clave, cargo FROM usuarios WHERE usuario = :usuario UNION SELECT codpaci, nombrep, usuario, email, clave,cargo FROM customers  WHERE usuario = :usuario'
            );

            $stmt->execute([
                ':usuario' => $usuario,
            ]);
            $data = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($data == false) {
                $errMsg = "Usuario $usuario no encontrado.";
            } else {
                if ($clave == $data['clave']) {
                    $_SESSION['id'] = $data['id'];
                    $_SESSION['nombre'] = $data['nombre'];
                    $_SESSION['usuario'] = $data['usuario'];
                    $_SESSION['email'] = $data['email'];
                    $_SESSION['clave'] = $data['clave'];
                    $_SESSION['cargo'] = $data['cargo'];

                    if ($_SESSION['cargo'] == 1) {
                        header('Location: admin/pages-admin.php');
                    } elseif ($_SESSION['cargo'] == 2) {
                        header('Location: user-patients/patiens-mostrar.php');
                    }else if($_SESSION['cargo'] == 3){
                        header('Location: user-patients/medicos-mostrar.php');
                      }




                    exit();
                } else {
                    $errMsg = 'Contraseña incorrecta.';
                }
            }
        } catch (PDOException $e) {
            $errMsg = $e->getMessage();
        }
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

    <!---->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>


</head>

<body>

<nav class="navbar navbar-light navbar-dark bg-primary">
        <div class="container-fluid">
            <a href="../inicio.php" class="navbar-brand">Inicio</a>
            <form class="d-flex">

                <a href="../vista/page-registro.php" class="btn btn-success" type="submit">Registrate en linea</a>
            </form>
        </div>
    </nav>

 


    <div class="flex items-center min-h-screen p-6 bg-gray-50 dark:bg-gray-900">


        <div class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800">
            <div class="flex flex-col overflow-y-auto md:flex-row">
                <div class="h-32 md:h-auto md:w-1/2">
                    <img aria-hidden="true" class="object-cover w-full h-full dark:hidden" src="../assets/img/login.jpg"
                        alt="Office" />

                </div>
                <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
                    <div class="w-full">
                        <form class="container" autocomplete="off" method="post" role="form">
                            <h1 class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200">
                                LOGIN
                            </h1>
                            <?php if (isset($errMsg)) {
                                echo '<div style="color:#FF0000;text-align:center;font-size:20px;">' .
                                    $errMsg .
                                    '</div>';
                            } ?>
                            <label class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Usuario</span>
                                <input
                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                    placeholder="Digita tu Usuario" name="usuario" required
                                    value="<?php if (isset($_POST['usuario'])) {
                                        echo $_POST['usuario'];
                                    } ?>"
                                    autocomplete="off" />
                            </label>
                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Contraseña</span>
                                <input
                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                    placeholder="Digita tu contraseña" type="password" required="true" name="clave"
                                    value="<?php if (isset($_POST['clave'])) {
                                        echo MD5($_POST['clave']);
                                    } ?>" />
                            </label>
                            <hr class="my-8" />
                            <button
                                class="flex items-center justify-center btn btn-success w-full px-4 py-2 text-sm font-medium leading-5 text-white text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray"
                                name='login' type="submit">Iniciar Sesión</button>
                        </form>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer id="footer">

<!-- .subfooter start -->
<div class="subfooter bg-primary">
    <div class="container ">
        <div class="row">
            <div class="col-md-12">
                <p class="text-center text-white">Copyright-2023-Hospital El Oro <a>Sistema de Citas Médicas</a>.</p>
            </div>
        </div>
    </div>
</div>
<!-- .subfooter end -->

</footer>
 
</body>

</html>