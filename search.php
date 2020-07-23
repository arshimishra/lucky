<?php include 'header.php'; ?>
    <div id="main-content">
      <div class="container">
        <div class="row">
            <div class="col-md-8">
                <!-- post-container -->
                <div class="post-container">
                  
				<?php 
				   
					$search_term=mysqli_real_escape_string($conn,$_GET['search']);
					
					
				?>
                  <h2 class="page-heading"><?php echo "Search : ". $search_term?></h2>
				   <?php
			    include "config.php";
				
				$limit=3;
                
				if(isset($_GET['page'])){
					$page=$_GET['page'];
				}
				else{
					$page=1;
				}
                $offset=($page-1)*$limit;
				
				$sql="select * from post 
                left join category on post.category=category.category_id
				left join user on post.author=user.user_id
				where post.title LIKE '%{$search_term}%' or post.description LIKE '%{$search_term}%'
				order by post.post_id desc limit {$offset},{$limit}";
				
                $result=mysqli_query($conn,$sql);
				
				if(mysqli_num_rows($result)>0){
					while($row = mysqli_fetch_assoc($result))
					{
						
						
			    ?>
                    <div class="post-content">
                        <div class="row">
                            <div class="col-md-4">
                                <a class="post-img" href="single.php?id=<?php echo $row["post_id"]?>"><img src="admin\upload\<?php echo $row['post_img']; ?>" alt=""/></a>
                            </div>
                            <div class="col-md-8">
                                <div class="inner-content clearfix">
                                    <h3><a href='single.php?id=<?php echo $row["post_id"]?>'><?php echo $row['title']?></a></h3>
                                    <div class="post-information">
                                        <span>
                                            <i class="fa fa-tags" aria-hidden="true"></i>
                                            <a href='category.php?cid=<?php echo $row["category_id"]?>'><?php echo $row['category_name']?></a>
                                        </span>
                                        <span>
                                            <i class="fa fa-user" aria-hidden="true"></i>
                                            <a href='author.php?aid=<?php echo $row["user_id"]?>'><?php echo $row['username']?></a>
                                        </span>
                                        <span>
                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                            <?php echo $row['post_date']?>
                                        </span>
                                    </div>
                                    <p class="description">
                                       <?php echo substr($row['description'],0,130) . "..."; ?>
										</p>
                                    <a class='read-more pull-right' href='single.php?id=<?php echo $row["post_id"]?>'>read more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                   
                    <?php 
					
					}
				}
				else{
					echo "file not found";
				}
				
			
				   $query="select * from post where post.title like '%{$search_term}%' ";
				 
				  $result1=mysqli_query($conn,$query);
				 
				  $rows=mysqli_fetch_assoc($result1);
				  if(mysqli_num_rows($result1)>0){
					  $total_records=mysqli_num_rows($result1);
					  
					  $total_page=ceil($total_records/$limit);
					  
					   echo "<ul class='pagination admin-pagination'>";
					   if($page>1){
						  echo'<li><a href="search.php?search='.$search_term.'&page='.($page-1).'">prev</a></li>';  
					   }
					  
					  for($i=1;$i<=$total_page;$i++){
						  if($i==$page){
							  $active='active';
							  
						  }
						  else{
							  $active="";
						  }
						  echo ' <li class="'.$active.'"><a href="search.php?search='.$search_term.'& page='.$i.'">'.$i.'</a></li>';
						  
					  }
					  if($total_page>$page){
					  echo '<li><a href="search.php?search='.$search_term.'&page='.($page+1).'">next</a></li>';
					  }
					echo'</ul>'; 
				  }
					   ?>
                   
				   
				 
                </div><!-- /post-container -->
            </div>
            <?php include 'sidebar.php'; ?>
        </div>
      </div>
    </div>
<?php include 'footer.php'; ?>
