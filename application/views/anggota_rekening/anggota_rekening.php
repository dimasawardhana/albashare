<div id="page-wrapper">
	<div id="page-inner">
		<div class="row">
			<div class="col-md-12">
				<h2>Daftar Anggota</h2>
				<h3>Selamat Datang</h3>
			</div>
		</div>
		<hr/>
		
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
				<div class="panel-heading">
					Daftar Anggota
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table table-stiped table-bordered table-hover" id="dataTables-example">
							<thead>
								<tr>
									<th>No</th>
									<th>Action</th>
									<th>Nama</th>
                                    <th>No Rekening</th>
								</tr>
							</thead>
							<tbody>
								<?php
									if(isset($anggota))
									{
										$no = 0;
										foreach($anggota as $object)
										{
											if($admin[0]->role==1||$admin[0]->id_cabang== $object->cabang){
											$no++;
								?>
								
											<tr>
												<td><?php echo $no;?></td>
												<td>
                                                    <a href="<?php echo base_url();?>anggota/detail_anggota/<?php echo $object->id_anggota;?>" class="btn btn-primary btn-sm">Detail Anggota </a> 
                                                <a href="<?php echo base_url();?>anggota/detail_rekening/<?php echo $object->id_rekening;?>" class="btn btn-primary btn-sm text-right">Detail rekening</a> 
                                                    <a href="<?php echo base_url();?>anggota/add_trans/<?php echo $object->id_rekening; ?>	" class="btn btn-primary btn-sm">Tambah Transaksi</a>
                                                </td>
												<td><?php echo $object->nama;?></td>
                                                <td><?php echo $object->no_rekening;?></td>
											</tr>
								<?php
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