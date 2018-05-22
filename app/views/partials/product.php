
<div class="container">

    <header class="m-100">
        <div class="">
            <h2 class="section-heading mt-5" ><span class="text-muted">Comments</span></h2>
            <hr /><br />
        </div>
    </header>

    <section id="content" class="row">

        <section class="col-12 col-md-8 w-100 mb-5" >

            <div>
                <img src=<?php echo "/public/images/products/" . $product["image"]; ?>
                    class="img-fluid" width="100%;" alt="">
            </div>

            <div class="my-4 text-uppercase text-muted">
                <h4 class="font-weight-bold"><?php echo $product["name"]; ?></h4>
            </div>

            <div class="text-muted">
                <i class="far fa-calendar-alt"></i>
                    <?php echo date( 'M d, Y h:i a', strtotime($product["created_on"]) ); ?> &nbsp; | &nbsp;
                <i class="far fa-comment"></i> &nbsp; <?php echo $count["count"]; ?> &nbsp; | &nbsp;
                <i class="far fa-user"></i> &nbsp; Admin &nbsp; | &nbsp;
                <i class="far fa-folder"></i> &nbsp; <a href=<?php echo "/categories/" . $product["category_id"] ?>> <?php
                echo $product["category"]; ?> </a>
            </div>

            <div class="mt-4 text-justify mb-5">
                <p>
                    <?php echo $product["description"]; ?>
                </p>
            </div>

            <div class="my-4 text-uppercase text-muted">
                <h4><b>leave a comment</b></h4>
                <hr /><br />
            </div>

            <?php require('app/views/partials/errors.php'); ?>
            <?php require('app/views/partials/success.php'); ?>

            <?php if ( $user ) : ?>
            <div class="mb-5 mt-4">
                <form class="" action="/comments" method="post">
                    <div class="form-group">
                        <label for="body" class="text-muted">Comment</label>
                        <textarea class="form-control" name="body" id="body" rows="5"></textarea>
                    </div>
                    <input type="hidden" name="product_id" value=<?php echo $product["id"]; ?> />
                    <button type="submit" class="btn btn-primary">Comment</button>
                </form>
            </div>
            <?php else : ?>
                <a  href="/#login" class="btn btn-primary mb-5">Comment</a>
            <?php endif; ?>

            <br />

            <div class="mt-5" id="comments">
                <?php foreach ( $productComments as $comment ) : ?>
                <ul class="list-unstyled mb-5">
                    <li class="media">
                        <img class="mr-3 img-fluid comment-img" src="/public/images/users/user-1.png" alt="user image">
                        <div class="media-body">
                            <h5 class="mt-0 mb-1 text-muted font-weight-bold comment-title ">
                                <span> <?php echo $comment["username"] ?> </span> &nbsp; | &nbsp;
                                <span class="date text-muted">
                                    <?php echo date( 'M d, y h:i a', strtotime($comment["created_on"]) ); ?>
                                </span>
                            </h5>
                            <div class="text-muted">
                                <p> <?php echo $comment["body"] ?> </p>
                            </div>
                            <div class="mt-3 text-muted">
                                <i class="fas fa-thumbs-up"></i> &nbsp; 143 &nbsp; | &nbsp; <i class="fas fa-thumbs-down"></i> &nbsp; 23
                            </div>

                        </div>
                    </li>
                </ul>
                <?php endforeach; ?>
            </div>

        </section>

        <?php require("app/views/partials/aside.php"); ?>

    </section>
    
</div>
