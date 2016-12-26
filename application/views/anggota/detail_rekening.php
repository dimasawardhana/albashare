<div id="page-wrapper">
	<div id="page-inner">
		<div class="row">
			<div class="col-md-12">
				<h2>Rincian Rekening</h2>
				<h3>Welcome Admin</h3>
				<h4><?php echo $error_msg; ?></h4>
			</div>
		</div>
		<hr/>
		<div class="row">
			<div class="col-md-10">
				<a href="<?php echo base_url();?>anggota/add_trans/<?php echo $id_rekening; ?>	" class="btn btn-primary btn-sm">Tambah Transaksi</a>

			</div>
		</div>
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<div class="col-md-12">

				</div>
				<div class="panel-body">
					<ul class="nav nav-tabs">
						<li class="active"><a href="#pokok_wajib" data-toggle="tab">Pokok / Wajib</a></li>
						<li class=""><a href="#tabarok_a" data-toggle="tab">Tabarok A</a></li>
						<li class=""><a href="#tarekah_a" data-toggle="tab">Tarekah A</a></li>
						<li class=""><a href="#tarekah_b" data-toggle="tab">Tarekah B</a></li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane fade active in" id="pokok_wajib">
							<h4>Pokok / Wajib</h4>
							<h5>Saldo Pokok/Wajib : <?php if(isset($no_rekening[0]->saldo_pokok_wajib)){echo $no_rekening[0]->saldo_pokok_wajib;}else{echo 0;}?>   </h5>
							<div class="col-md-12">
								<div class="table-responsive">
									<table class="table table-stiped table-bordered table-hover" id="dataTables-example">
										<thead>
											<tr>
												<th>No</th>
												<th>Tanggal</th>
												<th>Nominal</th>
												<th>Keterangan</th>
											</tr>
										</thead>
										<tbody>
											<?php
												if (isset($pokok_wajib)) {
													$jumlah_desimal="0";
                                                    $pemisah_desimal=",";
                                                    $pemisah_ribuan=".";
                                                    $mata_uang="Rp ";
                                                    $no=1;
                                                    foreach($pokok_wajib as $object){
                                                    	echo "<tr class='odd gradeX'>";
                                                    		echo "<td>".$no."</td>";
                                                    		echo "<td>".$object->date."</td>";
                                                    		echo "<td>".$mata_uang.number_format($object->nominal, $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan)."</td>";
                                                    		if($object->pokok_wajib == 0)
                                                    			echo "<td>Pokok</td>";
                                                    		else
                                                    			echo "<td>Wajib</td>";
                                                    	echo "</tr>";
                                                    	$no++;
                                                    }
												}
											?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="tabarok_a">
							<h4>Tabarok A</h4>
							<h5>Saldo Tabarok A : <?php if(isset($no_rekening[0]->saldo_tabarok_a)){echo $no_rekening[0]->saldo_tabarok_a;}else{echo 0;}?>   </h5>
							<div class="col-md-12">
								<div class="table-responsive">
									<table class="table table-stiped table-bordered table-hover" id="dataTables-example2">
										<thead>
											<th>No</th>
											<th>Tanggal</th>
											<th>Kode</th>
											<th>Tarik</th>
											<th>Setor</th>
											<th>Petugas</th>
											<th>No Transaksi</th>
											<th>Keterangan</th>
										</thead>
										<tbody>
											<?php
												if (isset($tabarok_a)) {
													$jumlah_desimal="0";
                                                    $pemisah_desimal=",";
                                                    $pemisah_ribuan=".";
                                                    $mata_uang="Rp ";
                                                    $no=1;
                                                    foreach($tabarok_a as $object){
                                                    	echo "<tr class='odd gradeX'>";
                                                    		echo "<td>".$no."</td>";
                                                    		echo "<td>".$object->date."</td>";
																												echo "<td>0".$object->kode."</td>";
                                                    		if ($object->debit_kredit == 1){
                                                    			echo "<td></td>";
                                                    			echo "<td>".$mata_uang.number_format($object->nominal, $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan)."</td>";
                                                    		} else {
                                                    			echo "<td>".$mata_uang.number_format($object->nominal, $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan)."</td>";
                                                    			echo "<td></td>";
                                                    		}
																												echo "<td>".$object->petugas."</td>";
																												echo "<td>".$object->no_transaksi."</td>";
																												echo "<td>".$object->keterangan."</td>";
                                                    	echo "</tr>";
                                                    	$no++;
                                                    }
												}
											?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="tarekah_a">
							<h4>Tarekah A</h4>
							<h5>Saldo Tarekah A : <?php if(isset($no_rekening[0]->saldo_tarekah_a)){echo $no_rekening[0]->saldo_tarekah_a;}else{echo 0;}?>   </h5>
							<div class="col-md-12">
								<div class="table-responsive">
									<table class="table table-stiped table-bordered table-hover" id="dataTables-example3">
										<thead>
											<th>No</th>
											<th>Tanggal</th>
											<th>Tarik</th>
											<th>Setor</th>
											<!--<th>Bagi Hasil</th>-->
											<th>Waktu</th>
											<th>Petugas</th>
											<th>No Transaksi</th>
											<th>Keterangan</th>
										</thead>
										<tbody>
											<?php
												if (isset($tarekah_a)){
													$jumlah_desimal="0";
                                                    $pemisah_desimal=",";
                                                    $pemisah_ribuan=".";
                                                    $mata_uang="Rp ";
                                                    $no=1;
                                                    foreach($tarekah_a as $object){
                                                    	echo "<tr class='odd gradeX'>";
                                                    		echo "<td>".$no."</td>";
                                                    		echo "<td>".$object->date."</td>";
                                                    		if ($object->debit_kredit == 1){
                                                    			echo "<td></td>";
                                                    			echo "<td>".$mata_uang.number_format($object->nominal, $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan)."</td>";
                                                    		} else {
                                                    			echo "<td>".$mata_uang.number_format($object->nominal, $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan)."</td>";
                                                    			echo "<td></td>";
                                                    		}
                                                    		//echo "<td>".$mata_uang.number_format($object->bagi_hasil, $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan)."</td>";
                                                    		echo "<td>".$object->waktu." Bulan</td>";
																												echo "<td>".$object->petugas."</td>";
																												echo "<td>".$object->no_transaksi."</td>";
																												echo "<td>".$object->keterangan;
																												echo "<a class='btn btn-primary' href='".base_url()."anggota/rinci_tarekah/".$object->id."'>Detail</a>";
																												
																												if(date('Y-m',strtotime($object->date.' +'.$object->waktu.' month'))<= date('Y-m'))
																												{
																													echo "&nbsp tarekah sudah berakhir &nbsp";
																													if($object->status==0){
																													echo "<a class='btn btn-primary' href='".base_url()."anggota/ambil_tarekah/".$object->id."'>ambil uang</a>";
																													}
																												}
																												
																												echo "</td>";
                                                    	echo "</tr>";
                                                    	$no++;
                                                    }
												}
											?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="tarekah_b">
							<h4>Tarekah B</h4>
							<h5>Saldo Tarekah B : <?php if(isset($saldo_tarekah_b[0])){echo $saldo_tarekah_b[0]->nominal;}else{echo 0;}?>   </h5>
							<div class="col-md-12">
								<div class="table-responsive">
									<table class="table table-stiped table-bordered table-hover" id="dataTables-example4">
										<thead>
											<th>No</th>
											<th>Tanggal</th>
											<th>Tarik</th>
											<th>Setor</th>
											<th>Bagi Hasil</th>
											<th>Waktu</th>
											<th>Petugas</th>
											<th>No Transaksi</th>
											<th>Keterangan</th>
										</thead>
										<tbody>
											<?php
												if(isset($tarekah_b)){
													$jumlah_desimal="0";
                                                    $pemisah_desimal=",";
                                                    $pemisah_ribuan=".";
                                                    $mata_uang="Rp ";
                                                    $no=1;
                                                    foreach($tarekah_b as $object){
                                                    	echo "<tr class='odd gradeX'>";
                                                    		echo "<td>".$no."</td>";// no
                                                    		echo "<td>".$object->date."</td>";// tanggal
                                                    		if ($object->debit_kredit == 1){
                                                    			echo "<td></td>";
                                                    			echo "<td>".$mata_uang.number_format($object->nominal, $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan)."</td>";
                                                    		} else {
                                                    			echo "<td>".$mata_uang.number_format($object->nominal, $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan)."</td>";
                                                    			echo "<td></td>";
                                                    		}// debit/kredit
                                                    		echo "<td>".$mata_uang.number_format($object->bagi_hasil, $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan)."</td>";//bagihasil
                                                    		echo "<td>".$object->waktu."</td>";//waktu
																												echo "<td>".$object->petugas."</td>";
																												echo "<td>".$object->no_transaksi."</td>";
																												echo "<td>".$object->keterangan."</td>";
                                                    	echo "</tr>";
                                                    	$no++;
                                                    }
												}
											?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
