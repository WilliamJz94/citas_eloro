<?php
   session_start();
  
  if(!isset($_SESSION['cargo']) || $_SESSION['cargo'] != 2){
    header('location: ../page-login.php');
  }
?>

<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Area de Pacientes</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="../../assets/css/tailwind.output.css" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="../../assets/js/init-alpine.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" defer></script>
    <script src="../../assets/js/charts-lines.js" defer></script>
    <script src="../../assets/js/charts-pie.js" defer></script>

    <!--DataTables [ OPTIONAL ]-->
    <link href="../..\assets\plugins/DataTables/css/datatables.css" rel="stylesheet">

    <script src="../../assets/plugins/DataTables/js/datatables.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
    </script>

</head>

<body>

    <div class="flex h-screen dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
        <!-- Desktop sidebar -->
        <aside class="z-20 hidden bg-blue-500 w-64 overflow-y-auto bg-white dark:bg-gray-800 md:block flex-shrink-0">
            <div class="py-4 text-gray-500   dark:text-gray-400">

                <ul class="mt-6">
                    <li class="relative px-6 py-3">
                        <span class="absolute inset-y-0 left-0 w-1  rounded-tr-lg rounded-br-lg"
                            aria-hidden="true"></span>
                        <a class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
                            href="patiens-mostrar.php">
                            <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                                </path>
                            </svg>
                            <span class="ml-4 text-white">Mis Citas</span>
                        </a>
                    </li>
                </ul>


            </div>
        </aside>
        <!-- Mobile sidebar -->
        <!-- Backdrop -->
        <div x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150"
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="fixed inset-0 z-10 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"></div>
        <aside class="fixed inset-y-0 z-20 flex-shrink-0 w-64 mt-16 overflow-y-auto bg-white dark:bg-gray-800 md:hidden"
            x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150"
            x-transition:enter-start="opacity-0 transform -translate-x-20" x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0 transform -translate-x-20" @click.away="closeSideMenu"
            @keydown.escape="closeSideMenu">
            <div class="py-4 text-gray-500 dark:text-gray-400">

                <ul class="mt-6">
                    <li class="relative px-6 py-3">
                        <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                            aria-hidden="true"></span>
                        <a class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
                            href="patiens-mostrar.php">
                            <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                                </path>
                            </svg>
                            <span class="ml-4">Mis Citas</span>
                        </a>
                    </li>
                </ul>

            </div>
        </aside>
        <div class="flex flex-col flex-1 w-full">
            <header class="z-10 py-4 bg-white shadow-md dark:bg-gray-800">
                <div
                    class="container flex items-center justify-between h-full px-6 mx-auto text-purple-600 dark:text-purple-300">
                    <!-- Mobile hamburger -->
                    <button class="p-1 mr-5 -ml-1 rounded-md md:hidden focus:outline-none focus:shadow-outline-purple"
                        @click="toggleSideMenu" aria-label="Menu">
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <!-- Search input -->
                    <div class="flex justify-center flex-1 lg:mr-32">
                        <div class="relative w-full max-w-xl mr-6 focus-within:text-purple-500">

                        </div>
                    </div>

                    <ul class="flex items-center flex-shrink-0 space-x-6">
                        <!-- Theme toggler -->

                        <!-- Notifications menu -->
                        <li class="relative">
                            <span class="">
                                <?php echo ucfirst($_SESSION['nombre']); ?><br>
                                <span class="user-level">Paciente</span>
                            </span>

                        </li>
                        <!-- Profile menu -->
                        <li class="relative">

                            <button class="align-middle rounded-full focus:shadow-outline-purple focus:outline-none"
                                @click="toggleProfileMenu" @keydown.escape="closeProfileMenu" aria-label="Account"
                                aria-haspopup="true">


                        <li class="flex">
                            <a class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200"
                                href="../pages-logout.php">
                                <svg class="w-4 h-4 mr-3" aria-hidden="true" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                    <path
                                        d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1">
                                    </path>
                                </svg>
                                <span>Salir</span>
                            </a>
                        </li>




                        <template x-if="isProfileMenuOpen">
                            <ul x-transition:leave="transition ease-in duration-150"
                                x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                                @click.away="closeProfileMenu" @keydown.escape="closeProfileMenu"
                                class="absolute right-0 w-56 p-2 mt-2 space-y-2 text-gray-600 bg-white border border-gray-100 rounded-md shadow-md dark:border-gray-700 dark:text-gray-300 dark:bg-gray-700"
                                aria-label="submenu">




                            </ul>
                        </template>
                        </li>
                    </ul>
                </div>
            </header>

            <main class="h-full overflow-y-auto">
                <div class="container px-6 mx-auto grid">
                    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">

                    </h2>
                    <!-- CTA -->

                    <!-- Cards -->


                    <!-- New Table -->

                    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                        <form method="POST" autocomplete="off" enctype="multipart/form-data" role="form">


                            <label class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Asunto</span>
                                <input required name="asunto" type="text"
                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                            </label>


                            <label class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Especialidad</span>

                                <select
                                    class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                    name="especialidad">
                                    <option>Selecciona una Especialdiad</option>

                                    <option value="Odontologia">Odontologia</option>
                                    <option value="Cardiologia">Cardiologia</option>
                                    <option value="Neumologia">Neumologia</option>
                                    <option value="Pediatria">Pediatria</option>
                                    <option value="Ginecologia">Ginecologia</option>
                                    <option value="Reumatologia">Reumatologia</option>
                                    <option value="Medicina Interna">Medicina Interna</option>
                                    <option value="Endocrinologia">Endocrinologia</option>

                                </select>

                            </label>


                            <label class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Hora</span>

                                <input type="datetime-local" name="start" value="2021-11-12T19:30"
                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />

                            </label>





                            <footer
                                class="flex flex-col items-center justify-end px-3 py-2 -mx-3 -mb-6 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row bg-gray-50 dark:bg-gray-800">

                                <button name="nuevo"
                                    class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                    Guardar
                                </button>

                            </footer>

                        </form>

                    </div>



                </div>


                <script src="../../assets/js/funciones/espe.js"></script>
                <script src="../../assets/js/funciones/paci.js"></script>



                <?php
