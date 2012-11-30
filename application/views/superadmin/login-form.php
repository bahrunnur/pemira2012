<?php echo form_open('superadmin', array('class' => 'form-signin')); ?>
    <h2 class="form-signin-heading">Login Super Admin</h2>
    <input type="text" name="nama" class="input-block-level" placeholder="Username">
    <input type="password" name="pass" class="input-block-level" placeholder="Password">
    <input type="hidden" name="access" value="superadmin">
    <input type="submit" value="Masuk" name="login" class="btn btn-large btn-primary">
<?php echo form_close(); ?>