<?php require('app/views/partials/head.php'); ?>
<?php require('app/views/partials/nav.php'); ?>

<div class="container">

    <header class="m-100">
        <h4 class=" mt-5 section-heading " >
            <span class="text-muted">Archives
                <?php if ( $products ) {
                        echo "/ " . (\DateTime::createFromFormat('Y-m-d H:i:s', $products[0]["created_on"]))->format('F d, Y');
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
