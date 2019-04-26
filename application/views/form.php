<?php

if (!empty(validation_errors()))
echo '<div class="alert alert-danger">'.validation_errors().'</div>';

echo  form_open('/pib/post', array('enctype' => 'multipart/form-data','id'=>'form'));

?>
<style>
.error { color: red; font-size: 10pt; margin: 10px 0 -10px 0}
.error::before {
content: '* '
}
</style>
<div class="card m-lg-5">
<div class="card-header"><h2>Form inpus</h2></div>
<div class="card-body">

<div class="form-row">
    <div class="form-group col-md-6">
      <label for="nama">Nama</label>
      <input type="text" class="form-control" name="nama" value="<?= set_value('nama'); ?>" id="nama" placeholder="Nama">
    </div>
    <div class="form-group col-md-6">
      <label for="nik">NIK</label>
      <input type="number" name="nik" class="form-control" id="nik" placeholder="nik">
    </div>
  </div>
  <div class="form-group">
    <label for="judul">Judul</label>
    
 <input name="judul" type="text" class="form-control" id="judul" placeholder="judul">
  </div>
  <div class="form-group">
    <label for="perihal">Perihal</label>
    <input name="perihal" type="text" class="form-control" id="perihal" placeholder="perihal">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="usulan">Usulan</label>
      <input name="usulan" type="text" class="form-control" id="usulan">
    </div>
    <div class="form-group col-md-4">
      <label for="dept">Dept</label>
      <select name="dept" id="dept" class="form-control">
        <option value="">Pilih...</option>
        <option>...</option>
      </select>
    </div>
    <div class="form-group col-md-2">
      <label for="gambar">Upload</label>
      <input type="file" name="gambar" class="form-control" id="gambar">
    </div>
  </div>
  <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck">
      <label class="form-check-label" for="gridCheck">
        Check me out
      </label>
    </div>
  </div>
  <input type="submit" value="submit" name="submit" class="btn btn-primary">
</form>
</div>

</div>
</div>
<script type="text/javascript" src="<?= base_url() ?>asset/js/jquery.validate.min.js"></script>
		
		<script type="text/javascript">
		$(document).ready(function() {
			$('#form').validate({
				rules: {
					nik : {
						digits: true,
						minlength:16,
						maxlength:16
					},
					nik: {
						required:true
					},
					perihal: {
						required: true
					}, 
					dept: {
						required: true
					},
					nama: {
						required: true
					},
					judul: {
						required: true
					},
usulan: {
required: true
}
				},
				messages: {
					nik: {
						required: "Kolom nik harus diisi",
						minlength: "Kolom nik harus terdiri dari 16 digit",
						maxlength: "Kolom nim harus terdiri dari 16 digit"
					},
					perihal: {
						required: "Perihal harus diisi"
					},
					judul: {
						required: "Judul harus diisi"
					}
,
nama: {
required: "Bajenkkk elu kagak punya nama cuk?? isi kentoddd!1!1!1"
},
dept: {
required: 'Anda belum memilih department'
},
nik: {
required: 'Nik harus diisi'
},
usulan: {
required: 'ususlan harus diisi'
}
				}
			});
		});
		
		$.validator.addMethod(
			"indonesianDate",
			function(value, element) {
				// put your own logic here, this is just a (crappy) example
				return value.match(/^\d\d?\/\d\d?\/\d\d\d\d$/);
			},
			"Please enter a date in the format DD/MM/YYYY"
		);
		</script>
