    <!-- Description -->
    <div class="cards-1">
    <div class="container">
        <div class="row">
            <div style="width:100%; padding-bottom:25px;">
                <h2>Call for Projects</h2>
                <hr />
            </div>
            
            <div class="col-lg-12">
                <?php
                include"koneksi.php";
                $sql="select projects.id_project, projects.title,researchers.name, cfps.quota,cfps.funding,cfps.deadline from projects,researchers,cfps where projects.id_project=cfps.id_project and projects.id_researcher=researchers.id_researcher";
                $query=mysqli_query($koneksi,$sql);
                while($row=mysqli_fetch_array($query,MYSQLI_NUM)){
                    $rp=number_format($row[4],2,",",".");
                    echo"
                    <!-- Card -->
                    <div class='card'>
                        <span class='fa-stack'>
                            <span class='hexagon'></span>
                            <i class='fas fa-binoculars fa-stack-1x'></i>
                        </span>
                        <div class='card-body'>
                            <h4 class='card-title'>$row[1]</h4>
                            <p>By <b>$row[2]</b></p>
                            <p><font color=blue>Funded, approximaly Rp $rp</font></p>
                            Quota: $row[3]
                            <p>Deadline: $row[5]  <a href='index.php?page=join&id=$row[0]'>[ JOIN ]</a></p>
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
