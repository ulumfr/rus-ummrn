<div class="container">
    <div class="row">
        <div style="width:100%; padding-top:40px;">
            <h2>Researcher Detail</h2>
            <hr />
        </div>
        <div class="col-lg-3">
            <div class="text-container">
                <div class='image-wrapper' style="margin-bottom:10px;">
                    <img class='img-fluid' style="height:300px; width:250px;" src='images/ilyas.jpg' alt='alternative'>
                </div> 
            </div> <!-- end of text-container -->
        </div> <!-- end of col -->
        <div class='col-lg-9'>
            <?php
                include"koneksi.php";
                $sql="select researchers.name, cv.education,cv.teaching,cv.organization, cv.skill,  cv.awards, cv.topics, cv.publications,researchers.id_researcher from researchers, cv where researchers.id_researcher=cv.id_researcher and researchers.id_researcher=$_GET[id]";
                $query=mysqli_query($koneksi,$sql); 
                while($row=mysqli_fetch_array($query,MYSQLI_NUM)){
                    echo"                
                        <h2>$row[0]</h2><br />
                        <h4>Education:<h4>
                        <p>$row[1]</p>

                        <h4>Teaching Experinces:<h4>
                        <p>$row[2]</p>

                        <h4>Organizational Experiences:<h4>
                        <p>$row[3]</p>
                                
                        <h4>Skills:<h4>
                        <p>$row[4]</p>

                        <h4>Awards:<h4>
                        <p>$row[5]</p>

                        <h4>Topics of Research:<h4>
                        <p>$row[6]</p>

                        <h4>Publications:<h4>
                        <p>$row[7]</p>
                    ";
                }
                include"koneksi.php";
                $sq="select count(id_researcher) from cv where cv.id_researcher=$_GET[id]";
                $quer=mysqli_query($koneksi,$sq); 
                while($ro=mysqli_fetch_array($quer,MYSQLI_NUM)){
                if($ro[0]==0){
                    echo"<h6>Researcher's profile hasn't been updated.</h6>";
                }else{}
            }     
            ?>
        </div> <!-- end of col -->
    </div> <!-- end of row -->
</div> <!-- end of container -->