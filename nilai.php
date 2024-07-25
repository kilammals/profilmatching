
				<div class="panel-heading"><h2>DAFTAR NILAI</h2></div>
				<a href="?page=nilai_tambah">TAMBAH NILAI</a><br>
					<table class="table">
						<thead>
							<tr>
								<th>No</th>
								<th>ID</th>
								<th>Nama Karyawan</th>
								<th>Aspek</th>
								<th>Faktor</th>
								<th>Nilai</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php 

							$halaman = 20;
							  $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
							  $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
							  $result = mysqli_query($koneksi, "SELECT * FROM tbl_sample");
							  $total = mysqli_num_rows($result);
							  $pages = ceil($total/$halaman);            
							  $query = mysqli_query($koneksi, "SELECT * FROM tbl_sample, tbl_karyawan, tbl_aspek, tbl_faktor WHERE tbl_sample.karyawan=tbl_karyawan.id_karyawan AND tbl_sample.faktor=tbl_faktor.id_faktor AND tbl_faktor.aspek=tbl_aspek.id_aspek ORDER BY tbl_sample.karyawan, tbl_aspek.id_aspek ASC LIMIT $mulai, $halaman")or die(mysqli_error($koneksi));
							  $no =$mulai+1;
							 
							while ($data = mysqli_fetch_assoc($query)){
								?>
								<tr>
									<td><?php echo $no; ?></td>
									<td><?php echo $data['id_karyawan']; ?></td>
									<td><?php echo $data['nama_karyawan']; ?></td>
									<td><?php echo $data['nama_aspek']; ?></td>
									<td><?php echo $data['nama_faktor']; ?></td>
									<td><?php echo $data['nilai']; ?></td>
									
									<td>
										<a href="?page=nilai_edit&id_sample=<?php echo $data['id_sample']; ?>">
										<i class='fa fa-edit'></i>
										</a>
										<a  href="javascript:confirmDeleteNilai('nilai_hapus.php?id_karyawan=<?php echo $data[id_karyawan]; ?>')">
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
								<a href="?page=nilai&halaman=<?php echo $i; ?>"><input type="button" value="<?php echo $i; ?>"></a>
							 
						<?php } ?>
						</p>
							 
					</div>