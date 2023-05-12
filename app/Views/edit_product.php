<?= $this->extend('layouts/assemble') ?>
<?= $this->section('title') ?>Employees<?= $this->endSection() ?>
<?= $this->section('content') ?>

<div class="container my-5">

    <h3 class="mb-3">Edit Products</h3>
    <a href="<?= base_url('products') ?>">
        <button class="btn btn-sm btn-warning text-light fw-bold mb-2">
            Back
        </button>
    </a>

    <form method="POST" action="<?= base_url('products/' . $Products['id'] . '/edit') ?>">
        <div class="mb-3">
            <label for="p_name" class="form-label">Product Name: </label>
            <input type="p_name" class="form-control" id="p_name" name="p_name" value="<?= $Products['p_name'] ?>">
        </div>
        <div class="mt-2">
            <label for="m_no" class="form-label">Model No: </label>
        </div>
        <div class="mb-2">
            <input type="m_no" class="form-control" id="m_no" name="m_no" value="<?= $Products['m_no'] ?>" ?>
        </div>

        <button type="submit" class="btn btn-sm btn-success w-100">Update</button>
    </form>
</div>
<!-- Optional JavaScript; choose one of the two! -->
<?= $this->endSection(); ?>