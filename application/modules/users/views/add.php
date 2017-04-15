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
              <h1 class="box-title" style="align:center;"> New User</h1>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="post" action="/users/add" enctype="multipart/form-data">
              <div class="box-body">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label class="col-sm-3 control-label" style="text-align: left;">No</label>
                    <div class="col-sm-9">
                      <label class="control-label"><?php echo substr($id, 2); ?></label>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" style="text-align: left;">Nama lengkap</label>
                    <div class="col-sm-9">
                      <input name="nama" type="text" class="form-control" placeholder="Nama lengkap" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" style="text-align: left;">Email</label>
                    <div class="col-sm-9">
                      <input name="email" type="email" class="form-control" placeholder="Email" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" style="text-align: left;">Password</label>
                    <div class="col-sm-9">
                      <input name="password" type="text" class="form-control" placeholder="Password" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" style="text-align: left;">No KTP</label>
                    <div class="col-sm-9">
                      <input name="ktp_no" type="number" class="form-control" placeholder="No KTP" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" style="text-align: left;">Scan KTP</label>
                    <div class="col-sm-9">
                      <input name="ktp_img" type="file" class="form-control" placeholder="Scan KTP" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" style="text-align: left;">Alamat</label>
                    <div class="col-sm-9">
                      <input name="alamat" type="text" class="form-control" placeholder="Alamat" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" style="text-align: left;">Telepon Primer</label>
                    <div class="col-sm-9">
                      <input name="telepon_primer" type="number" class="form-control" placeholder="NO HP 1" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" style="text-align: left;">Telepon Sekunder</label>
                    <div class="col-sm-9">
                      <input name="telepon_sekunder" type="number" class="form-control" placeholder="NO HP 2">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" style="text-align: left;">PIN BB</label>
                    <div class="col-sm-9">
                      <input name="telepon_pin" type="text" class="form-control" placeholder="PIN BB">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" style="text-align: left;">WhatsApp</label>
                    <div class="col-sm-9">
                      <input name="telpon_whatsapp" type="number" class="form-control" placeholder="No WhatsApp">
                    </div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label class="col-sm-3 control-label" style="text-align: left;">No rekening</label>
                    <div class="col-sm-9">
                      <input name="rekening_no" type="text" class="form-control" placeholder="No rekening" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" style="text-align: left;">Bank</label>
                    <div class="col-sm-9">
                      <select name="rekening_bank" class="form-control" placeholder="Bank">
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
                      <input name="agama" type="text" class="form-control" placeholder="Agama" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" style="text-align: left;">NO NPWP</label>
                    <div class="col-sm-9">
                      <input name="npwp_no" type="text" class="form-control" placeholder="NO NPWP">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" style="text-align: left;">Scan NPWP</label>
                    <div class="col-sm-9">
                      <input name="npwp_img" type="file" class="form-control" placeholder="Scan NPWP">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" style="text-align: left;">Status</label>
                    <div class="col-sm-9">
                      <div class="radio">
                        <label style="padding-right:12px;padding-left=8px;font-weight:bold;"><input name="status" type="radio" value="kawin" required> Kawin</label>
                        <label style="padding-right:12px;padding-left=8px;font-weight:bold;"><input name="status" type="radio" value="tidak_kawin" required> Tidak / Belum Kawin</label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" style="text-align: left;">Anak</label>
                    <div class="col-sm-9">
                      <div class="radio">
                        <label style="padding-right:12px;padding-left=8px;font-weight:bold;"><input name="anak" type="radio" value="1" required> 1</label>
                        <label style="padding-right:12px;padding-left=8px;font-weight:bold;"><input name="anak" type="radio" value="2" required> 2</label>
                        <label style="padding-right:12px;padding-left=8px;font-weight:bold;"><input name="anak" type="radio" value="3" required> 3</label>
                        <label style="padding-right:12px;padding-left=8px;font-weight:bold;"><input name="anak" type="radio" value="4" required> 4</label>
                        <label style="padding-right:12px;padding-left=8px;font-weight:bold;"><input name="anak" type="radio" value="5" required> 5</label>
                        <label style="padding-right:12px;padding-left=8px;font-weight:bold;"><input name="anak" type="radio" value=">5" required> > 5 </label>
                      </div>
                    </div>  
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" style="text-align: left;">Photo</label>
                    <div class="col-sm-9">
                      <input type="file" name="user_img" class="form-control" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" style="text-align: left;">Jabatan</label>
                    <div class="col-sm-9">
                      <select name="jabatan" class="form-control" required>
                        <option>Admin</option>
                        <option>Logistik</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" style="text-align: left;">Tanggal gabung</label>
                    <div class="col-sm-3">
                      <label class="control-label" style="text-align: left;"><?php echo date("d F Y",now())?></label>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <div class="col-sm-6">
                  <button type="submit" class="btn btn-success pull-right">Add New User</button>
                </div>
                <div class="col-sm-6">
                  <button type="reset" class="btn btn-default">Cancel</button>
                </div>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (left) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>