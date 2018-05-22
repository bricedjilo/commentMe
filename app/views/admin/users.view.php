
<?php require('app/views/partials/head.php'); ?>

<div class="fixed-nav sticky-footer bg-dark" id="page-top">

    <?php require('app/views/partials/admin/admin-nav.php'); ?>

    <div class="content-wrapper mt-5">
        <div class="container-fluid mt-4">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb mb-5">
                <li class="breadcrumb-item">
                    <a href="/admin/users">Users</a>
                </li>
                <li class="breadcrumb-item active">Show Users</li>
            </ol>

            <div class="table-responsive mb-5" >
                <table class="table mb-5" >
                    <thead>
                        <tr>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Email</th>
                            <th scope="col" class="d-none d-md-block">Registered</th>
                            <th scope="col" >Role</th>
                            <th scope="col" class="d-none d-lg-block">Active</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($users as $user) : ?>
                        <tr>
                            <th scope="row"><?php echo $user->getFirstName(); ?></th>
                            <td ><?php echo $user->getLastName(); ?></td>
                            <td class="wrap"><?php echo $user->getEmail(); ?></td>
                            <td class="d-none d-md-block"><?php echo $user->getRegComplete(); ?></td>
                            <td ><?php echo $user->getRole(); ?></td>
                            <td class="d-none d-lg-block"><?php echo $user->getActive(); ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <?php require('app/views/partials/logout-modal.php'); ?>
        </div>
    </div>
</div>

<?php require('app/views/partials/admin/admin-footer.php'); ?>
