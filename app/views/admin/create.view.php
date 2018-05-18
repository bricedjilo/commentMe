
<?php require('app/views/partials/head.php'); ?>

<div class="fixed-nav sticky-footer bg-dark" id="page-top">

    <?php require('app/views/partials/admin/admin-nav.php'); ?>

    <div class="content-wrapper mt-5">
        <div class="container-fluid mt-4">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb mb-5">
                <li class="breadcrumb-item">
                    <a href="/admin/products/create">Products</a>
                </li>
                <li class="breadcrumb-item active">Add Product</li>
            </ol>

            <div class="row">
                <form class="col-xs-12 col-md-9" action="/products" method="post" enctype="multipart/form-data">

                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                        <?php require('app/views/partials/success.php'); ?>
                        <?php require('app/views/partials/errors.php'); ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="product-name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" name="product-name"
                            placeholder="Product name" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="description" class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-10">
                            <textarea name="description" class="form-control" placeholder="Product Description" required> </textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="category" class="col-sm-2 col-form-label">Category</label>
                        <div class="col-sm-10">
                            <select class="custom-select" name="category_id" required>
                                <option selected>Select a category</option>
                                <?php foreach($categories as $category) : ?>
                                <option value=<?php echo $category->getId(); ?>>
                                    <?php echo $category->getCategory(); ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="image" class="col-sm-2 col-form-label">Image</label>
                        <div class="col-sm-10">
                            <div class="custom-file">
                                <input type="file" name="image" class="custom-file-input" id="image"
                                accept="image/jpeg,image/png,image/tiff" required>
                                <label class="custom-file-label" for="image">Select an image</label>
                            </div>
                        </div>
                    </div><br>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <button type="submit" name="submit" class="btn btn-primary">Add Product</button>
                        </div>
                    </div>
                    <br /><br /><br /><br /><br />
                </form>
            </div>

            <?php require('app/views/partials/admin/admin-footer.php'); ?>
            <?php require('app/views/partials/logout-modal.php'); ?>
        </div>
    </div>
</div>

<?php require('app/views/partials/footer.php'); ?>
