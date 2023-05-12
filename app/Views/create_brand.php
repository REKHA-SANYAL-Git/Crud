<?= $this->extend('layouts/assemble') ?>
<?= $this->section('title') ?>Employees<?= $this->endSection() ?>
<?= $this->section('content') ?>


<div class="container mt-5">
    <h3 class="mb-3">BRAND</h3>
    <a href="<?= base_url('brand') ?>">
        <button class="btn btn-sm btn-danger text-light fw-bold mb-2">
            Back
        </button>
    </a>

    <form action="<?php echo base_url('brand/create'); ?>" method="post">
        <div class="mt-3">
            <label for="b_name" class="form-label">Brand Name: </label>
        </div>
        <div class="mb-3">
            <input type="b_name" class="form-control" id="b_name" name="b_name" value="<?= old('b_name') ?>" ?>
        </div>
        <button type="submit" class="btn btn-sm btn-success w-100">Create</button>
    </form>


</div>

<?= $this->endSection(); ?>