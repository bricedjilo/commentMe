
<?php require('app/views/partials/head.php'); ?>
<?php require('app/views/partials/nav.php'); ?>

<main role="main" id="top">
    <?php require('app/views/partials/carousel.php'); ?>

    <div class="marketing">

        <div class="container" id="categories">
            <hr class="divider" >
        </div>

        <?php require('app/views/partials/categories.php'); ?>

        <div class="container" id="shop-me">
            <hr class="divider" >
        </div>

        <?php require('app/views/partials/shop-me.php'); ?>

        <div class="container" id="new-arrivals">
            <hr class="divider" >
        </div>

        <?php require('app/views/partials/landing-page-new-products.php'); ?>

        <div class="container" id="login">
            <hr class="divider" >
        </div>

        <?php require('app/views/partials/login-section.php'); ?>

    </div>

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
