<?php require 'app/views/partials/head.php'; ?>

<section class="my-0 mx-0">
    <div class="text-center form-section py-3 px-5">

        <form action="/register" method="post">
            <a href="/#top"><h1 class="h3 mb-3 brand-register">Comment Me</h1></a>

            <div class="form-fields">
                <h1 class="h3 mb-4 font-weight-normal text-muted">Create an account</h1>

                <?php require('app/views/partials/errors.php'); ?>

                <div class="row align-items-center justify-content-center">
                    <div class="col-sm-12 col-md-8 col-lg-6">

                        <div class="form-row align-items-center justify-content-center">
                            <div class="form-group col-sm-8 col-md-12">
                                <label for="firstname" class="sr-only">Fisrt Name</label>
                                <input type="text" class="form-control" name="firstname" id="firstname"
                                placeholder="Fisrt Name" required>
                            </div>
                            <div class="form-group col-sm-8 col-md-12">
                                <label for="lastname" class="sr-only">Last Name</label>
                                <input type="text" class="form-control" name="lastname" id="lastname"
                                placeholder="Last Name" required>
                            </div>
                        </div>

                        <div class="form-row align-items-center justify-content-center">
                            <div class="form-group col-sm-8 col-md-6">
                                <label for="username" class="sr-only">Username</label>
                                <input type="text" class="form-control" id="username" name="username"
                                placeholder="Username" required>
                            </div>
                            <div class="form-group col-sm-8 col-md-6">
                                <label for="email" class="sr-only">Email</label>
                                <input type="email" class="form-control" name="email" id="email"
                                placeholder="Email" required>
                            </div>
                        </div>

                        <div class="form-row align-items-center justify-content-center">
                            <div class="form-group col-sm-8 col-md-6">
                                <label for="password" class="sr-only">Password</label>
                                <input type="password" class="form-control" name="password" id="password"
                                placeholder="Password" required>
                            </div>
                            <div class="form-group col-sm-8 col-md-6">
                                <label for="password" class="sr-only">Confirm Password</label>
                                <input type="password" class="form-control" id="conf-password" name="conf-password"
                                placeholder="Confirm Password" required>
                            </div>
                        </div>

                        <div class="form-row align-items-center justify-content-center" style="margin: 0 auto; padding: 0px;">
                            <div class="form-group align-items-center justify-content-center my-4 mx-0 py-0 px-0 ">

                                <!-- Uncomment the below line when working on localhost -->
                                <!-- <div class="g-recaptcha" data-theme="light" data-sitekey= -->
                                    <?= //$localhost_client; ?>>
                                <!-- </div> -->

                                <!-- The below line is to be commented when working on localhost and uncommented if the site has been deployed -->
                                <!-- The "data-sitekey" below is domain dependent. A new key should be obtained for the corresponding domain  -->

                                <div class="g-recaptcha" data-theme="light"
                                    <!-- data-sitekey=<?= $heroku_client; ?>> -->
                                </div>

                            </div>
                        </div>
                        <div class="form-row align-items-center justify-content-center">
                            <div class="form-group col-sm-8">
                                <button class="btn btn-lg btn-info btn-block align-items-center justify-content-center"
                                name="submit" type="submit">Register</button>
                            </div>
                            <div class="form-group col-sm-8">
                                <a href="/" class="btn btn-lg btn-light btn-block" name="cancel">Cancel</a>
                            </div>
                        </div>

                    </div>
                </div><br>
                <p>Already have an account? <a href="/#login"> Sign in </a></p>
            </div>
        </form>
    </div>

    </section>

    <?php require('app/views/partials/footer.php'); ?>
