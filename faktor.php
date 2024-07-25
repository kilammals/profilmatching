
				<div class="panel-heading"><h2>DAFTAR FAKTOR</h2></div>
				<a href="?page=faktor_tambah">TAMBAH FAKTOR</a><br>
					<table class="table">
						<thead>
							<tr>
								<th>No</th>
								<th>ID</th>
								<th>Nama Faktor</th>
								<th>Aspek</th>
								<th>Target</th>
								<th>Jenis</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php 

							$halaman = 20;
							  $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
							  $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
							  $result = mysqli_query($koneksi, "SELECT * FROM tbl_faktor");
							  $total = mysqli_num_rows($result);
							  $pages = ceil($total/$halaman);            
							  $query = mysqli_query($koneksi, "SELECT * FROM tbl_faktor, tbl_aspek WHERE tbl_faktor.aspek=tbl_aspek.id_aspek LIMIT $mulai, $halaman")or die(mysqli_error($koneksi));
							  $no =$mulai+1;
							 
							while ($data = mysqli_fetch_assoc($query)){
								?>
								<tr>
									<td><?php echo $no; ?></td>
									<td><?php echo $data['id_faktor']; ?></td>
									<td><?php echo $data['nama_faktor']; ?></td>
									<td><?php echo $data['nama_aspek']; ?></td>
									<td><?php echo $data['target']; ?></td>
									<?php  
										if($data["jenis"]==1){
											$jenis="Core";
										}elseif($data["jenis"]==2){
											$jenis="Secondary";
										}
									?>
									<td><?php echo $jenis; ?></td>
									<td>
										<a href="?page=faktor_edit&id_faktor=<?php echo $data['id_faktor']; ?>">
										<i class='fa fa-edit'></i>
										</a>
										<a href="faktor_hapus.php?id_faktor=<?php echo $data['id_faktor']; ?>">
										<i class="fa fa-eraser"></i>
										</a>
									</td>
								</tr>
							<?php 
							$no++;
							// endforeach;
						}
							?>
						</tbody>
					</table>
					<div class="">
						<p align="right">
							<?php for ($i=1; $i<=$pages ; $i++){ ?>
								<a href="?page=faktor&halaman=<?php echo $i; ?>"><input type="button" value="<?php echo $i; ?>"></a>
							 
						<?php } ?>
						</p>
							 
					</div>