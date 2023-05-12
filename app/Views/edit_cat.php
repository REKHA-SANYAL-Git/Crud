<?= $this->extend('layouts/assemble') ?>
<?= $this->section('title') ?>Employees<?= $this->endSection() ?>
<?= $this->section('content') ?>

<div class="container my-5">

    <h3 class="mb-3">Edit Category</h3>
    <a href="<?= base_url('list_categories') ?>">
        <button class="btn btn-sm btn-warning text-light fw-bold mb-2">
            Back
        </button>
    </a>

    <form method="POST" action="<?= base_url('list_categories/' . $categories['id'] . '/edit') ?>">
        <div class="mb-3">
            <label for="c_name" class="form-label">Category Name: </label>
            <input type="c_name" class="form-control" id="c_name" name="c_name" value="<?= $categories['c_name'] ?>">

        </div>

        <button type="submit" class="btn btn-sm btn-success w-100">Update</button>
    </form>
</div>
<!-- Optional JavaScript; choose one of the two! -->
<?= $this->endSection(); ?>