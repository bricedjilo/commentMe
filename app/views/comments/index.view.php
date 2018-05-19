
<?php require('app/views/partials/head.php'); ?>
<?php require('app/views/partials/nav.php'); ?>

<main role="main" class="container" id="top">

    <header class="m-100">
        <div class="">
            <h2 class="section-heading mt-5" ><span class="text-muted">Comments</span></h2>
            <hr /><br />
        </div>
    </header>

    <section id="content" class="row">

        <section class="col-12 col-md-8 w-100 mb-5" >

            <div>
                <img src=<?php echo "public/images/products/" . $recentProducts[0]->getImage(); ?>
                    class="img-fluid" width="100%;" alt="">
            </div>

            <div class="my-4 text-uppercase text-muted">
                <h4 class="font-weight-bold"><?php echo $recentProducts[0]->getName(); ?></h4>
            </div>

            <div class="text-muted">
                <i class="far fa-calendar-alt"></i>
                    <?php echo date( 'M d, Y h:i a', strtotime($recentProducts[0]->getCreatedOn()) ); ?> &nbsp; | &nbsp;
                <i class="far fa-comment"></i> &nbsp; 0 &nbsp; | &nbsp;
                <i class="far fa-user"></i> &nbsp; Admin &nbsp; | &nbsp;
                <i class="far fa-folder"></i> &nbsp; <a href=""> <?php
                echo $categoryOfMostRecentProduct[0]->getCategory(); ?> </a>
            </div>

            <div class="mt-4 text-justify mb-5">
                <p>
                    <?php echo $recentProducts[0]->getDescription(); ?>
                </p>
            </div>

            <div class="my-4 text-uppercase text-muted">
                <h4><b>leave a comment</b></h4>
                <hr /><br />
            </div>

            <div class="mb-5 mt-4">
                <form class="" action="index.html" method="post">
                    <div class="form-group">
                        <label for="exampleTextarea"></label>
                        <textarea class="form-control" name="comment" id="comment" rows="5"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Comment</button>
                </form>
            </div>

            <br />

            <div class="mt-5">
                <ul class="list-unstyled">
                    <li class="media">
                        <img class="mr-3 img-fluid comment-img" src="public/images/users/user-1.png" alt="user image">
                        <div class="media-body">
                            <h5 class="mt-0 mb-1"> Username &nbsp; | &nbsp; 2 months ago </h5>
                            <div class="">
                                Cras sit amet nibh libero, in gravida nulla. tempus viverra turpis.
                                Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue
                                felis in faucibus.
                            </div>
                            <div class="mt-3">
                                <i class="fas fa-thumbs-up"></i> &nbsp; 143 &nbsp; | &nbsp; <i class="fas fa-thumbs-down"></i> &nbsp; 23
                            </div>

                        </div>

                    </li>
                </ul>
            </div>

        </section>

        <?php require("app/views/comments/aside.php"); ?>

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
