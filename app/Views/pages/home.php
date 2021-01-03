<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
        <?= view_cell('App\Libraries\widget::carousel', [$carousel]) ?>
<?= $this->endSection(); ?>