<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <!-- left column -->
      <div class="col-sm-12">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <i class="fa fa-user" style="color:#304FFE;" ></i>
            <h1 class="box-title" style="align:center;"> User Detail</h1>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
              <?php foreach ($user_data as $user_data) {
               ?>
            <div class="col-sm-12">
              <img class="img" src="/assets/photo/<?php echo $user_data->thumbnail ?>" style="padding:0 20%;">
            </div>
            <div class="col-sm-12">
              <div class="box-title with-border">Users data</div>
              <div class="form-group">
                <label class="col-sm-6 control-label" style="text-align: left;">ID</label>
                <div class="col-sm-6">
                  <label class="control-label"><?php echo $user_data->id ?></label>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-6 control-label" style="text-align: left;">Nama lengkap</label>
                <div class="col-sm-6">
                  <label><?php echo $user_data->name_full ?></label>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-6 control-label" style="text-align: left;">Email</label>
                <div class="col-sm-6">
                  <label><?php echo $user_data->email ?></label>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-6 control-label" style="text-align: left;">No KTP</label>
                <div class="col-sm-6">
                  <label><?php echo $user_data->ktp_no ?></label>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-6 control-label" style="text-align: left;">Alamat</label>
                <div class="col-sm-6">
                  <label><?php echo $user_data->alamat ?></label>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-6 control-label" style="text-align: left;">Telepon Primer</label>
                <div class="col-sm-6">
                  <label><?php echo $user_data->telepon_primer ?></label>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-6 control-label" style="text-align: left;">Telepon Sekunder</label>
                <div class="col-sm-6">
                  <label><?php echo ($user_data->telepon_sekunder === null ? "-" : $user_data->telepon_sekunder) ?></label>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-6 control-label" style="text-align: left;">PIN BB</label>
                <div class="col-sm-6">
                  <label><?php echo ($user_data->telepon_pin === null ? "-" : $user_data->telepon_pin) ?></label>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-6 control-label" style="text-align: left;">WhatsApp</label>
                <div class="col-sm-6">
                  <label><?php echo ($user_data->telepon_whatsapp === null ? "-" : $user_data->telepon_whatsapp) ?></label>
                </div>
              </div>
            </div>
            <div class="col-sm-12">
              <div class="form-group">
                <label class="col-sm-6 control-label" style="text-align: left;">No rekening</label>
                <div class="col-sm-6">
                  <label><?php echo $user_data->rekening_no ?></label>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-6 control-label" style="text-align: left;">Bank</label>
                <div class="col-sm-6">
                  <label><?php echo $user_data->rekening_bank ?></label>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-6 control-label" style="text-align: left;">Agama</label>
                <div class="col-sm-6">
                  <label><?php echo $user_data->agama ?></label>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-6 control-label" style="text-align: left;">NO NPWP</label>
                <div class="col-sm-6">
                  <label><?php echo ($user_data->npwp_no === null ? "-" : $user_data->npwp_no) ?></label>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-6 control-label" style="text-align: left;">Status</label>
                <div class="col-sm-6">
                  <label><?php echo ($user_data->status === 'tidak_kawin' ? 'Tidak / Belum Kawin' : $user_data->status) ?></label>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-6 control-label" style="text-align: left;">Anak</label>
                <div class="col-sm-6">
                  <label><?php echo $user_data->anak ?></label>
                </div>  
              </div>
              <div class="form-group">
                <label class="col-sm-6 control-label" style="text-align: left;">Photo</label>
                <div class="col-sm-6">
                  <label><?php echo 'null';?></label>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-6 control-label" style="text-align: left;">Jabatan</label>
                <div class="col-sm-6">
                  <label class="control-label"><?php echo $user_data->jabatan ?></label>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-6 control-label" style="text-align: left;">Tanggal gabung</label>
                <div class="col-sm-6">
                  <label class="control-label"><?php echo mdate('%d %F %Y', time($user_data->created_at)) ?></label>
                </div>
              </div>
            </div>
          </div>
          <?php } ?>
          <!-- /.box-body -->
          <div class="box-footer">
            <div class="col-sm-6">
              <a href="/users/edit/<?php echo $user_data->email ?>"><button type="button" class="btn btn-success pull-right">Edit User Data</button></a>
            </div>
            <div class="col-sm-6">
              <a href="/users/"><button class="btn btn-default">Cancel</button></a>
            </div>
          </div>
        </div>
        <!-- /.box -->
      </div>
      <!--/.col (left) -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>