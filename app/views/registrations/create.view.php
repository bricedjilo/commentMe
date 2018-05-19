<?php require 'app/views/partials/head.php'; ?>

<section class="section-register my-0 mx-0">
    <div class="text-center form-section py-3 px-5 section-register">

        <form class="form-register" action="/register" method="post">
            <a href="/#top"><h1 class="h3 mb-3 brand-register">Comment Me</h1></a>

            <div class="form-fields">
                <h1 class="h3 mb-3 font-weight-normal text-muted">Create an account</h1>

                <?php require('app/views/partials/errors.php'); ?>

                <div class="row align-items-center justify-content-center">
                    <div class="col-xs-12 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="firstName" class="sr-only">First Name</label>
                            <input type="text" id="firstname" name="firstname" class="form-control"
                            placeholder="First name" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="lastName" class="sr-only">Email address</label>
                            <input type="text" id="lastname" name="lastname" class="form-control"
                                placeholder="Last name" required>
                        </div>
                        <div class="form-group">
                            <label for="email" class="sr-only">Email address</label>
                            <input type="email" id="email" name="email" class="form-control"
                                placeholder="Email address" required>
                        </div>
                        <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" id="password" name="password" class="form-control"
                                placeholder="Password" required>
                        </div>
                        <div class="form-group">
                            <label for="password" class="sr-only">Confirm Password</label>
                            <input type="password" id="conf-password" name="conf-password" class="form-control"
                                placeholder="Confirm Password" required>
                        </div>
                        <div class="form-group align-items-center justify-content-center">
                            <div class="g-recaptcha" data-theme="light" data-sitekey="6LedT1kUAAAAABOZpXtq9dG4ir_hsso8VK1J7d4A"></div>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-lg btn-info btn-block" name="submit"
                                type="submit">Register</button>
                        </div>
                        <div class="form-group">
                            <a href="/" class="btn btn-lg btn-light btn-block" name="cancel">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>

<?php require('app/views/partials/footer.php'); ?>
