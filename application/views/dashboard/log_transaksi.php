<div id="page-wrapper">
	<div id="page-inner">
		<div class="row">
			<div class="col-md-12">
				<h2>Log Transaksi</h2>
			</div>
		</div>
		<hr/>
		<div class="row">
			<div class="col-md-12">
				<a href="<?php echo base_url();?>dashboard/export/alltrans" class="btn btn-primary btn-sm">Export data</a>

			</form>
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
			<div class="panel panel-default">
				<div class="panel-body">
                    <ul class="nav nav-tabs">
                        <li class="active"> <a href="#tab-keseluruhan" data-toggle ="tab">Keseluruhan</a></li>
                        <li> <a href="#tab-pokokwajib" data-toggle ="tab">Pokok Wajib</a></li>
                        <li> <a href="#tab-tabarokA" data-toggle ="tab">Tabarok A</a></li>
                        <li> <a href="#tab-tarekahA" data-toggle ="tab">Tarekah A</a></li>
                        <li> <a href="#tab-tarekahB" data-toggle ="tab">Tarekah B</a></li>
                        <li> <a href="#tab-laporan" data-toggle ="tab">Laporan per bulan</a></li>
                    </ul>
					<div class="tab-content">
					<div class="tab-pane fade active in" id="tab-keseluruhan">
						<h4>Log Keseluruhan</h4>
						<div class="col-md-12">
					<div class="table-responsive">
						<table class="table table-stiped table-bordered table-hover" id="dataTables-example">
							<thead>
								<tr>
									<th>No</th>
									<th>No Rekening</th>
									<th>Nama</th>
									<th>Tanggal</th>
									<th>Kode</th>
                  <th>Tarik</th>
									<th>Setor</th>
									<th>Petugas</th>
									<th>No Transaksi</th>
									<th>Keterangan</th>
								</tr>
							</thead>
							<tbody>
								<?php
                    if(isset($alltrans)){
											$no = 1;
											foreach ($alltrans as $object) {
												# code...
												if($admin[0]->role==1||$admin[0]->id_cabang== $object->cabang){
												echo "<tr>";
												echo "<td>".$no."</td>";
												echo "<td>".$object->no_rekening."</td>";
												echo "<td>".$object->nama."</td>";
												echo "<td>".$object->date."</td>";
												echo "<td>0".$object->kode."</td>";
												if($object->debit_kredit==1){
												echo "<td>".$object->nominal."</td>";
												echo "<td> </td>";
												}
												else{
													echo "<td></td>";
													echo "<td>".$object->nominal."</td>";
												}
												echo "<td>".$object->petugas."</td>";
												echo "<td>".$object->no_transaksi."</td>";
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
					<div class="tab-pane fade" id="tab-pokokwajib">
						<h4>Log Pokok Wajib</h4>
						<div class="col-md-12">
						<div class="table-responsive">
							<table class="table table-stiped table-bordered table-hover" id="dataTables-example2">
								<thead>
									<tr>
										<th>No</th>
										<th>No rekening</th>
										<th>Nama</th>
										<th>Nominal</th>
										<th>Tanggal Transaksi</th>
										<th>Setor/Tarik</th>
									</tr>
								</thead>
								<tbody>
									<?php
									if(isset($transaksi1)){
										$no=1;
										foreach ($transaksi1 as $object) {
												if($admin[0]->role==1||$admin[0]->id_cabang== $object->cabang){
											# code...
											echo "<tr>";
											echo "<td>".$no. "</td>";
											echo "<td>".$object->no_rekening ."</td>";
											echo "<td>".$object->nama ."</td>";

											echo "<td>".$object->nominal. "</td>";
											echo "<td>".$object->date ."</td>";
											if($object->pokok_wajib==1){
												echo "<td>Pokok</td>";
											}
											else{
												echo"<td>Wajib</td>";
											}
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
					<div class="tab-pane fade" id="tab-tabarokA">
						<h4>Log Tabarok A</h4>
						<div class="col-md-12">
						<div class="table-responsive">
							<table class="table table-stiped table-bordered table-hover" id="dataTables-example3">
								<thead>
									<tr>
										<th>No</th>
										<th>No rekening</th>
										<th>Tanggal Transaksi</th>
										<th>Kode</th>
										<th>Nama</th>
										<th>Setor</th>
										<th>Tarik</th>
										<th>Petugas</th>
										<th>No Transaksi</th>
										<th>Keterangan</th>
									</tr>
								</thead>
								<tbody>
									<?php
									if(isset($transaksi2)){
										$no=1;
										foreach ($transaksi2 as $object) {
											if($admin[0]->role==1||$admin[0]->id_cabang== $object->cabang){
											# code...
											echo "<tr>";
											echo "<td>".$no. "</td>";
											echo "<td>".$object->no_rekening ."</td>";
											echo "<td>".$object->date ."</td>";
											echo "<td>0".$object->kode."</td>";
											echo "<td>".$object->nama ."</td>";

											if($object->debit_kredit==1){
												echo "<td>".$object->nominal. "</td>";
												echo "<td></td>";
											}
											else{
												echo"<td></td>";
												echo "<td>".$object->nominal. "</td>";
											}
											echo "<td>".$object->petugas."</td>";
											echo "<td>".$object->no_transaksi."</td>";
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

					<div class="tab-pane fade" id="tab-tarekahA">
						<h4>Log Tarekah A</h4>
						<div class="col-md-12">
						<div class="table-responsive">
							<table class="table table-stiped table-bordered table-hover" id="dataTables-example4">
								<thead>
									<tr>
										<th>No</th>
										<th>No rekening</th>
										<th>Nama</th>
										<th>Tanggal Transaksi</th>
										<th>Setor</th>
										<th>Tarik</th>
										<th>Petugas</th>
										<th>No Transaksi</th>
										<th>Keterangan</th>
									</tr>
								</thead>
								<tbody>
									<?php
									if(isset($transaksi3)){
										$no=1;
										foreach ($transaksi3 as $object) {
											if($admin[0]->role==1||$admin[0]->id_cabang== $object->cabang){
											# code...
											echo "<tr>";
											echo "<td>".$no. "</td>";
											echo "<td>".$object->no_rekening ."</td>";
											echo "<td>".$object->nama ."</td>";

											echo "<td>".$object->date ."</td>";
											if($object->debit_kredit!=1){
												echo "<td></td>";
												echo "<td>".$object->nominal. "</td>";
											}
											else{
												echo "<td>".$object->nominal. "</td>";
												echo"<td></td>";
											}
											echo "<td>".$object->petugas."</td>";
											echo "<td>".$object->no_transaksi."</td>";
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

					<div class="tab-pane fade" id="tab-tarekahB">
						<h4>Log Tarekah B</h4>
						<div class="col-md-12">
						<div class="table-responsive">
							<table class="table table-stiped table-bordered table-hover" id="dataTables-example5">
								<thead>
									<tr>
										<th>No</th>
										<th>No rekening</th>
										<th>Nama</th>
										<th>Tanggal Transaksi</th>
										<th>Setor</th>
										<th>Tarik</th>
										<th>Petugas</th>
										<th>No Transaksi</th>
										<th>Keterangan</th>
									</tr>
								</thead>
								<tbody>
									<?php
									if(isset($transaksi4)){
										$no=1;
										foreach ($transaksi4 as $object) {
											if($admin[0]->role==1||$admin[0]->id_cabang== $object->cabang){
											# code...
											echo "<tr>";
											echo "<td>".$no. "</td>";
											echo "<td>".$object->no_rekening ."</td>";
											echo "<td>".$object->nama ."</td>";
											echo "<td>".$object->date ."</td>";
											if($object->debit_kredit!=1){
												echo "<td></td>";
												echo "<td>".$object->nominal. "</td>";
											}
											else{
												echo "<td>".$object->nominal. "</td>";
												echo"<td></td>";
											}
											echo "<td>".$object->petugas."</td>";
											echo "<td>".$object->no_transaksi."</td>";
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
					<div class="tab-pane fade" id="tab-laporan">
						<h4>Log Laporan</h4>
						<div class="col-md-12">
						<div class="form-group">
							<div class="col-sm-6">
						<select id = "filteran2" onchange="getFilter()" value="AL" class="form-control col-sm-3">
							<option value="01">Januari</option><option value="02">Februari</option>
							<option value="03">Maret</option><option value="04">April</option>
							<option value="05">Mei</option><option value="06">Juni</option>
							<option value="07">Juli</option><option value="08">Agustus</option>
							<option value="09">September</option><option value="10">Oktober</option>
							<option value="11">November</option><option value="12">Desember</option>
							<option value="AL">Semua</option>
						</select>
							</div>
							<div class="col-sm-6">
						<select id ="filteran" onchange="getFilter()" value="ALL1" class="form-control col-sm-3">
							<option value="2015">2015</option>
							<option value="2016">2016</option>
							<option value="2017">2017</option>
							<option value="2018">2018</option>
							<option value="2019">2019</option>
							<option value="ALL1">Semua</option>
						</select>
						</br>
							</div>
						</div>
						<div class="form-group">
						</br>
						</div>
						<div class="table-responsive">

							<table class="table table-stiped table-bordered table-hover" id="dataTables-example6">
								<thead>
									<tr>
										<th>No</th>
										<th>No rekening</th>
										<th>Nama</th>
										<th>Pemasukan</th>
										<th>Pengeluaran</th>
										<th>Tanggal</th>
									</tr>
								</thead>
								<tbody id='laporanperbulan'>
									<?php

									if(isset($laporan)){
										$no=1;
										foreach ($laporan as $object) {
											if($admin[0]->role==1||$admin[0]->id_cabang== $object->cabang){
											# code...
											echo "<tr>";
											echo "<td>".$no. "</td>";
											echo "<td>".$object->no_rekening ."</td>";
											echo "<td>".$object->nama ."</td>";
											echo "<td>".$object->pemasukkan ."</td>";
											echo "<td>".$object->pengeluaran."</td>";
											echo "<td>".$object->perbulan."</td>";
											echo "</tr>";
											$no++;
										}
										}
									}
									 ?>
									 
								</tbody>
								<script>
								function getFilter(){
									var tabel = document.getElementById('laporanperbulan');
									var input = document.getElementById('filteran');// tahun
									var input2 = document.getElementById('filteran2');//bulan
									var filter = input.value.toUpperCase()+"-"+ input2.value.toUpperCase();
									var tr = tabel.getElementsByTagName("tr");
									
									
									console.log(filter);
									
									//loop through all table rows, and hide who doesn't match the search query
									for(var i = 0; i<tr.length;i++){
										td = tr[i].getElementsByTagName("td")[5];
										console.log(filter.substring(0,4));
										console.log(filter.substring(5,7));
										if(td){
											if(td.innerHTML.toUpperCase().substring(0,4)==filter.substring(0,4)||"ALL1"==filter.substring(0,4)){
												if(td.innerHTML.toUpperCase().substring(5,7)==filter.substring(5,7)||"AL"==filter.substring(5,7)){
													tr[i].style.display = "";	
												}
												else{
													tr[i].style.display = "none";	
												}
												
											}
											else{
													tr[i].style.display = "none";	
											}
										}
									}

								}
									 
								</script>
							</table>
						</div>
					</div>
					</div>
				</div>
				</div>
				
				</div>
			</div>
		</div>
		<!-- </div> -->
	</div>
</div>
