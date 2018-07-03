<?php 
  $sql_select_category = "SELECT category_id,category_slug,category_name FROM categories";
  $query_select_category = mysqli_query($conn,$sql_select_category);
?>
<div>
    <div class="columns">
      <div class="column hide-md col-12">
        <div class="navbar-container">
              <ul class="navbar"> 
                  <li><a href="<?php echo DOMAIN;?>">QNamCoder</a></li>
                  <li>Category +
                    <ul class="dropdown-content">
                    <?php while ($row = mysqli_fetch_array($query_select_category) ) { 
                      if ($row['category_id'] != 0 ) { ?>
                      <li><a href="<?= DOMAIN ?>/category/<?= $row['category_slug']?>"><?= $row['category_name'] ?></a></li>
                    <?php } }?>

                    </ul>
                  </li>
                  <li>Blog</li>
                  <li>About me</li>
              </ul>
        </div>
      </div>
    </div>
</div>

<div>
    <div class="columns">
      <div class="column show-md hide-lg hide-xl col-12">
        <div class="navbar-container">
              <button class="accordion">
                <i class="fas fa-align-justify" style="font-size: 20px;"></i> 
                <span style="font-size: 20px;">QNamCoder</span>
              </button>
                <div class="panel">
                  <a href="<?= DOMAIN ?>"><button class="accordion">Trang chủ</button></a>
                  <button class="accordion">Category +</button>
                  <div class="panel"> 
                    <?php 
                    mysqli_data_seek($query_select_category, 0); //DƯA CON TRỎ VỀ HÀNG 0 VÀ DUYỆT LẠI TỪ ĐẦU
                    //NẾU SỬ DỤNG FOREACH SẼ KHÔNG PHẢI SỬA DỤNG HÀN TRÊN.
                    while ( $row = mysqli_fetch_array($query_select_category) ) { 
                      if ( $row['category_id'] != 0 ) { ?>

                      <a href="<?= DOMAIN ?>/category/<?= $row['category_slug']?>"><button class="btn-panel"><?= $row['category_name'] ?></button></a>

                    <?php } }?>
                  </div>
                  <a href="#"><button class="accordion">Blog</button></a>
                  <a href="#"><button class="accordion">About me</button></a>
        </div>
      </div>
    </div>
</div>


