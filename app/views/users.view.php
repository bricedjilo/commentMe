
    <?php require('partials/head.php'); ?>
    <?php require('partials/nav.php'); ?>

    <h1>All Users</h1>
    <ul>
        <?php foreach($users as $user) : ?>
        <li>
            <?php echo $user->name ?>
        </li>
        <?php endforeach; ?>
    </ul>

    <h1>Submit your name</h1>

    <form class="" action="" method="POST">
        <input type="text" name="name" />
        <button type="submit" name="submit">Submit</button>
    </form>

    <?php require('partials/footer.php'); ?>
