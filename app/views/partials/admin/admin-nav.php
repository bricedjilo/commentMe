
<nav class="navbar navbar-expand-lg navbar-dark fixed-top main-navbar" id="mainNav">
    <a class="navbar-brand" href="">Comment Me</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
        data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse main-navbar" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav main-navbar" id="admin-accordion">
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                <a class="nav-link" href="/admin">
                    <i class="fas fa-tachometer-alt"></i>
                    <span class="nav-link-text">Dashboard</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Users">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse"
                    href="#collapseUsers" data-parent="#admin-accordion">
                    <i class="fas fa-users-cog"></i>
                    <span class="nav-link-text">Users</span>
                </a>
                <ul class="sidenav-second-level collapse" id="collapseUsers">
                    <li><a href="/admin/users">Show Users</a></li>
                </ul>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Products">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse"
                    href="#collapseProducts" data-parent="#admin-accordion">
                    <i class="fas fa-shopping-bag"></i>
                    <span class="nav-link-text">Products</span>
                </a>
                <ul class="sidenav-second-level collapse" id="collapseProducts">
                    <li><a href="/admin/products">Show Products</a></li>
                    <li><a href="/admin/products/create">Add Products</a></li>
                </ul>
            </li>
        </ul>
        <ul class="navbar-nav sidenav-toggler main-navbar">
            <li class="nav-item">
                <a class="nav-link text-center" id="sidenavToggler">
                    <i class="fas fa-angle-left"></i>
                </a>
            </li>
        </ul>
        <ul class="navbar-nav">
            <li class="nav-item">
                <h4 class="admin-title">Admin</h4>
            </li>
        </ul>
        <?php if(isset($session) ) : ?>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" data-toggle="modal" data-target="#logout-modal">
                    Welcome <?php echo $session->get("firstname") . " " . $session->get("lastname"); ?>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="modal" data-target="#logout-modal">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </li>
        </ul>
    <?php endif; ?>
    </div>
</nav>
<?php require('app/views/partials/logout-modal.php'); ?>
