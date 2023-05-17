<?php include "db.php"; ?>
<?php include "functions.php"; ?>

<?php include "includes/header.php" ?>

<div class="container">
    <div class="col-sm-6">
        <pre>
<?php ReadRows() ?>
</pre>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

<?php include "includes/footer.php" ?>