<div id ="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <span>© Copyright 2020 News | Powered by <?php  
				
                   include 'config.php';
                   $sql="select * from settings";
                   $result=mysqli_query($conn,$sql);
                   $row=mysqli_fetch_assoc($result);
                   echo $row['footer_desc']



				
				?></a></span>
            </div>
        </div>
    </div>
</div>
</body>
</html>
