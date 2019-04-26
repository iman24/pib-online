<?php
$this->load->view('header');
?>


<div class="alert alert-warning">Total data = <?= $total ?>.</div>
<div class="card">
<h4 class="card-header alert alert-success">Download Laporan</h4>
<div class="card-body">
<form action="/report/download/" method="post">
<input type="radio" value="" name="status"> Semua <br/>
<input type="checkbox" value="2" name="status[]"> Implementasi<br/>
<input type="checkbox" value="1" name="status[]"> Di setujui<br/>
<input type="checkbox" value="0" name="status[]"> Belum disetujui<br/><br/>
<input id="submit" value="Download Excel Format (.xlsx)" class="btn btn-success" type="submit"></form>

</div></div>
<script>

$(document).ready(function(){

	$('input[type="checkbox"]').on('click',function(){
		$('input[type="radio"]').prop('checked', false);

		});

	$('input[type="radio"]').on('click',function(){
		$('input[type="checkbox"]').prop('checked', false);
		});

});






</script>

<?php
$this->load->view('footer');