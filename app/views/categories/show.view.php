
<?php require('app/views/partials/head.php'); ?>
<?php require('app/views/partials/nav.php'); ?>

<main role="main" class="container" id="top">

    <header class="m-100">
        <h4 class=" mt-5 section-heading " >
            <span class="text-muted">Categories
                <?php if ( $category ) {
                        echo "/ " . $category->getCategory();
                    } else {
                        echo "";
                    }
                ?>
            </span>
        </h4>
        <hr /><br />
    </header>

    <section id="content" class="row">

        <div class="col-12 col-md-8 w-100 mb-5" >

            <?php if ( ! array_key_exists(0, $productsOfCategory)) : ?>
                <section id="content" class="row">
                    <div class="col-12 col-md-8 w-100 mb-5" >
                        <h3 class="text-muted">This Category contains no products.</h3>
                    </div>
                </section>
            <?php else : ?>

            <?php foreach ($productsOfCategory as $productOfCategory): ?>
            <div>
                <img src=<?php echo "/public/images/products/" . $productOfCategory["image"]; ?>
                    class="img-fluid" width="100%;" alt="">
            </div>

            <div class="my-4 text-uppercase text-muted">
                <h4 class="font-weight-bold"><?php echo $productOfCategory["name"]; ?></h4>
            </div>

            <div class="text-muted">
                <i class="far fa-calendar-alt"></i>
                    <?php echo date( 'M d, Y h:i a', strtotime($productOfCategory["created_on"]) ); ?> &nbsp; |  &nbsp;
                <i class="far fa-user"></i> &nbsp; Admin &nbsp; | &nbsp;
                <i class="far fa-folder"></i> &nbsp; <a href=""> <?php
                echo $productOfCategory["category"]; ?> </a>
            </div>

            <div class="mt-4 text-justify mb-2">
                <p><?php echo $productOfCategory["description"]; ?></p>
            </div>

            <a href="/products/<?php echo $productOfCategory["id"]; ?>" class="btn btn-primary mb-5">Read and comment</a>

            <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <?php require("app/views/partials/aside.php"); ?>

    </section>

    <div class="container">
        <hr class="divider" >
    </div>

    <!-- FOOTER -->
    <footer class="container">
        <p class="float-right"><a href="#">Back to top</a></p>
        <p>&copy; 2017-2018 <span class="brand-footer">Comment Me</span> &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
    </footer>
</main>

<?php require('app/views/partials/footer.php'); ?>
