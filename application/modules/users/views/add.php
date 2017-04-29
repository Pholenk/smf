<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class='box box-success'>
          <div class='box-header with-border'>
            <h1 class='box-title'>Edit User</h1>
          </div>
          <div class='box-body'>
            <form class='form-horizontal' method='post' id='user_add_form' enctype='multipart/form-data'>
              <div class='col-sm-11 pull-right'>
                <div class='form-group'>
                  <label class='col-xs-3 control-label' style='text-align: left;'>ID</label>
                  <div class='col-xs-9'>
                    <label class='control-label'>
                      <?php echo $user_id ?>
                    </label>
                  </div>
                </div>
                <div class='form-group'>
                  <label class='col-xs-3 control-label' style='text-align: left;'>Nama</label>
                  <div class='col-xs-9'>
                    <input name='nama' type='text' class='form-control' id='nama_add'>
                  </div>
                </div>
                <div class='form-group'>
                  <label class='col-xs-3 control-label' style='text-align: left;'>Email</label>
                  <div class='col-xs-9'>
                    <input name='email' type='email' class='form-control' id='email_add'>
                  </div>
                </div>
                <div class='form-group'>
                  <label class='col-xs-3 control-label' style='text-align: left;'>Password</label>
                  <div class='col-xs-9'>
                    <div class='input-group'>
                      <div class='input-group-btn'>
                        <button type='button' class='btn btn-info' id='show_password'><i class='fa fa-eye'></i></button>
                      </div>
                      <input name='password' type='password' class='form-control' id='password_add'>
                    </div>
                  </div>
                </div>
                <div class='form-group'>
                  <label class='col-xs-3 control-label' style='text-align: left;'>No KTP</label>
                  <div class='col-xs-9'>
                    <input name='ktp_no' type='number' class='form-control' id='ktp_no_add'>
                  </div>
                </div>
                <div class='form-group' id='fileupload'>
                  <label class='col-xs-3 control-label' style='text-align: left;'>KTP Image</label>
                  <div class='col-xs-9'>
                    <input name='ktp_img' type='file' class='form-control' id='ktp_img_add'>
                  </div>
                </div>
                <div class='form-group'>
                  <label class='col-xs-3 control-label' style='text-align: left;'>Alamat</label>
                  <div class='col-xs-9'>
                    <input name='alamat' type='text' class='form-control' id='alamat_add'>
                  </div>
                </div>
                <div class='form-group'>
                  <label class='col-xs-3 control-label' style='text-align: left;'>Telepon Primer</label>
                  <div class='col-xs-9'>
                    <input name='telepon_primer' type='number' class='form-control' id='telepon_primer_add'>
                  </div>
                </div>
                <div class='form-group'>
                  <label class='col-xs-3 control-label' style='text-align: left;'>Telepon Sekunder</label>
                  <div class='col-xs-9'>
                    <input name='telepon_sekunder' type='number' class='form-control' id='telepon_sekunder_add'>
                  </div>
                </div>
                <div class='form-group'>
                  <label class='col-xs-3 control-label' style='text-align: left;'>PIN BB</label>
                  <div class='col-xs-9'>
                    <input name='telepon_pin' type='text' class='form-control' id='telepon_pin_add'>
                  </div>
                </div>
                <div class='form-group'>
                  <label class='col-xs-3 control-label' style='text-align: left;'>WhatsApp</label>
                  <div class='col-xs-9'>
                    <input name='telpon_whatsapp' type='number' class='form-control' id='telpon_whatsapp_add'>
                  </div>
                </div>
                <div class='form-group'>
                  <label class='col-xs-3 control-label' style='text-align: left;'>No rekening</label>
                  <div class='col-xs-9'>
                    <input name='rekening_no' type='text' class='form-control' id='rekening_no_add'>
                  </div>
                </div>
                <div class='form-group'>
                  <label class='col-xs-3 control-label' style='text-align: left;'>Bank</label>
                  <div class='col-xs-9'>
                    <select name='rekening_bank' class='form-control' id='rekening_bank'>
                      <option>BRI</option>
                      <option>BNI</option>
                      <option>BCA</option>
                      <option>Mandiri</option>
                    </select>
                  </div>
                </div>
                <div class='form-group'>
                  <label class='col-xs-3 control-label' style='text-align: left;'>Agama</label>
                  <div class='col-xs-9'>
                    <input name='agama' type='text' class='form-control' id='agama_add'>
                  </div>
                </div>
                <div class='form-group'>
                  <label class='col-xs-3 control-label' style='text-align: left;'>NO NPWP</label>
                  <div class='col-xs-9'>
                    <input name='npwp_no' type='text' class='form-control' id='npwp_no_add'>
                  </div>
                </div>
                <div class='form-group'>
                  <label class='col-xs-3 control-label' style='text-align: left;'>Scan NPWP</label>
                  <div class='col-xs-9'>
                    <input name='npwp_img' type='file' class='form-control' id='npwp_img_add'>
                  </div>
                </div>
                <div class='form-group'>
                  <label class='col-xs-3 control-label' style='text-align: left;'>Status</label>
                  <div class='col-xs-9'>
                    <div class='radio'>
                      <label style='padding-right:12px;padding-left=8px;font-weight:bold;'>
                        <input name='status' type='radio' value='kawin' id='status_add'> Kawin
                      </label>
                      <label style='padding-right:12px;padding-left=8px;font-weight:bold;'>
                        <input name='status' type='radio' value='tidak_kawin' id='status_add'> Tidak / Belum Kawin
                      </label>
                    </div>
                  </div>
                </div>
                <div class='form-group'>
                  <label class='col-xs-3 control-label' style='text-align: left;'>Anak</label>
                  <div class='col-xs-9'>
                    <div class='radio'>
                      <label style='padding-right:12px;padding-left=8px;font-weight:bold;'>
                        <input name='anak' type='radio' value='1' id='anak_add'> 1</label>
                      <label style='padding-right:12px;padding-left=8px;font-weight:bold;'>
                        <input name='anak' type='radio' value='2' id='anak_add'> 2</label>
                      <label style='padding-right:12px;padding-left=8px;font-weight:bold;'>
                        <input name='anak' type='radio' value='3' id='anak_add'> 3</label>
                      <label style='padding-right:12px;padding-left=8px;font-weight:bold;'>
                        <input name='anak' type='radio' value='4' id='anak_add'> 4</label>
                      <label style='padding-right:12px;padding-left=8px;font-weight:bold;'>
                        <input name='anak' type='radio' value='5' id='anak_add'> 5</label>
                      <label style='padding-right:12px;padding-left=8px;font-weight:bold;'>
                        <input name='anak' type='radio' value='>5' id='anak_add'> >5 </label>
                    </div>
                  </div>
                </div>
                <div class='form-group'>
                  <label class='col-xs-3 control-label' style='text-align: left;'>Photo</label>
                  <div class='col-xs-9'>
                    <input name='photo' type='file' class='form-control' id='photo'>
                  </div>
                </div>
                <div class='form-group'>
                  <label class='col-xs-3 control-label' style='text-align: left;'>Jabatan</label>
                  <div class='col-xs-9'>
                    <select name='jabatan' class='form-control' id='jabatan'>
                      <option>Admin</option>
                      <option>Logistik</option>
                    </select>
                  </div>
                </div>
                <div class='form-group'>
                  <label class='col-xs-3 control-label' style='text-align: left;'>Tanggal gabung</label>
                  <div class='col-xs-3'>
                    <label class='control-label' style='text-align: left;'>
                      <?php echo mdate('%d %F %Y', time()) ?>
                    </label>
                  </div>
                </div>
              </div>
          </div>
          <div class='box-footer'>
            <div class='col-xs-6'>
              <button class='btn btn-success pull-right' type='submit' id='save_add_user'><i class='fa fa-save'></i> Save</button>
            </div>
            <div class='col-xs-6'>
              <button class='btn btn-danger' type='button'><i class='fa fa-times'></i> Cancel</button>
            </div>
          </div>
          </form>
        </div>
        <!-- /.box -->
      </div>
    </div>
  </section>
</div>