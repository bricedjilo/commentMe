
<?php require('app/views/partials/head.php'); ?>
<?php require('app/views/partials/nav.php'); ?>

    <div class="container">

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

        <?php require('app/views/partials/product-list.php'); ?>

    </div>

<?php require('app/views/partials/footer.php'); ?>
