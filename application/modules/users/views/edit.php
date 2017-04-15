<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-sm-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <i class="fa fa-user" style="color:#304FFE;" ></i>
            <h1 class="box-title" style="align:center;"> New User</h1>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <?php foreach ($user_data as $user_datas) {?>
          <form class="form-horizontal" method="post" id='#add' action="/users/edit/<?php echo $user_datas->id ?>" enctype="multipart/form-data">
            <div class="box-body">
              <div class="col-sm-6">
                <div class="form-group">
                  <label class="col-sm-3 control-label" style="text-align: left;">ID</label>
                  <div class="col-sm-9">
                    <label class="control-label"><?php echo $user_datas->id; ?></label>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label" style="text-align: left;">Nama lengkap</label>
                  <div class="col-sm-9">
                    <input name="nama" type="text" class="form-control" value="<?php echo $user_datas->name_full ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label" style="text-align: left;">Email</label>
                  <div class="col-sm-9">
                    <input name="email" type="email" class="form-control" value="<?php echo $user_datas->email ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label" style="text-align: left;">No KTP</label>
                  <div class="col-sm-9">
                    <input name="ktp_no" type="number" class="form-control" value="<?php echo $user_datas->ktp_no ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label" style="text-align: left;">Scan KTP</label>
                  <div class="col-sm-9">
                    <input name="ktp_img" type="file" class="form-control" value="<?php echo $user_datas->ktp_img ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label" style="text-align: left;">Alamat</label>
                  <div class="col-sm-9">
                    <input name="alamat" type="text" class="form-control" value="<?php echo $user_datas->alamat ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label" style="text-align: left;">Telepon Primer</label>
                  <div class="col-sm-9">
                    <input name="telepon_primer" type="number" class="form-control" value="<?php echo $user_datas->telepon_primer ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label" style="text-align: left;">Telepon Sekunder</label>
                  <div class="col-sm-9">
                    <input name="telepon_sekunder" type="number" class="form-control" value="<?php echo $user_datas->telepon_sekunder ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label" style="text-align: left;">PIN BB</label>
                  <div class="col-sm-9">
                    <input name="telepon_pin" type="text" class="form-control" value="<?php echo $user_datas->telepon_pin ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label" style="text-align: left;">WhatsApp</label>
                  <div class="col-sm-9">
                    <input name="telpon_whatsapp" type="number" class="form-control" value="<?php echo $user_datas->telepon_whatsapp ?>">
                  </div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label class="col-sm-3 control-label" style="text-align: left;">No rekening</label>
                  <div class="col-sm-9">
                    <input name="rekening_no" type="text" class="form-control" value="<?php echo $user_datas->rekening_no?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label" style="text-align: left;">Bank</label>
                  <div class="col-sm-9">
                    <select name="rekening_bank" class="form-control"><?php echo $user_datas->rekening_bank ?>
                      <option>BRI</option>
                      <option>BNI</option>
                      <option>BCA</option>
                      <option>Mandiri</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label" style="text-align: left;">Agama</label>
                  <div class="col-sm-9">
                    <input name="agama" type="text" class="form-control" value="<?php echo $user_datas->agama ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label" style="text-align: left;">NO NPWP</label>
                  <div class="col-sm-9">
                    <input name="npwp_no" type="text" class="form-control" value="<?php echo $user_datas->npwp_no ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label" style="text-align: left;">Scan NPWP</label>
                  <div class="col-sm-9">
                    <input name="npwp_img" type="file" class="form-control" value="<?php echo $user_datas->npwp_img ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label" style="text-align: left;">Status</label>
                  <div class="col-sm-9">
                    <div class="radio">
                      <label style="padding-right:12px;padding-left=8px;font-weight:bold;">
                        <input name="status" type="radio" value="kawin" <?php echo ($user_datas->status === 'kawin' ? 'checked' : '')?>> Kawin
                      </label>
                      <label style="padding-right:12px;padding-left=8px;font-weight:bold;">
                        <input name="status" type="radio" value="tidak_kawin" <?php echo ($user_datas->status === 'tidak_kawin' ? 'checked' : '')?>> Tidak / Belum Kawin
                      </label>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label" style="text-align: left;">Anak</label>
                  <div class="col-sm-9">
                    <div class="radio">
                      <label style="padding-right:12px;padding-left=8px;font-weight:bold;"><input name="anak" type="radio" value="1" <?php echo ($user_datas->anak === '1' ? 'checked' : '')?>> 1</label>
                      <label style="padding-right:12px;padding-left=8px;font-weight:bold;"><input name="anak" type="radio" value="2" <?php echo ($user_datas->anak === '2' ? 'checked' : '')?>> 2</label>
                      <label style="padding-right:12px;padding-left=8px;font-weight:bold;"><input name="anak" type="radio" value="3" <?php echo ($user_datas->anak === '3' ? 'checked' : '')?>> 3</label>
                      <label style="padding-right:12px;padding-left=8px;font-weight:bold;"><input name="anak" type="radio" value="4" <?php echo ($user_datas->anak === '4' ? 'checked' : '')?>> 4</label>
                      <label style="padding-right:12px;padding-left=8px;font-weight:bold;"><input name="anak" type="radio" value="5" <?php echo ($user_datas->anak === '5' ? 'checked' : '')?>> 5</label>
                      <label style="padding-right:12px;padding-left=8px;font-weight:bold;"><input name="anak" type="radio" value=">5"<?php echo ($user_datas->anak === '>5' ? 'checked' : '')?>> > 5 </label>
                    </div>
                  </div>  
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label" style="text-align: left;">Photo</label>
                  <div class="col-sm-9">
                    <input name="photo" type="file" class="form-control" value="<?php echo $user_datas->photo ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label" style="text-align: left;">Jabatan</label>
                  <div class="col-sm-9">
                    <select name="jabatan" class="form-control"><?php echo $user_datas->jabatan?>
                      <option>Admin</option>
                      <option>Logistik</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label" style="text-align: left;">Tanggal gabung</label>
                  <div class="col-sm-3">
                    <label class="control-label" style="text-align: left;"><?php echo mdate('%d %F %Y', time($user_datas->created_at)) ?></label>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <div class="col-sm-6">
                <button type="submit" class="btn btn-success pull-right">Save</button>
              </div>
              <div class="col-sm-6">
                <a href="/users/read/<?php echo $user_datas->email ?>"><button class="btn btn-default">Cancel</button></a>
              </div>
              <!-- /.box-footer -->
            </div>
          </form>
          <?php } ?>
          <!-- /.box -->
        </div>
      </div>
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>