
				<div class="panel-heading"><h2>DAFTAR ASPEK</h2></div>
				<a href="?page=aspek_tambah">TAMBAH ASPEK</a><br>
					<table class="table">
						<thead>
							<tr>
								<th>No</th>
								<th>ID</th>
								<th>Nama Aspek</th>
								<th>Bobot</th>
								<th>Bobot Core</th>
								<th>Bobot Secondary</th>
								<th>Nama Singkat</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php 

							$halaman = 10;
							  $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
							  $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
							  $result = mysqli_query($koneksi, "SELECT * FROM tbl_aspek");
							  $total = mysqli_num_rows($result);
							  $pages = ceil($total/$halaman);            
							  $query = mysqli_query($koneksi, "SELECT * FROM tbl_aspek LIMIT $mulai, $halaman")or die(mysql_error);
							  $no =$mulai+1;
							 
							while ($data = mysqli_fetch_assoc($query)){
								?>
								<tr>
									<td><?php echo $nomor=$nomor+1; ?></td>
									<td><?php echo $data['id_aspek']; ?></td>
									<td><?php echo $data['nama_aspek']; ?></td>
									<td><?php echo $data['bobot']; ?></td>
									<td><?php echo $data['bobot_core']; ?></td>
									<td><?php echo $data['bobot_secondary']; ?></td>
									<td><?php echo $data['nama_singkat']; ?></td>
									<td>
										<a href="?page=aspek_edit&id_aspek=<?php echo $data['id_aspek']; ?>">
										<i class='fa fa-edit'></i>
										</a>
										<a href="aspek_hapus.php?id_aspek=<?php echo $data['id_aspek']; ?>">
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
								<a href="?page=aspek&halaman=<?php echo $i; ?>"><input type="button" value="<?php echo $i; ?>"></a>
							 
						<?php } ?>
						</p>
							 
					</div>