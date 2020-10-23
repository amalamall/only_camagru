<nav class="navbar" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
    <a class="navbar-item" href="<?php echo URLROOT; ?>">
      <strong><?php echo SITENAME; ?></strong>
    </a>

    <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>

  <div id="navbarBasicExample" class="navbar-menu ">
    <div class="navbar-start">
      <a href="<?php echo URLROOT; ?>" class="navbar-item">
        Home
      </a>
      <div class="buttons">
        <a href="<?php echo URLROOT; ?>/posts/mygalery" class="button is-info">Gallery</a>
      </div>
    </div>

    <div class="navbar-end">
      <?php if (isset($_SESSION['user_id'])) : ?>
        <div class="navbar-item">
          <div class="buttons">
            <a href="<?php echo URLROOT; ?>/users/editprofile" class="button is-light">Edit Profile</a>
            <a href="<?php echo URLROOT; ?>/users/changepassword" class="button is-light">Change password</a>
            <a href="<?php echo URLROOT; ?>/posts/studio" class="button is-light">Take a Picture</a>
            <a href="<?php echo URLROOT; ?>/posts/upload" class="button is-light">Upload Picture</a>
            <a href="<?php echo URLROOT; ?>/users/logout" class="button is-primary">
              <strong>Logout</strong>
            </a>
          </div>
        </div>
      <?php else : ?>
        <div class="navbar-item">
          <div class="buttons">
            <a href="<?php echo URLROOT; ?>/authentification/register" class="button is-primary">
              <strong>Register</strong>
            </a>
            <a href="<?php echo URLROOT; ?>/authentification/login" class="button is-light">
              Login
            </a>
          </div>
        </div>
      <?php endif; ?>

    </div>

  </div>
  
</nav>