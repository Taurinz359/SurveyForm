<div class="container" style="width: 400px; ">
    <ol class="list-group list-group-numbered ">
        <?php foreach ($file as $name => $value) : ?>
            <li class="list-group-item d-flex justify-content-between align-items-start m-2" style="background-color:rgba(255, 255, 255, 0.5)">
                <div class="ms-2 me-auto">
                    <div class="fw-bold"><?php echo $name ?></div>
                    <?php echo $value ?>
                </div>
            </li>
        <?php endforeach ?>
    </ol>
</div>