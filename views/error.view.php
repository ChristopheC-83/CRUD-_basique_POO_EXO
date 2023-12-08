

<?php
$title = "Erreur ";
ob_start();
?>
<div class="container pt-3">
    <h3 class="text-center bg-dark text-light p-4 rounded-2 shadow mb-2">On est perdu ?</h3>
</div>

<div class=" flex-grow-1 d-flex container">
<?= $error?>
</div>




<?php
$content = ob_get_clean();
require_once("./views/template.php");
?>