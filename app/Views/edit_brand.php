<?= $this->extend('layouts/assemble') ?>
<?= $this->section('title') ?>Employees<?= $this->endSection() ?>
<?= $this->section('content') ?>

<div class="container my-5">

    <h3 class="mb-3">Edit User</h3>
    <a href="<?= base_url('brand') ?>">
        <button class="btn btn-sm btn-warning text-light fw-bold mb-2">
            Back
        </button>
    </a>

    <form method="POST" action="<?= base_url('brand/' . $brands['id'] . '/edit') ?>">
        <div class="mb-3">
            <label for="b_name" class="form-label">Brand Name: </label>
            <input type="b_name" class="form-control" id="b_name" name="b_name" value="<?= $brands['b_name'] ?>">

        </div>

        <button type="submit" class="btn btn-sm btn-success w-100">Update</button>
    </form>
</div>
<!-- Optional JavaScript; choose one of the two! -->
<?= $this->endSection(); ?>