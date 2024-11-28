
<div class="basic-2" style="padding-top:45px;">
    <div class="container">
        <div class="row">
             <div class="col-lg-12" style="text-align:left;">
                <h2>Researchers</h2>
                <hr />
                <?php
                include"koneksi.php";
                $sql="select * from researchers";
                $query=mysqli_query($koneksi,$sql);
                while($row=mysqli_fetch_array($query,MYSQLI_NUM)){
                    echo"
                    <a href='index.php?page=detilresearcher&id=$row[0]'>
                        <div class='team-member'>
                                <div class='image-wrapper'>
                                    <img class='img-fluid' src='images/ilyas.jpg' width=100 height=200 alt='alternative'>
                                </div> <!-- end of image-wrapper -->
                                <p class='p-large'>$row[1]</p>
                                <p class='job-title'>$row[2]</p>
                        </div> <!-- end of team-member -->
                        ";
                    }
                ?>
            </div> <!-- end of col -->
        </div> <!-- end of row -->
    </div> <!-- end of container -->
</div> <!-- end of basic-2 -->
<!-- end of team -->
