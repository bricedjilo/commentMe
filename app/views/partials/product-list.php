

    <section id="content" class="row">

        <div class="col-12 col-md-8 w-100 mb-5" >

            <?php if ( ! array_key_exists(0, $products)) : ?>
                <section id="content" class="row">
                    <div class="col-12 col-md-8 w-100 mb-5" >
                        <h3 class="text-muted">This Category contains no products.</h3>
                    </div>
                </section>
            <?php else : ?>

            <?php foreach ($products as $product): ?>
            <div>
                <img src=<?php echo "/public/images/products/" . $product["image"]; ?>
                    class="img-fluid" width="100%;" alt="">
            </div>

            <div class="my-4 text-uppercase text-muted">
                <h4 class="font-weight-bold"><?php echo $product["name"]; ?></h4>
            </div>
            
            <div class="text-muted">
                <i class="far fa-calendar-alt"></i>
                    <?php echo date( 'M d, Y h:i a', strtotime($product["created_on"]) ); ?> &nbsp; |  &nbsp;
                <i class="far fa-user"></i> &nbsp; Admin &nbsp; | &nbsp;
                <i class="far fa-folder"></i> &nbsp;
                <a href="<?php echo "/categories/" . $product["category_id"] ?>">
                    <?php echo $product["category"]; ?>
                </a>
            </div>

            <div class="mt-4 text-justify mb-2">
                <p><?php echo $product["description"]; ?></p>
            </div>

            <a href="/products/<?php echo $product["id"]; ?>" class="btn btn-primary mb-5">Read and comment</a>

            <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <?php require("app/views/partials/aside.php"); ?>

    </section>
