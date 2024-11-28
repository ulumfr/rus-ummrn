    <!-- Description -->
    <div class="cards-1">
    <div class="container">
        <div class="row">

        <div style="width:100%;">
                <h2>Notifications</h2>
                <hr />
            </div>
            
            
            <div class="col-lg-12">
                <?php
                include"koneksi.php";
                $sql="select projects.id_project, projects.title,researchers.name, joinresearch.status from projects,researchers,joinresearch where projects.id_researcher=researchers.id_researcher and joinresearch.id_project=projects.id_project and joinresearch.id_student=$_SESSION[userid]";
                $query=mysqli_query($koneksi,$sql);
                while($row=mysqli_fetch_array($query,MYSQLI_NUM)){
                    if($row[3]=="Waiting for Approval"){
                        $color="blue";
                    }else if($row[3]=="Accepted"){
                        $color="#14BF98";
                    }else{
                        $color="red";
                        $t="Sorry, this project has reached the quota limit.";
                    }
                    echo"
                    <!-- Card -->
                    <div class='card'>
                        <span class='fa-stack'>
                            <span class='hexagon'></span>
                            <i class='fas fa-binoculars fa-stack-1x'></i>
                        </span>
                        <div class='card-body'>
                            <h4 class='card-title'>$row[1]</h4>
                            <p>Publisher: <b>$row[2]</b></p>
                            <p><font color='$color'><b>$row[3]</b><br />$t</font></p>
                        </div>
                    </div>
                    <!-- end of card -->
                        ";
                    
                    }
                ?>
            </div> <!-- end of col -->
        </div> <!-- end of row -->
    </div> <!-- end of container -->
</div> <!-- end of cards-1 -->
<!-- end of description -->
