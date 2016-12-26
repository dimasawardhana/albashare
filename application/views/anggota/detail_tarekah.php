<div id="page-wrapper">
	<div id="page-inner">
		<div class="row">
			<div class="col-md-12">
				<h2>Rincian Tarekah</h2>
			</br>
			<?php
			
			if(!empty($bagihasil)){
			}
			else{// dipakai jika var ini belum pernah terisi
				echo "<form action='".base_url()."anggota/estimasi_bagihasil/".$tarekah_a[0]->id."' class='form-horizontal' role='action' method='POST'>";
				echo "<div class='form-group'>";
				echo "<label class='control-label col-sm-3'>Estimasi bagi hasil per tahun</label>";
				echo "<div class='col-sm-3'>";
				echo "<input type='text' class='form-control' name='pertahun'>";
				echo "</div>";
				echo "<label class='control-label col-sm-1'>Awal</label>";
				echo "<div class='col-sm-3'>";
				echo "<input type='text' class='form-control' name='awal'>";
				echo "</div>";
				echo "<input type='hidden' value='".$tarekah_a[0]->waktu."' name='waktu'>";
				echo "<input type='hidden' value='".$tarekah_a[0]->nominal."' name='nominal'>";
				echo "<button type='submit' class='btn btn-primary' id='submitButton' >Submit</button>";
				echo "</div>";
				echo "</form>";
			}
			?>
				<table class="table table-stiped table-bordered table-hover ">
					<thead>
						<tr>
						<th></th>
						<th>Akad 3 Bulan</th>
						<th>Akad 6 Bulan</th>
						<th>Akad 12 Bulan</th>
						</tr>
					</thead>
					<tbody>
						<tr>
						<th>Akad Nisbah</th>
						<th>40:60</th>
						<th>50:50</th>
						<th>60:40</th>
						</tr>
						
						<?php 
						if(isset($tarekah_a))
						{
							echo "<tr>";
							echo "<th>Anggota</th>";
							echo "<th>".$tarekah_a[0]->awal/12*40/100 ."%</th>";
							echo "<th>".$tarekah_a[0]->awal/12*50/100 ."</th>";
							echo "<th>".$tarekah_a[0]->awal/12*60/100 ."</th>";
							echo "</tr>";

							echo "<tr>";
							echo "<th>Albashare</th>";
							echo "<th>".$tarekah_a[0]->awal/12*60/100 ."</th>";
							echo "<th>".$tarekah_a[0]->awal/12*50/100 ."</th>";
							echo "<th>".$tarekah_a[0]->awal/12*40/100 ."</th>";
							echo "</tr>";

							echo "<tr>";
							echo "<th>Sisa Nisbah</th>";
							echo "<th>".($tarekah_a[0]->bagihasil - $tarekah_a[0]->awal) *3/12 ."</th>";
							echo "<th>".($tarekah_a[0]->bagihasil - $tarekah_a[0]->awal) *6/12 ."</th>";
							echo "<th>".($tarekah_a[0]->bagihasil - $tarekah_a[0]->awal) ."</th>";
							echo "</tr>";

							echo "<tr>";
							echo "<th>Anggota</th>";
							echo "<th>".($tarekah_a[0]->bagihasil - $tarekah_a[0]->awal) *3/12*40/100 ."</th>";
							echo "<th>".($tarekah_a[0]->bagihasil - $tarekah_a[0]->awal) *6/12*50/100 ."</th>";
							echo "<th>".($tarekah_a[0]->bagihasil - $tarekah_a[0]->awal)*60/100 ."</th>";
							echo "</tr>";

							echo "<tr>";
							echo "<th>Albashare</th>";
							echo "<th>".($tarekah_a[0]->bagihasil - $tarekah_a[0]->awal) *3/12*60/100 ."</th>";
							echo "<th>".($tarekah_a[0]->bagihasil - $tarekah_a[0]->awal) *6/12*50/100 ."</th>";
							echo "<th>".($tarekah_a[0]->bagihasil - $tarekah_a[0]->awal)*40/100 ."</th>";
							echo "</tr>";
						}
						?>
					</tbody>
				</table>

				<?php if (isset($error_msg))
                  {
                    echo $error_msg;
                  }
                ?>
			</div>
		</div>
		<hr/>
		<div class="row">
			<div class="col-md-10">
			</div>
		</div>
		<br/>
		<div class="row">
			<!-- <div class="col-md-12">
				<div class="panel panel-success">
					<div class="panel-heading">
						Success Panel
					</div>
					<div class="panel-body">
						<p>Success</p>
					</div>
				</div>
			</div> -->
		</div>
		<div class="col-md-12">
			<h3>Tabel bagi hasil</h3>
			<div class="panel panel-default">
				<div class="panel-heading">
				</br>
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table table-stiped table-bordered table-hover" >
							<thead>
								<tr>
									<th>Nisbah Ke</th>
									<th>Tanggal</th>
									<th>Sandi</th>
									<th>Keterangan</th>
									<th>Nisbah Ke Anggota</th>
									<th>Nisbah Ke AlbaShar-e</th>
									<th>Catatan</th>
								</tr>
							</thead>
							<tbody>
								<?php
								if(!empty($bagihasil)){
									
									$no = 0;
									foreach($bagihasil as $object){
										if (date('Y-m')>=date('Y-m',strtotime($object->date))){
										echo "<tr>";
										echo "<td>".$no."</td>";
										echo "<td>".$object->date."</td>";
										echo "<td>sandi</td>";
										if($object->status==1){
											echo "<td>Sudah Pindah Tabarok</td>";
										}
										else{
										echo "<td>".
										"<a class='btn btn-primary' href=".base_url()."anggota/pindah_ke_tabarok/".$tarekah_a[0]->id."/".$object->id.">pindah ke tabarok</a>"
										."</td>";
										}
										echo "<td>".$object->nominal_ke_anggota."</td>";
										echo "<td>".$object->nominal_ke_albashare."</td>";
										echo "<td>".$object->keterangan."</td>";
										echo "</tr>";
										$no++;
										}
									}
								}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<!-- </div> -->
	</div>
</div>
