
<header >
    <nav class="navbar navbar-expand-md navbar-dark fixed-top main-navbar">
        <a class="navbar-brand" href="/#">Comment Me</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto" id="navigation">

                <?php if ( ! $user ) : ?>
                <li class="nav-item">
                    <a class="nav-link" href="/#shop-me">Shop</a>
                </li>
                <?php endif; ?>
                <li class="nav-item">
                    <a class="nav-link" href=<?php if ($user) echo "/comments"; else echo "/#new-arrivals";?>>
                        New Products <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/comments">
                        Comments <span class="sr-only">(current)</span>
                    </a>
                </li>
                <?php if (isAdmin()) : ?>
                <li class="nav-item">
                    <a class="nav-link btn btn-info btn-sm text-white" href="/admin">
                        Admin <span class="sr-only">(current)</span>
                    </a>
                </li>
                <?php endif; ?>
            </ul>
            <ul class="navbar-nav ml-auto">
                <?php if($user) : ?>
                    <li class="nav-item">
                        <a class="nav-link" id="user" href="/#top">
                            Welcome <strong><?php echo "{$user->getFirstName()} {$user->getLastName()}"; ?></strong>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="" data-toggle="modal" data-target="#logout-modal">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>
                    </li>
                <?php else : ?>
                    <li class="nav-item">
                        <a class="nav-link" id="signin" href="/#login"><strong>Sign in</strong></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/register"><strong>Sign up</strong></a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>
</header>

<main role="main" id="top">
