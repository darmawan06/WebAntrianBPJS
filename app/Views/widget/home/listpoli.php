<?php foreach ($data as $key) : ?>
    <a href="#" class="list-group-item ml-2 mr-2 col-2">
        <i class="<?= $key['logo'] ?>"></i>
        <span><?= $key['title'] ?></span>
    </a>
<?php endforeach ?>