<?php echo form_open('admin', array('class' => 'form-signin')); ?>
    <h2 class="form-signin-heading">Login Admin</h2>
    <input type="text" name="nama" class="input-block-level" placeholder="Username">
    <input type="password" name="pass" class="input-block-level" placeholder="Password">
    <input type="hidden" name="access" value="admin">
    <input type="submit" value="Masuk" name="login" class="btn btn-large btn-primary">
<?php echo form_close(); ?>