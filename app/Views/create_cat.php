<?= $this->extend('layouts/assemble') ?>
<?= $this->section('title') ?>Employees<?= $this->endSection() ?>
<?= $this->section('content') ?>

<div class="container mt-5">
    <h3 class="mb-3">Categories</h3>
    <a href="<?= base_url('list_categories') ?>">
        <button class="btn btn-sm btn-danger text-light fw-bold mb-2">
            Back
        </button>
    </a>

    <form action="<?php echo base_url('list_categories/create'); ?>" method="post">
        <div class="mt-3">
            <label for="c_name" class="form-label">Category Name: </label>
        </div>
        <div class="mb-3">
            <input type="c_name" class="form-control" id="c_name" name="c_name" value="<?= old('c_name') ?>" ?>
        </div>
        <button type="submit" class="btn btn-sm btn-success w-100">Create</button>
    </form>

</div>

<?= $this->endSection(); ?>