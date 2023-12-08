<?php
$title = "MAJ";
ob_start();
?>



<div class="container pt-3">
    <h3 class="text-center bg-dark text-light p-4 rounded-2 shadow mb-2"><?= $character['name'] ?> Updating</h3>
</div>

<div class=" flex-grow-1 d-flex container">
    <div class="row container w-100">

        <!-- Formulaire envoyé à validationUpdate à suivre dans  index.php -->
        <form class="w-75 mx-auto" action="./validationUpdate" method="POST">

            <input type="hidden" name="id" value=<?= $character['id'] ?>>

            <!-- MAJ Nom -->
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value=<?= $character['name'] ?>>
            </div>

            <!-- MAJ Race -->
            <div class="mb-3">
                <label for="race" class="form-label">Race</label>
                <select class="form-select form-select-lg mb-3" name='race' id='race'>
                    <?php foreach ($races as $race) : ?>
                        <option value="<?= $race['race'] ?>" <?= $race['race'] === $character['race']   ? 'selected' : '' ?>>
                            <?= $race['race'] ?>
                        </option>
                    <?php endforeach ?>
                </select>
            </div>

            <!-- MAJ Type -->
            <div class="mb-3">
                <label for="type" class="form-label">Type</label>
                <select class="form-select form-select-lg mb-3" name='type' id='type'>
                    <?php foreach ($types as $type) : ?>
                        <option value="<?= $type['type'] ?>" <?= $type['type'] === $character['type']   ? 'selected' : '' ?>><?= $type['type'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>

            <!-- MAJ Santé -->
            <div class="mb-3">
                <label for="health" class="form-label">Health</label>
                <input type="number" class="form-control" id="health" name="health" value=<?= $character['health'] ?>>
            </div>

            <!-- MAJ Force -->
            <div class="mb-3">
                <label for="power" class="form-label">Power</label>
                <input type="number" class="form-control" id="power" name="power" value=<?= $character['power'] ?>>
            </div>

            <!-- Soumission du formulaire -->
            <button type="submit" class="btn btn-primary">Updating</button>
        </form>
    </div>
</div>



<?php
$content = ob_get_clean();
require_once("./views/template.php");
?>