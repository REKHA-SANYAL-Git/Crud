<?= $this->extend('layouts/assemble') ?>
<?= $this->section('title') ?>Employees<?= $this->endSection() ?>
<?= $this->section('content') ?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Employee Manager | Products</title>
</head>

<body>

    <div class="container mt-5">
        <h3 class="mb-3">Products</h3>
        <a href="<?= base_url('products') ?>">
            <button class="btn btn-sm btn-info text-light fw-bold mb-2">
                Back
            </button>
        </a>

        <form action="<?= base_url('products/create') ?>" method="post">
            <div class="mt-2">
                <label for="p_name" class="form-label">Product Name: </label>
            </div>
            <div class="mb-2">
                <input type="p_name" class="form-control" id="p_name" name="p_name" value="<?= old('p_name') ?>" ?>
            </div>

            <div class="mb-2">
                <label for="b_name" class="form-label">Brand Name:</label>


                <?php echo form_dropdown('b_id', $brand_options);
                ?>
            </div>
            <div class="mb-2">
                <label for="c_name" class="form-label">Category Name:</label>


                <?php echo form_dropdown('c_id', $cat_options);
                ?>
            </div>
            <div class="mt-2">
                <label for="m_no" class="form-label">Model No: </label>
            </div>
            <div class="mb-2">
                <input type="m_no" class="form-control" id="m_no" name="m_no" value="<?= old('m_no') ?>" ?>
            </div>
            <div class="mt-2">
                <label for="quantity" class="form-label">Quantity: </label>
            </div>
            <div class="mb-2">
                <input type="quantity" class="form-control" id="quantity" name="quantity" value="<?= old('quantity') ?>" ?>
            </div>
            <div class="mt-2">
                <label for="price" class="form-label">Price: </label>
            </div>
            <div class="mb-2">
                <input type="price" class="form-control" id="price" name="price" value="<?= old('price') ?>" ?>
            </div>



            <button type="submit" class="btn btn-sm btn-success w-100">ADD</button>
        </form>
    </div>


    <?= $this->endSection(); ?>