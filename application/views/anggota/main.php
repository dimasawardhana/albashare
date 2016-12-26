<div id="page-wrapper">
	<div id="page-inner">
		<div class="row">
			<div class="col-md-12">
				<h2>Daftar Anggota</h2>
				<h3>Selamat Datang</h3>
			</div>
		</div>
		<hr/>
		<div class="row">
			<div class="col-md-12">
				<a href="<?php echo base_url();?>anggota/create" class="btn btn-primary btn-sm">Tambah Anggota</a>
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
									<th>Tempat Lahir</th>
									<th>Tanggal Lahir</th>
									<th>No Identitas</th>
									<th>No HP</th>

								</tr>
							</thead>
							<tbody>
								<?php
									if(isset($anggota2))
									{
										$no = 0;
										foreach($anggota2 as $object)
										{
											if($admin[0]->role==1||$admin[0]->id_cabang== $object->cabang){// cek apakah super admin atau yang memiliki di cabang tersebut
											$no++;
								?>

											<tr>
												<td><?php echo $no;?></td>
												<td>
                        <a href="<?php echo base_url();?>anggota/detail_anggota/<?php echo $object->id?>" class="btn btn-primary btn-sm">Detail Anggota </a>
												<a href="<?php echo base_url();?>anggota/edit/<?php echo $object->id?>" class="btn btn-primary btn-sm">Edit Anggota</a>
                        </td>
												<td><?php echo $object->nama;?></td>
												<td><?php echo $object->City;?></td>
												<td><?php echo $object->TTL;?></td>
												<td><?php echo $object->identity;?></td>
												<td><?php echo $object->HP;?></td>
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
