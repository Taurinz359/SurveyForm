<div class="container">
    <div class="row">
        <?php foreach ($data['files'] as $file) : ?>
            <div class="card text-dark m-3" style="width: 18rem; background-color:rgba(255, 255, 255, 0.34)">
                <div class="card-body">
                    <h5 class="card-title"> ID: <?php echo $file ?></h5>
                    <a href="<?php echo $file ?>" class="btn btn-primary">Open</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>