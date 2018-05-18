
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
                <li class="breadcrumb-item active">Show Products</li>
            </ol>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="row">Name</th>
                            <th scope="col" >Description</th>
                            <th scope="col" class="">Image</th>
                            <th scope="col" class="">Category</th>
                            <th scope="col" class="">Edit</th>
                            <th scope="col" class="">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($products as $product) : ?>
                        <tr>
                            <th ><?php echo $product["name"]; ?></th>
                            <td ><?php echo $product["description"]; ?></td>
                            <td class="px-0 mx-0"><img width="60%" class="img-thumbnail mx-0 auto"
                                src=<?php echo "/public/images/products/" . $product["image"]; ?> alt=""></td>
                            <td ><?php echo $product["category"]; ?></td>
                            <td ><a href=""><i class="far fa-edit fa-lg"></i></a></td>
                            <td ><a href=<?php echo "/products/{$product["id"]}"; ?>><i class="far fa-trash-alt fa-lg"></i></a></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            <br /><br />
            <?php require('app/views/partials/admin/admin-footer.php'); ?>
        </div>
    </div>
</div>

<?php require('app/views/partials/footer.php'); ?>
