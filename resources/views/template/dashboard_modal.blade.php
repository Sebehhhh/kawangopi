 <!-- Modal Tambah Kategori Produk -->
 <div class="modal fade" id="tambahKategoriProdukModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="tambahModalLabel">Add Product Category</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <!-- Formulir untuk menambahkan data baru -->
                 <!-- Contoh: -->
                 <form action="{{ route('dashboard.kategoriProduk.store') }}" method="POST">
                     @csrf
                     <div class="mb-3">
                         <label for="nama" class="form-label"> Product Category<span
                                 class="text-danger">*</span></label>
                         <input type="text" class="form-control" id="nama-kategori-produk" name="nama"
                             placeholder="Masukkan Nama Kategori Produk..." required>
                     </div>
                     <button type="submit" class="btn btn-primary">Save</button>
                 </form>
             </div>
         </div>
     </div>
 </div>

 <!-- Modal Tambah User -->
 <div class="modal fade" id="tambahUserModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="tambahModalLabel">Add User</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <!-- Formulir untuk menambahkan data baru -->
                 <!-- Contoh: -->
                 <form action="{{ route('dashboard.user.store') }}" method="POST" enctype="multipart/form-data">
                     @csrf
                     <div class="mb-3">
                         <label for="nama" class="form-label">Nama <span class="text-danger">*</span></label>
                         <input type="text" class="form-control" id="nama-user" name="nama"
                             placeholder="Masukkan Nama" required>
                     </div>
                     <div class="mb-3">
                         <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                         <input type="email" class="form-control" id="email" name="email"
                             placeholder="Masukkan Email" required>
                     </div>
                     <div class="mb-3">
                         <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                         <input type="password" class="form-control" id="password" name="password"
                             placeholder="Masukkan Password" required>
                     </div>
                     <div class="mb-3">
                         <label for="alamat" class="form-label">Alamat <span class="text-danger">*</span></label>
                         <input type="text" class="form-control" id="alamat" name="alamat"
                             placeholder="Masukkan Alamat" required>
                     </div>
                     <div class="mb-3">
                         <label for="telp" class="form-label">Telepon <span class="text-danger">*</span></label>
                         <input type="text" class="form-control" id="telp" name="telp"
                             placeholder="Masukkan Nomor Telepon" required>
                     </div>
                     <div class="mb-3">
                         <label for="foto" class="form-label">Foto </label>
                         <input type="file" class="form-control" id="foto" name="foto">
                     </div>
                     <button type="submit" class="btn btn-primary">Save</button>
                 </form>
             </div>
         </div>
     </div>
 </div>


 <!-- Modal Edit Kategori Produk -->
 <div class="modal fade" id="editKategoriProdukModal" tabindex="-1" aria-labelledby="editKategoriProdukModalLabel"
     aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="editKategoriProdukModalLabel">Edit Kategori Produk</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <form action="{{ route('dashboard.kategoriProduk.update') }}" method="POST" id="editForm">
                     @csrf
                     @method('PUT')
                     <input type="hidden" id="edit-id" name="id">
                     <div class="mb-3">
                         <label for="edit-nama" class="form-label">Nama Kategori<span
                                 class="text-danger">*</span></label>
                         <input type="text" class="form-control" id="edit-nama-kategori-produk" name="nama"
                             required>
                     </div>
                     <button type="submit" class="btn btn-primary">Simpan</button>
                 </form>
             </div>
         </div>
     </div>
 </div>

 <!-- Modal Edit User -->
 <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="editUserModalLabel">Edit User</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <form action="{{ route('dashboard.user.update') }}" method="POST" id="editUserForm"
                     enctype="multipart/form-data">
                     @csrf
                     @method('PUT')
                     <input type="hidden" id="edit-user-id" name="id">
                     <div class="mb-3">
                         <label for="edit-nama" class="form-label">Nama <span class="text-danger">*</span></label>
                         <input type="text" class="form-control" id="edit-nama-user" name="nama"
                             placeholder="Masukkan Nama" required>
                     </div>
                     <div class="mb-3">
                         <label for="edit-email" class="form-label">Email <span class="text-danger">*</span></label>
                         <input type="email" class="form-control" id="edit-email" name="email"
                             placeholder="Masukkan Email" required>
                     </div>
                     <div class="mb-3">
                         <label for="edit-password" class="form-label">Password <span
                                 class="text-danger">*</span></label>
                         <input type="password" class="form-control" id="edit-password" name="password"
                             placeholder="Masukkan Password" required>
                     </div>
                     <div class="mb-3">
                         <label for="edit-alamat" class="form-label">Alamat <span
                                 class="text-danger">*</span></label>
                         <input type="text" class="form-control" id="edit-alamat" name="alamat"
                             placeholder="Masukkan Alamat" required>
                     </div>
                     <div class="mb-3">
                         <label for="edit-telp" class="form-label">Telepon <span class="text-danger">*</span></label>
                         <input type="text" class="form-control" id="edit-telp" name="telp"
                             placeholder="Masukkan Nomor Telepon" required>
                     </div>
                     <div class="mb-3">
                         <label for="edit-foto" class="form-label">Foto</label>
                         <input type="file" class="form-control" id="edit-foto" name="foto">
                     </div>
                     <button type="submit" class="btn btn-primary">Simpan</button>
                 </form>
             </div>
         </div>
     </div>
 </div>
