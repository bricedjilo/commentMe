
<aside class="col-12 col-md-4">
    <?php if ( isset($product) ) : ?>
        <div class="p-3 mb-3 bg-light rounded">
            <h4 class="text-muted font-weight-bold"><?php echo $product["name"]; ?></h4>
            <p class="mb-0"><?php echo substr($product["description"], 0, 100) . " ..."; ?>
            </p>
        </div>
    <?php endif; ?>
    <div class="p-3">
        <h4 class="text-muted">Categories</h4>
        <ol class="list-unstyled mb-0">
            <?php foreach ($categories as $category) : ?>
                <li><a href="/categories/<?php echo $category->getId(); ?>"><?php echo $category->getCategory(); ?></a></li>
            <?php endforeach; ?>
        </ol>
    </div>

    <div class="p-3">
        <h4 class="text-muted">Hot And New Products</h4>
        <ul class="list-unstyled mt-4">
            <?php foreach($recentProducts as $recent) : ?>
                <li class="media mb-3">
                    <img class="mr-3 recent-post"
                    src=<?php echo "/public/images/products/" . $recent["image"]; ?>
                    class="img-fluid" alt="Recently added product">
                    <div class="media-body media-title">
                        <h5 class="mt-0 mb-1 text-sm-left">
                            <a href="/products/<?php echo $recent["id"]; ?>" >
                            <?php echo $recent["name"]; ?></a>
                        </h5>
                        <p class="date text-muted">
                            <?php echo date( 'M d, y h:i a', strtotime($recent["created_on"]) ); ?>
                        </p>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <div class="p-3">
        <h4 class="text-muted">Archives</h4>
        <ol class="list-unstyled mb-0">
            <?php foreach ($archives as $archive) : ?>
                <li><a href="/archives/<?php echo (\DateTime::createFromFormat('Y-m-d', $archive["date"]))->format('m-d-Y'); ?>">
                        <?php echo date( 'F d, Y', strtotime($archive["date"]) ); ?>
                        ( <?php echo $archive["count"]; ?> )</a>
                </li>
            <?php endforeach; ?>
        </ol>
    </div>

    <div class="p-3">
        <h4 >Visit Us</h4>
        <ol class="list-unstyled">
            <li><a href="https://github.com/bricedjilo/commentMe"><i class="fab fa-github fa-2x"></i></a>
                <a href="https://github.com/bricedjilo/commentMe"><i class="fas fa-globe fa-2x"></i></a>
            </li>
        </ol>
    </div>
</aside>
