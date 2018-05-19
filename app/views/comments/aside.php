
<aside class="col-12 col-md-4">
    <div class="p-3 mb-3 bg-light rounded">
        <h4 class="text-muted font-weight-bold"><?php echo $recentProducts[0]->getName(); ?></h4>
        <p class="mb-0"><?php echo substr($recentProducts[0]->getDescription(), 0, 100) . " ..."; ?>
        </p>
    </div>
    <div class="p-3">
        <h4 class="text-muted">Categories</h4>
        <ol class="list-unstyled mb-0">
            <?php foreach ($categories as $category) : ?>
                <li><a href="#"><?php echo $category->getCategory(); ?></a></li>
            <?php endforeach; ?>
        </ol>
    </div>

    <div class="p-3">
        <h4 class="text-muted">Recent Posts</h4>
        <ul class="list-unstyled mt-4">
            <?php foreach($recentProducts as $recent) : ?>
                <li class="media mb-3">
                    <img class="mr-3 recent-post"
                    src=<?php echo "/public/images/products/" . $recent->getImage(); ?>
                    class="img-fluid" alt="Recently added product">
                    <div class="media-body media-title">
                        <h5 class="mt-0 mb-1 text-sm-left"><a href="#"><?php echo $recent->getName(); ?></a></h5>
                        <p class="date text-muted">
                            <?php echo date( 'M d, y h:i a', strtotime($recent->getCreatedOn()) ); ?>
                        </p>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <div class="p-3">
        <h4 class="text-muted">Archives</h4>
        <ol class="list-unstyled mb-0">
            <li><a href="#">March 2014</a></li>
            <li><a href="#">February 2014</a></li>
            <li><a href="#">January 2014</a></li>
            <li><a href="#">December 2013</a></li>
            <li><a href="#">November 2013</a></li>
            <li><a href="#">October 2013</a></li>
            <li><a href="#">September 2013</a></li>
            <li><a href="#">August 2013</a></li>
            <li><a href="#">July 2013</a></li>
            <li><a href="#">June 2013</a></li>
            <li><a href="#">May 2013</a></li>
            <li><a href="#">April 2013</a></li>
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
