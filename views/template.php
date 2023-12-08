<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=roboto:100,400,700,900" rel="stylesheet" />
    <title>PHP by Rocket</title>
</head>

<body class="d-flex flex-column min-vh-100 roboto-font bg-light">
    <div class="content flex-grow-1 d-flex flex-column overflow-x-hidden">
        <header class="p-3 bg-dark">
            <h1 class="container text-light text-center fw-bold">My Fighters</h1>
        </header>
        <div class="min-vw-100 p-1 bg-info">
            <div class="container">
                <button class="btn btn-secondary btn-lg text-light m-3">
                    <a href="home" class="text-light text-decoration-none">List</a>
                </button>
                <button class="btn btn-secondary btn-lg text-light m-3">
                    <a href="create" class="text-light text-decoration-none">Create</a>
                </button>
            </div>
        </div>


        <!-- pour afficher les messagess -->
        <?php if (!empty($_SESSION['alert'])) : ?>
            <div class="container mt-3 alert <?= $_SESSION['alert']['type'] ?>" role="alert">
                <?= $_SESSION['alert']['message'] ?>
            </div>

        <?php
            unset($_SESSION['alert']);
        endif;
        ?>


        <!-- affiche le contenu spécifique de la page sélectionnée -->
        <?= $content ?>


        <footer class="p-3 bg-dark mt-4">
            <h3 class=" container text-center text-light">Footer by Kiki</h3>
        </footer>

        <script src="./public/javascript/app.js"></script>

</body>

</html>