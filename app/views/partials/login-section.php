
<section class="container" >
    <div class="row section text-center form-section py-5 px-5">
        <form class="form-signin" action="/login" method="post">

            <?php require('app/views/partials/errors.php'); ?>

            <div>
                <h1 class="h3 mb-3 text-muted">Sign In</h1>
                <div class="form-group">
                    <label for="email" class="sr-only">Email address</label>
                    <input type="email" id="email" name="email" class="form-control" placeholder="Email address"
                        required autofocus>
                </div>
                <div class="form-group">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
                </div>
                <div class="form-group">
                    <button class="btn btn-lg btn-primary btn-block" name="submit" type="submit">Sign in</button>
                </div>
                <div class="form-group">
                    <p>Don't have an account? <a href="/register">Please register</a>.</p>
                    <span>Forgot your password? <a href="/register">Click here</a>.</span>
                </div>
            </div>
        </form>
    </div>
</section>
