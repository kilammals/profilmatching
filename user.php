
				<div class="panel-heading"><h2>DAFTAR USER</h2></div>
				<a href="?page=user_tambah">TAMBAH USER</a><br>
					<table class="table">
						<thead>
							<tr>
								<th>No</th>
								<th>Username</th>
								<th>Nama</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php 

							$halaman = 10;
							  $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
							  $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
							  $result = mysqli_query($koneksi, "SELECT * FROM tbl_user");
							  $total = mysqli_num_rows($result);
							  $pages = ceil($total/$halaman);            
							  $query = mysqli_query($koneksi, "SELECT * FROM tbl_user LIMIT $mulai, $halaman")or die(mysql_error);
							  $no =$mulai+1;
							 
							while ($data = mysqli_fetch_assoc($query)){
								?>
								<tr>
									<td><?php echo $nomor=$nomor+1; ?></td>
									<td><?php echo $data['username']; ?></td>
									<td><?php echo $data['nama']; ?></td>
									<td>
										<a href="?page=user_edit&id_user=<?php echo $data['id_user']; ?>">
										<i class='fa fa-edit'></i>
										</a>
										<a href="user_hapus.php?id_user=<?php echo $data['id_user']; ?>">
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
								<a href="?page=user&halaman=<?php echo $i; ?>"><input type="button" value="<?php echo $i; ?>"></a>
							 
						<?php } ?>
						</p>
							 
					</div>