
<?php require('app/views/partials/head.php'); ?>

<main class="fizzbuzz mb-0">
    <div class="mx-0 pt-5" >
        <div class="text-center pt-5 px-5">
            <h1 class="text-muted mb-5">Fizz Buzz Game</h1>

            <div class="row justify-content-center mb-5">
                <p class="col-md-6 mb-3">
                    To play, enter a desired range of non zero integer/natural numbers. <br />
                    The Upper bound must be greater than the lower bound.
                    &nbsp; For example enter <span class="text-info font-weight-bold">1</span> in the
                    <code>Lower bound</code> field and <span class="text-info font-weight-bold">100</span> in the
                    <code>Upper bound</code> one."
                </p>

            </div>

            <div class="row justify-content-center">
                <div class="col-md-6 mb-3">
                    <?php require('app/views/partials/errors.php'); ?>
                </div>
            </div>

            <div class="row justify-content-center ">

                <form action="/fizzbuzz" method="post" class="">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <input type="number" class="form-control" name="lower" id="lower"
                            placeholder="Lower bound" required>
                        </div>
                        <div class="form-group col-md-4">
                            <input type="number" class="form-control" id="upper" name="upper"
                            placeholder="Upper bound" required>
                        </div>
                        <div class="form-group col-md-4">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <button type="submit" class="btn btn-info btn-block text-uppercase">
                                        Play
                                    </button>
                                </div>
                                <div class="col-md-6">
                                    <a href="/fizzbuzz" class="btn btn-block text-uppercase btn-outline-dark">
                                        Reset
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="row justify-content-center mt-5">

                <?php if ( $results ) : ?>
                <table class="table col-md-6">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th >Results</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i = 0;
                            $lower = $_POST['lower'];
                        ?>
                        <?php  foreach ($results as $result) : ?>
                        <tr>
                            <th scope="row"><?= $lower + $i++; ?></th>
                            <td><?= $result; ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?php endif; ?>
            </div>

            <p class="mt-5">Return to <a href="/"><span class="brand-footer">Comment Me</span></a></p>

        </div>

    </div>
</main>
</body>
</html>
