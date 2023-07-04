<?php
  include 'partials/header.php';

  $current_admin_id = $_SESSION['user-id'];
  $query = "SELECT * FROM users WHERE NOT id=$current_admin_id";
  $users = mysqli_query($connection, $query);
?>


<section class="dashboard">
    <?php if(isset($_SESSION['add-user-success'])) : ?>
    <div class="alert_message success container">
        <p>
          <?= $_SESSION['add-user-success'];
          unset($_SESSION['add-user-success']); ?>
        </p>
    </div>
    <?php elseif(isset($_SESSION['edit-user-success'])) : ?>
    <div class="alert_message success container">
        <p>
          <?= $_SESSION['edit-user-success'];
          unset($_SESSION['edit-user-success']); ?>
        </p>
        </div>
    <?php elseif(isset($_SESSION['edit-user'])) : ?>
    <div class="alert_message error container">
        <p>
          <?= $_SESSION['edit-user'];
          unset($_SESSION['edit-user']); ?>
        </p>
        </div>
    <?php elseif(isset($_SESSION['delete-user'])) : ?>
    <div class="alert_message error container">
        <p>
          <?= $_SESSION['delete-user'];
          unset($_SESSION['delete-user']); ?>
        </p>
    <?php elseif(isset($_SESSION['delete-user-success'])) : ?>
    <div class="alert_message error container">
        <p>
          <?= $_SESSION['delete-user-success'];
          unset($_SESSION['delete-user-success']); ?>
        </p>
        </div>
    <?php endif ?>

    <div class="container dashboard_container">
        <button id="show_sidebar_btn" class="sidebar_toggle"><i class="uil uil-angle-right-b"></i></button>
        <button id="hide_sidebar_btn" class="sidebar_toggle"><i class="uil uil-angle-left-b"></i></button>

        <aside>
            <ul>
                <li><a href="addPost.php"><i class="uil uil-pen"></i><h5>Add Post</h5></a></li>
                <li><a href="index.php"><i class="uil uil-postcard"></i><h5>Manage Posts</h5></a></li>
                <li><a href="addUser.php"><i class="uil uil-user-plus"></i><h5>Add User</h5></a></li>
                <li><a href="manageUser.php" class="active"><i class="uil uil-users-alt"></i><h5>Manage Users</h5></a></li>
                <li><a href="addCategory.php"><i class="uil uil-edit"></i><h5>Add Category</h5></a></li>
                <li><a href="manageCategory.php" ><i class="uil uil-list-ul"></i><h5>Manage Category</h5></a></li>
            </ul>
        </aside>
        <main>
            <h2>Manage Users</h2>
            <?php if(mysqli_num_rows($users)>0) : ?>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Edit</th>
                        <th>Delete</th>
                        <th>Admin</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($user = mysqli_fetch_assoc($users)) : ?>
                    <tr>
                        <td><?= "{$user['firstname']} {$user['lastname']}" ?></td>
                        <td><?= $user['username'] ?></td>
                        <td><a href="<?= ROOT_URL ?>admin/editUser.php?id=<?= $user['id'] ?>" class="btn sm">Edit</a></td>
                        <td><a href="<?= ROOT_URL ?>admin/deleteUser.php?id=<?= $user['id'] ?>" class="btn sm danger">Delete</a></td>
                        <td><?= $user['is_admin'] ? 'Yes' : 'No' ?></td>
                    </tr>
                    <?php endwhile ?> 
                </tbody>
            </table>
            <?php else :?>
                <div class="alert_message error"><?= "No User Found" ?></div>
             <?php endif ?>
        </main>
    </div>
</section>

<?php
  include '../partials/footer.php'
?>