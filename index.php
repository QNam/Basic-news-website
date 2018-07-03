<?php 					
include_once("includes/dbConfig.php");
include_once("includes/func.php");
include_once("includes/pagination.php");
include_once("includes/header.php");


$sql_select_post = "SELECT post_id,post_title,post_description,createdate,category_id,img_id,key_word,is_public,post_slug FROM posts WHERE category_id != '0' AND is_public = '1' ORDER BY post_id DESC LIMIT $start_post, $limit ";
$query_select_post = mysqli_query($conn,$sql_select_post);

?>
	
	</style>

</head>
<body>

<?php include_once("includes/nav.php");
?>

<div class="container">
	<div class="columns">
		<div class="column hide-md col-2"></div>
		<div class="column col-md-12 col-8">
			<?php if ($current_page > $total_page): ?>
				<p class="text-center">Trang không tồn tại !</p>
			<?php endif ?>
			<div class="post-info-container p-relative">
			<?php 
			while ( $row = mysqli_fetch_array($query_select_post) ) {
			?>
				<div class="card pad-10">

					<div class="card-header pad-0">
						<div class="card-title h4">
							<a href="<?php echo DOMAIN.'/'.$row['post_slug'].'-'.$row['post_id'].'.html';?>" class="text-link-dark"><?php echo $row['post_title'];?>
							</a>
						</div>
						<div class="card-subtitle text-gray mr-bottom-8">
							<i class="far fa-calendar-alt"></i> 
							<?php echo $row['createdate'];?> 
							<a href="<?= DOMAIN ?>/category/<?= getCategorySlug($row['category_id'],$conn) ?>" class="text-link-gray">
								<?php echo getCategoryName($row['category_id'],$conn);?> 
							</a>
							
						</div>
					</div>

					<div class="columns">
						<div class="card-image hide-md column col-3" >
							<img src="<?php echo DOMAIN.getThumbpath($row['img_id'],$conn);?>" class="thumb-lazy img-responsive" alt="<?php echo toSlug($row['key_word']);?>" >

						</div>

						<div class="column col-md-12 col-9">
							<p class="text-justify"> <?php echo $row['post_description'];?></p>
						</div>
					</div> <!-- END COLUMNS CONTAIN  -->
				</div> <!-- END CARD -->

			<?php }?>

			</div> <!-- end post-info-container -->
		</div> <!-- END COL  -->
		<div class="column hide-md col-2"></div>
	</div> <!-- END COLUMNS -->

<!-- ------------------------------------------------------------- -->
<?php if ($total_page > 1): ?>

	<div class="columns">
		<div class="column hide-sm hide-xs hide-md col-4"></div>
		<div class="column col-md-12 col-4">
			<ul class="pagination pagination-cover">
			<!-- BUTTON Previous -->
	<?php if ($current_page > 1 && $total_page > 1): ?>
				<li class="page-item"><a class="page-link" href="<?= DOMAIN ?>/home/<?= $current_page-1 ?>">Previous</a></li>
	<?php endif ?>
			<!-- PAGINATION -->
	<?php for ($count = 1; $count <= $total_page; $count++) { ?>
		<?php if ($count == $current_page): ?>
				<li class="page-item"><a class="page-link active" href=" <?= DOMAIN ?>/home/<?= $count ?>"><?= $count ?></a></li>
		<?php else: ?>
				<li class="page-item"><a class="page-link" href=" <?= DOMAIN ?>/home/<?= $count ?>"><?= $count ?></a></li>
		<?php endif ?>
	<?php }?>	
			<!-- BUTTON NEXT -->
	<?php if ($current_page < $total_page && $total_page > 1): ?>
				<li class="page-item"><a class="page-link" href=" <?= DOMAIN ?>/home/<?= $current_page+1 ?>">Next</a></li>					
	<?php endif ?>

			</ul> <!-- END PAGINATION -->
		</div>
		<div class="column hide-sm hide-xs hide-md col-4"></div>
	</div>

<?php endif ?>
</div> <!-- END CONTAINER -->
<script src="https://cdn.rawgit.com/tuupola/jquery_lazyload/0a5e0785a90eb41a6411d67a2f2e56d55bbecbd3/lazyload.js"></script>
<script type="text/javascript" >
	window.addEventListener("load", function(event) {
	let images = document.querySelectorAll(".thumb-lazy");
	lazyload(images);
});
</script>
<?php include_once("includes/footer.php");?>
