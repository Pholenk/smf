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
            <?php foreach ($user_data as $data) { ?>
            <form class='form-horizontal' method='post' id='user_edit_form_<?php echo $data->id ?>' action='<?php echo base_url('/users/edit/'.$data->id)?>' enctype='multipart/form-data'>
              <div class='col-sm-11 pull-right'>
                <div class='form-group'>
                  <label class='col-xs-3 control-label' style='text-align: left;'>ID</label>
                  <div class='col-xs-9'>
                    <label class='control-label'>
                      <?php echo $data->id ?>
                    </label>
                  </div>
                </div>
                <div class='form-group'>
                  <label class='col-xs-3 control-label' style='text-align: left;'>Nama</label>
                  <div class='col-xs-9'>
                    <input name='nama' type='text' class='form-control' value='<?php echo $data->name_full ?>' id='nama_edit' required>
                  </div>
                </div>
                <div class='form-group'>
                  <label class='col-xs-3 control-label' style='text-align: left;'>Email</label>
                  <div class='col-xs-9'>
                    <input name='email' type='email' class='form-control' value='<?php echo $data->email ?>' id='email_edit' required>
                  </div>
                </div>
                <div class='form-group'>
                  <label class='col-xs-3 control-label' style='text-align: left;'>Password</label>
                  <div class='col-xs-9'>
                    <div class='input-group'>
                      <div class='input-group-btn'>
                        <button type='button' class='btn btn-info' id='show_password'><i class='fa fa-eye'></i></button>
                      </div>
                      <input name='password' type='password' class='form-control' value='<?php echo $data->password ?>' id='password_edit' required>
                    </div>
                  </div>
                </div>
                <div class='form-group'>
                  <label class='col-xs-3 control-label' style='text-align: left;'>No KTP</label>
                  <div class='col-xs-9'>
                    <input name='ktp_no' type='number' min=0 class='form-control' value='<?php echo $data->ktp_no ?>' id='ktp_no_edit' required>
                  </div>
                </div>
                <div class='form-group' id='fileupload'>
                  <label class='col-xs-3 control-label' style='text-align: left;'>KTP Image</label>
                  <div class='col-xs-9'>
                    <input name='ktp_img' type='file' class='form-control' value='/assets/ktp/<?php echo $data->ktp_img ?>' id='ktp_img_edit' required>
                  </div>
                </div>
                <div class='form-group'>
                  <label class='col-xs-3 control-label' style='text-align: left;'>Alamat</label>
                  <div class='col-xs-9'>
                    <input name='alamat' type='text' class='form-control' value='<?php echo $data->alamat ?>' id='alamat_edit' required>
                  </div>
                </div>
                <div class='form-group'>
                  <label class='col-xs-3 control-label' style='text-align: left;'>Telepon Primer</label>
                  <div class='col-xs-9'>
                    <input name='telepon_primer' type='number' min=0 class='form-control' value='<?php echo $data->telepon_primer ?>' id='telepon_primer_edit' required>
                  </div>
                </div>
                <div class='form-group'>
                  <label class='col-xs-3 control-label' style='text-align: left;'>Telepon Sekunder</label>
                  <div class='col-xs-9'>
                    <input name='telepon_sekunder' type='number' min=0 class='form-control' value='<?php echo $data->telepon_sekunder ?>' id='telepon_sekunder_edit'>
                  </div>
                </div>
                <div class='form-group'>
                  <label class='col-xs-3 control-label' style='text-align: left;'>PIN BB</label>
                  <div class='col-xs-9'>
                    <input name='telepon_pin' type='text' class='form-control' value='<?php echo $data->telepon_pin ?>' id='telepon_pin_edit'>
                  </div>
                </div>
                <div class='form-group'>
                  <label class='col-xs-3 control-label' style='text-align: left;'>WhatsApp</label>
                  <div class='col-xs-9'>
                    <input name='telpon_whatsapp' type='number' min=0 class='form-control' value='<?php echo $data->telepon_whatsapp ?>' id='telpon_whatsapp_edit'>
                  </div>
                </div>
                <div class='form-group'>
                  <label class='col-xs-3 control-label' style='text-align: left;'>No rekening</label>
                  <div class='col-xs-9'>
                    <input name='rekening_no' type='text' class='form-control' value='<?php echo $data->rekening_no ?>' id='rekening_no_edit' required>
                  </div>
                </div>
                <div class='form-group'>
                  <label class='col-xs-3 control-label' style='text-align: left;'>Bank</label>
                  <div class='col-xs-9'>
                    <select name='rekening_bank' class='form-control' id='rekening_bank' required>
                      <?php echo $data->rekening_bank ?>
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
                    <input name='agama' type='text' class='form-control' value='<?php echo $data->agama ?>' id='agama_edit' required>
                  </div>
                </div>
                <div class='form-group'>
                  <label class='col-xs-3 control-label' style='text-align: left;'>NO NPWP</label>
                  <div class='col-xs-9'>
                    <input name='npwp_no' type='text' class='form-control' value='<?php echo $data->npwp_no ?>' id='npwp_no_edit'>
                  </div>
                </div>
                <div class='form-group'>
                  <label class='col-xs-3 control-label' style='text-align: left;'>Scan NPWP</label>
                  <div class='col-xs-9'>
                    <input name='npwp_img' type='file' class='form-control' value='<?php echo $data->npwp_img ?>' id='npwp_img_edit'>
                  </div>
                </div>
                <div class='form-group'>
                  <label class='col-xs-3 control-label' style='text-align: left;'>Status</label>
                  <div class='col-xs-9'>
                    <div class='radio'>
                      <label style='padding-right:12px;padding-left=8px;font-weight:bold;'>
                        <input name='status' type='radio' value='kawin' <?php echo ($data->status === 'kawin' ? 'checked' : '') ?> id='status_edit' required> Kawin
                      </label>
                      <label style='padding-right:12px;padding-left=8px;font-weight:bold;'>
                        <input name='status' type='radio' value='tidak_kawin' <?php echo ($data->status === 'tidak_kawin' ? 'checked' : '') ?> id='status_edit' required> Tidak / Belum Kawin
                      </label>
                    </div>
                  </div>
                </div>
                <div class='form-group'>
                  <label class='col-xs-3 control-label' style='text-align: left;'>Anak</label>
                  <div class='col-xs-9'>
                    <div class='radio'>
                      <label style='padding-right:12px;padding-left=8px;font-weight:bold;'>
                        <input name='anak' type='radio' value='0' <?php echo ($data->anak === '0' ? 'checked' : '') ?> id='anak_edit'> 0</label required>
                      <label style='padding-right:12px;padding-left=8px;font-weight:bold;'>
                        <input name='anak' type='radio' value='1' <?php echo ($data->anak === '1' ? 'checked' : '') ?> id='anak_edit'> 1</label required>
                      <label style='padding-right:12px;padding-left=8px;font-weight:bold;'>
                        <input name='anak' type='radio' value='2' <?php echo ($data->anak === '2' ? 'checked' : '') ?> id='anak_edit'> 2</label required>
                      <label style='padding-right:12px;padding-left=8px;font-weight:bold;'>
                        <input name='anak' type='radio' value='3' <?php echo ($data->anak === '3' ? 'checked' : '') ?> id='anak_edit'> 3</label required>
                      <label style='padding-right:12px;padding-left=8px;font-weight:bold;'>
                        <input name='anak' type='radio' value='4' <?php echo ($data->anak === '4' ? 'checked' : '') ?> id='anak_edit'> 4</label required>
                      <label style='padding-right:12px;padding-left=8px;font-weight:bold;'>
                        <input name='anak' type='radio' value='5' <?php echo ($data->anak === '5' ? 'checked' : '') ?> id='anak_edit'> 5</label required>
                      <label style='padding-right:12px;padding-left=8px;font-weight:bold;'>
                        <input name='anak' type='radio' value='>5' <?php echo ($data->anak === '>5' ? 'checked' : '') ?> id='anak_edit'> >5 </label required>
                    </div>
                  </div>
                </div>
                <div class='form-group'>
                  <label class='col-xs-3 control-label' style='text-align: left;'>Photo</label>
                  <div class='col-xs-9'>
                    <input name='photo' type='file' class='form-control' value='/assets/photo/<?php echo $data->photo ?>' id='photo' required>
                  </div>
                  <img src="/assets/photo/<?php echo $data->thumbnail ?>">
                </div>
                <div class='form-group'>
                  <label class='col-xs-3 control-label' style='text-align: left;'>Jabatan</label>
                  <div class='col-xs-9'>
                    <select name='jabatan' class='form-control' id='jabatan'>
                      <?php echo $data->jabatan ?>
                      <option>Admin</option>
                      <option>Logistik</option>
                    </select>
                  </div>
                </div>
                <div class='form-group'>
                  <label class='col-xs-3 control-label' style='text-align: left;'>Tanggal gabung</label>
                  <div class='col-xs-3'>
                    <label class='control-label' style='text-align: left;'>
                      <?php echo mdate('%d %F %Y', time($data->created_at)) ?>
                    </label>
                  </div>
                </div>
              </div>
          </div>
          <div class='box-footer'>
            <div class='col-xs-6'>
              <button class='btn btn-success pull-right' type='submit' id='save_edit_user'><i class='fa fa-save'></i> Save</button>
            </div>
            <div class='col-xs-6'>
              <a href="/users"><button class='btn btn-danger' type='button'><i class='fa fa-times'></i> Cancel</button></a>
            </div>
          </div>
          </form>
          <?php } ?>
        </div>
        <!-- /.box -->
      </div>
    </div>
  </section>
</div>