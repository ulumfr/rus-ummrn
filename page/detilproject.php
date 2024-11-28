        <div class="container">
            <div class="row"><div style="width:100%; padding-top:40px;">
                <h2>Project Detail</h2>
                <hr />
            </div>
            <div class="col-lg-3">
                <div class="text-container">
                    <div class='image-wrapper'>
                        <img class='img-fluid' style="height:200px; width:350px; margin-bottom:10px;" src='images/hexagon-green.svg' alt='alternative'>
                    </div> 
                </div> <!-- end of text-container -->
            </div> <!-- end of col -->
            <div class="col-lg-9"> 
                <?php
                        include"koneksi.php";
                        $sql="select * from projects where id_project=$_GET[id]";
                        $query=mysqli_query($koneksi,$sql); 
                        while($row=mysqli_fetch_array($query,MYSQLI_NUM)){
                        echo"                
                                <h2>$row[2]</h2>
                                <h6><i>$row[4]</i></h6>
                                Publication: $row[3]<br />
                                Status: $row[6]<br />
                                <p>
                                <p>Attachment: <a href='$row[5]'>$row[5]</a></p>
                        ";
                        }
                        ?>  
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
