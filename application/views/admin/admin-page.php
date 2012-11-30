<div class="container">
    <div class="row">
        <h2 class="span12">Administrator Menu</h2>
        <div class="span12">
            <ul class="nav nav-tabs" id="myTab">
                <li class="active"><a href="#regis" data-toggle="tab">Registrasi Pemilih</a></li>
                <li><a href="#kepo" data-toggle="tab">Yang udah Milih</a></li>
                <li><a href="<?php echo site_url('logout') ?>">Logout</a></li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade active in" id="regis">
                    <?php echo form_open('inex_garing/regis', array('class' => 'form-inline')); ?>
                    <div style="max-width: 200px;">
                        <input type="text" name="niu" class="input-block-level" placeholder="NIU">
                    </div>
                    <p></p>
                    <input type="submit" value="Regis" class="btn btn-primary">
                    <?php echo form_close(); ?>
                </div>
                <div class="tab-pane fade" id="kepo">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>NIU</th>
                                <th>Nama Pemilih</th>
                                <th>Angkatan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($yg_udah as $key => $list): ?>
                            <tr>
                                <td><?php echo $list['niu']; ?></td>
                                <td><?php echo ucwords(strtolower($list['nama'])); ?></td>
                                <td><?php echo $list['angkatan']; ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>