<!-- templates/main.php -->
<div class="container text-center">
    <h1 class="my-4">Las Próximas Películas de Marvel</h1>
    
    <!-- Primera película -->
    <div class="mb-5">
        <!-- Póster centrado -->
        <img src="<?= $poster_url; ?>" class="img-fluid rounded mx-auto d-block" style="max-width: 300px;" alt="<?= $title ?>">
        
        <!-- Información debajo del póster -->
        <h3 class="mt-3"><?= $title ?></h3>
        <p><?= $until_message; ?></p>
        <p>Estreno: <?= $release_date; ?></p>
    </div>
    <hr>
    <!-- Segunda película  -->
    <?php if ($next_poster) : ?>
        
        <div class="mb-5">
            <!-- Póster centrado -->
            <img src="<?= $next_poster; ?>" class="img-fluid rounded mx-auto d-block" style="max-width: 300px;" alt="<?= $following_production ?>">
            
            <!-- Información debajo del póster -->
            <h3 class="mt-3"><?= $following_production ?></h3>
            <p>Estreno: <?= $next_release; ?></p>
            <?php if ($next_overview) : ?>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</div>