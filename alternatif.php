
				<div class="panel-heading"><h2>DAFTAR ALTERNATIF</h2></div>
				<a href="?page=alternatif_tambah">TAMBAH ALTERNATIF</a><br>
					<table class="table">
						<thead>
							<tr>
								<th>No</th>
								<th>Id Alternatif</th>
								<th>Nama</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php 

							$halaman = 10;
							  $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
							  $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
							  $result = mysqli_query($koneksi, "SELECT * FROM tbl_karyawan");
							  $total = mysqli_num_rows($result);
							  $pages = ceil($total/$halaman);            
							  $query = mysqli_query($koneksi, "SELECT * FROM tbl_karyawan LIMIT $mulai, $halaman")or die(mysqli_error($koneksi));
							  $no =$mulai+1;
							 
							while ($data = mysqli_fetch_assoc($query)){
								?>
								<tr>
									<td><?php echo $nomor=$nomor+1; ?></td>
									<td><?php echo $data['id_karyawan']; ?></td>
									<td><?php echo $data['nama_karyawan']; ?></td>
									<td>
										<a href="?page=alternatif_edit&id_karyawan=<?php echo $data['id_karyawan']; ?>">
										<i class='fa fa-edit'></i>
										</a>
										<a href="alternatif_hapus.php?id_karyawan=<?php echo $data['id_karyawan']; ?>">
										<i class="fa fa-eraser"></i>
										</a>
									</td>
								</tr>
							<?php 
							// endforeach;
						}
							?>
						</tbody>
					</table>
					<div class="">
						<p align="right">
							<?php for ($i=1; $i<=$pages ; $i++){ ?>
								<a href="?page=alternatif&halaman=<?php echo $i; ?>"><input type="button" value="<?php echo $i; ?>"></a>
							 
						<?php } ?>
						</p>
							 
					</div>