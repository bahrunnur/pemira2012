<?php echo form_open('login', array('class' => 'form-signin')); ?>
    <h2 class="form-signin-heading">Masukkan NIU</h2>
    <input type="text" name="niu" class="input-block-level" placeholder="316693">
    <input type="submit" value="Masuk" name="login" class="btn btn-large btn-primary">
<?php echo form_close(); ?>