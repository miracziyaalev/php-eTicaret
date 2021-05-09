 <?php require_once 'header.php' ; ?> 

  <!-- Main Sidebar Container -->
  
<?php require_once 'sidebar.php' ; ?> 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   
    <section class="content">
      <div class="container-fluid">
       
        <div class="row">
          <?php  


                if (@$_GET['yuklenme'] == 'basarili'){ ?>
                  <h6 style="color: green"> (Yükleme İşlemi Başarılı) </h6>
                  <?php
                }elseif (@$_GET['yuklenme'] == 'basarisiz') {?>
                  <h6 style="color: red"> (Yükleme İşlemi Başarısız) </h6>
                  <?php
                }

                ?> 
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Kategori Tablosu</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <a href="kategori-ekle"><button style="float: right" type="submit" class="btn btn-success">Yeni Kategori Ekle</button></a>
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                 
                  <thead>
                    <tr>
                      <th>Kategori Numara</th>
                      <th>Kategori Adı</th>
                      <th>Katıldığı Sırası</th>
                      <th>Kategori Durum</th>
                      <th>Düzenle</th>
                      <th>Sil</th>
                      <th>Ürünlere Git</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $kategori=$baglanti->prepare("SELECT * FROM kategori order by kategori_id ASC ");
                    $kategori->execute();
                    while ($kategoricek=$kategori->fetch(PDO::FETCH_ASSOC)) {?>
                      
                    
                    
                    <tr>
                      <td><?php echo $kategoricek['kategori_id'] ?></td>
                      <td><?php echo $kategoricek['kategori_adi'] ?></td>
                      <td><?php echo $kategoricek['kategori_sira'] ?></td>
                      <td><span class="tag tag-success"><?php 

                      if ($kategoricek['kategori_durum'] == "1") {
                        echo "Aktif";                    
                         }elseif ($kategoricek['kategori_durum'] == "0") {
                           echo "Pasif";
                         }


                       ?></span></td>
                      
                       <td><a href="kategori-duzenle?id=<?php echo $kategoricek['kategori_id'] ?>"><button type="submit" class="btn btn-info"> Düzenle </button></a></td>
                      <td><a href="islem/islem.php?kategorisil&id=<?php echo $kategoricek['kategori_id'] ?>"><button type="submit" class="btn btn-danger"> Sil </button></a></td>
                      <td><button type="submit" class="btn btn-success">Git</button></td>
                    </tr>
                    
                   <?php } ?>
                   
                   
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php require_once 'footer.php' ; ?> 