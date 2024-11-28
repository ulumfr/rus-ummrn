    <!-- Description -->
    <div class="cards-1">
    <div class="container">
        <div class="row">
            <div style="width:100%; padding-bottom:25px;">
                <h2>Communities of Practice</h2>
                <hr />
            </div>
        <div class="col-lg-12">
                <?php
                include"koneksi.php";
                $sql="select cops.id_cop,cops.name,cops.description,researchers.name from cops,researchers where cops.id_researcher=researchers.id_researcher";
                $query=mysqli_query($koneksi,$sql);
                while($row=mysqli_fetch_array($query,MYSQLI_NUM)){
                    echo"
                    <!-- Card -->
                    <div class='card'>
                        <span class='fa-stack'>
                            <span class='hexagon'></span>
                            <i class='fas fa-binoculars fa-stack-1x'></i>
                        </span>
                        <div class='card-body'>
                            <a style='text-decoration:none;' href='index.php?page=detilcop&id=$row[0]'>
                                <h4 class='card-title'>$row[1]</h4>
                            </a>
                            <p>$row[2]</p>
                            <p/>Author: <br /><a style='text-decoration:none;' href='index.php?page=detilresearcher&id=$row[0]'>$row[3]</a><br />
                            ";
                            
                            echo"
                            <p/>Member:<br />
                            ";
                            $sqls="select students.name from students,cops,members where students.id_student=members.id_student and cops.id_cop=members.id_cop and cops.id_cop=$row[0]";
                            $n=0;
                            $querys=mysqli_query($koneksi,$sqls);
                            while($rows=mysqli_fetch_array($querys,MYSQLI_NUM)){
                                $n++;
                                echo"
                                    $n. $rows[0] <br />";
                            }
                            echo"
                        </div>
                    </div>
                    <!-- end of card -->
                        ";
                    
                    }
                ?>
            </div> <!-- end of col -->
            </a>
        </div> <!-- end of row -->
    </div> <!-- end of container -->
</div> <!-- end of cards-1 -->
<!-- end of description -->
