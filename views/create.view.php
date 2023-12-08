<?php
$title = "Création";
ob_start();
?>
<div class="container pt-3">
    <h3 class="text-center bg-dark text-light p-4 rounded-2 shadow mb-2">Character Creation</h3>
</div>

<div class=" flex-grow-1 d-flex container">
    <div class="row container w-100">
        <!-- formulaire qui renvoie à l'adresse validationCreation qui traitera les données-->
        <form class="w-75 mx-auto" action="./validationCreation" method="POST">
            <!-- récup du nom du nouveau personnage -->
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <!-- recup de sa race dans une formulaire bouclant sur races récupérer du Controller-->
            <div class="mb-3">
                <label for="race" class="form-label">Race</label>
                <select class="form-select form-select-lg mb-3" name='race' id='race'>
                    <?php foreach ($races as $race) : ?>
                        <option value="<?= $race['race'] ?>"><?= $race['race'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <!-- recup de son type dans une formulaire bouclant sur types récupérer du Controller -->
            <div class="mb-3">
                <label for="type" class="form-label">Type</label>
                <select class="form-select form-select-lg mb-3" name='type' id='type'>
                    <?php foreach ($types as $type) : ?>
                        <option value="<?= $type['type'] ?>"><?= $type['type'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <!-- recup de sa santé -->
            <div class="mb-3">
                <label for="health" class="form-label">Health</label>
                <input type="number" class="form-control" id="health" name="health">
            </div>
            <!-- recup de sa force -->
            <div class="mb-3">
                <label for="power" class="form-label">Power</label>
                <input type="number" class="form-control" id="power" name="power">
            </div>
            <!-- soumission du formulaire -->
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
</div>




<?php
$content = ob_get_clean();
require_once("./views/template.php");
?>