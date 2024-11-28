    <!-- Description -->
<div class="cards-1">
    <div class="container">
        <div class="row">
            <div style="width:100%; padding-bottom:35px;">
                <h2>Projects</h2>
                <hr />
            </div>
            <div class="col-lg-12">
                <?php
                include"koneksi.php";
                $sql="select projects.id_project, projects.title,projects.status,researchers.name, projects.published_year from projects, researchers where projects.id_researcher=researchers.id_researcher order by projects.published_year desc";
                $query=mysqli_query($koneksi,$sql);
                while($row=mysqli_fetch_array($query,MYSQLI_NUM)){
                    if($row[2]=="Active"){
                        $color="#14BF98";
                    }else if($row[2]=="Open"){
                        $color="blue";
                    }else{
                        $color="black";
                    }
                    echo"
                    <!-- Card -->
                    <div class='card'>
                        <span class='fa-stack'>
                            <span class='hexagon'></span>
                            <i class='fas fa-chart-pie fa-stack-1x'></i>
                        </span>
                        <div class='card-body'>
                            <a style='text-decoration:none;' href='index.php?page=detilproject&id=$row[0]'>
                                <h4 class='card-title'>$row[1]</h4>
                            </a>
                            <p>By <b>$row[3]</b> at $row[4]</p>
                            <p><font color='$color'><b>$row[2]</b></font></p>
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
