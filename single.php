<?php include 'header.php'; ?>
    <div id="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
				
				 <?php
			    include "config.php";
				
				$post_id=$_GET['id'];
				$sql="select * from post 
                left join category on post.category=category.category_id
				left join user on post.author=user.user_id
				where post.post_id='$post_id'
				";
				
                $result=mysqli_query($conn,$sql);
				if(mysqli_num_rows($result)>0){
						$rows=mysqli_fetch_assoc($result)
			    ?>
                  <!-- post-container -->
                    <div class="post-container">
                        <div class="post-content single-post">
                            <h3><?php echo $rows['title']?></h3>
                            <div class="post-information">
                                <span>
                                    <i class="fa fa-tags" aria-hidden="true"></i>
                                    <a href='category.php?cid=<?php echo $rows["category"]?>'><?php echo $rows['category_name']?></a>
                                </span>
                                <span>
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    <a href='author.php?aid=<?php echo $rows["user_id"]?>'><?php echo $rows['username']?></a>
                                </span>
                                <span>
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                   <?php echo $rows['post_date']?>
                                </span>
                            </div>
                            <img class="single-feature-image" src="admin\upload\<?php echo $rows['post_img']?>" alt=""/>
                            <p class="description">
                                <?php echo $rows['description']; ?>
                            </p>
                        </div>
                    </div>
                    <!-- /post-container -->
				<?php }

                 else{
                    echo"Record not found";
				 }					 
				?>
                </div>
                <?php include 'sidebar.php'; ?>
            </div>
        </div>
    </div>
<?php include 'footer.php'; ?>
