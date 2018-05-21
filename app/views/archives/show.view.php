<?php require('app/views/partials/head.php'); ?>
<?php require('app/views/partials/nav.php'); ?>

<main role="main" class="container" id="top">

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
