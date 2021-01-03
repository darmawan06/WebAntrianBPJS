
<?= $this->extend('layout/template'); ?>

<?= $this->section('content') ?>
<div id="cariDokter" class="container-fluid p-4">
	<div class="row ">
		<?= view_cell('App\Libraries\widget::form_caridokter') ?>
		<?= view_cell('App\Libraries\widget::list_caridokter') ?>
	</div>
</div>
<style>
    #cariDokter{
        min-height:150px;
    }
</style>
<script type="text/javascript" src="<?= base_url("js/page_caridokter/index.js") ?>"></script>
<?= $this->endSection() ?>
