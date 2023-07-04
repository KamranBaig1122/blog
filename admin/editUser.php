<?php
  include 'partials/header.php';

  if(isset($_GET['id'])){
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT * FROM users WHERE id=$id";
    $result = mysqli_query($connection, $query);
    $user = mysqli_fetch_assoc($result);
  }else{
    header('location: ' . ROOT_URL . 'admin/manageUser.php');
    die();
  }

?>

<section class="form_section" style="margin-top: 4rem;">
    <div class="container form_section_container">
        <h2>Edit User</h2>
        <!-- <div class="alert_message error">
            <p>This is an Error Message</p>
        </div> -->
        <form action="<?= ROOT_URL ?>admin/editUserLogic.php" method="post">
            <input type="hidden" value="<?= $user['id'] ?>" name="id">
            <input type="text" value="<?= $user['firstname'] ?>" name="firstname" placeholder="First Name">
            <input type="text" value="<?= $user['lastname'] ?>" name="lastname" placeholder="Last Name">
            <select name="userrole">
                <option value="0">Author</option>
                <option value="1">Admin</option>
            </select>
            <button type="submit" name="submit" class="btn">Update User</button>
        </form>
    </div>
</section>


<?php
  include '../partials/footer.php'
?>