if(isset($_POST["nuevo"])){
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "citas_hospital";

// Creamos la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Revisamos la conexión
if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
   } 
$asunto=$_POST['asunto'];
$especialidad=$_POST['especialidad'];
$start=$_POST['start'];







// Realizamos la consulta para saber si coincide con uno de esos criterios
$sql = "select * from citas where asunto='$asunto' or especialidad='$especialidad' or start='$start'";
$result = mysqli_query($conn, $sql);
?>


                <?php
 // Validamos si hay resultados
 if(mysqli_num_rows($result)>0)
 {
        // Si es mayor a cero imprimimos que ya existe el usuario
      
        if($result){
   ?>

                <script type="text/javascript">
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Ya existe el registro a agregar!'

                })
                </script>
                <?php
    }
 }
 else
 {
// Si no hay resultados, ingresamos el registro a la base de datos
$sql2 = "INSERT INTO citas(asunto, especialidad, start )VALUES ('$asunto','$especialidad','$start')";


if (mysqli_query($conn, $sql2)) {
      
       if($sql2){
   ?>

                <script type="text/javascript">
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Agregado correctamente',
                    showConfirmButton: false,
                    timer: 1500
                }).then(function() {
                    window.location = "../folder/citas.php";
                });
                </script>

                <?php
    }
    else{
       ?>
                <script type="text/javascript">
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'No se pudo guardar!'

                })
                </script>
                <?php

    }
    
} else {
      
       echo "Error: " . $sql2 . "" . mysqli_error($conn);
}

}
// Cerramos la conexión
$conn->close();

}
?>






                <?php require '../template/footer.php';  ?>

</body>