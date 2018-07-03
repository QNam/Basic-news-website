<?php 

	//TỔNG SỐ POST ĐỦ ĐIỀU KIỆN ĐĂNG

	$query = mysqli_query($conn, "SELECT COUNT(post_id) as total from posts WHERE category_id != '0' AND is_public = '1' ");
	$row = mysqli_fetch_assoc($query);
	
	$total_post = $row['total'];
	$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
	$limit = 10;
	$total_page = ceil($total_post / $limit);
	$start_post = ( (int)$current_page - 1 ) * $limit;
	
	if ($current_page < 1){
            $current_page = 1;
    }

	
?>
