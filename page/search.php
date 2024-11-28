<div class="container">
        <div class="row" style="padding-top:40px;padding-bottom:75px;";>
        <div class="col-lg-3">
        <?php
                $key=$_POST['key'];
                if(empty($key)){
                        $key=$_GET['key'];
                }else{
                        $key=$key;
                }
                echo"<h4>We find term <q>$key</q> in categories below:</h4> 
                ";
        ?>
                <hr />
                <div class="text-container">
                <?php
                        include"koneksi.php";
                        $s1="select count(name) from researchers where name like '%$key%'";
                        $q1=mysqli_query($koneksi,$s1);
                        $r1=mysqli_fetch_array($q1);
                        $s2="select count(name) from cops where name like '%$key%'";
                        $q2=mysqli_query($koneksi,$s2);
                        $r2=mysqli_fetch_array($q2);
                        $s3="select count(title) from projects where title like '%$key%'";
                        $q3=mysqli_query($koneksi,$s3);
                        $r3=mysqli_fetch_array($q3);
                        echo"
                <p />
                <h6><a  style='text-decoration:none;' href='index.php?page=search&section=1&key=$key'>Researchers ($r1[0])</a></h6><p />
                <h6><a  style='text-decoration:none;' href='index.php?page=search&section=2&key=$key'>Communities of Practice ($r2[0])</a></h6><p />
                <h6><a  style='text-decoration:none;' href='index.php?page=search&section=3&key=$key'>Projects ($r3[0])</a></h6> 
                ";
                ?>
                
                </div> <!-- end of text-container -->
        </div> <!-- end of col -->
        <div class="col-lg-9" style="border-left:1px solid lightgray;"> 
        <h5>Results:</h5> <p/>
        <hr />
                <?php
                        $sect=$_GET['section'];
                        if($sect==1){
                                include"koneksi.php";
                                $s="select *from researchers where name like '%$key%'";
                                $q=mysqli_query($koneksi,$s);
                                while($r=mysqli_fetch_array($q)){
                                        echo"
                                        <div>
                                                <h6><a href='index.php?page=researchers&id=$r[0]'>$r[1]</a></h6>
                                        </div>
                                        ";
                                }
                        }else if($sect==2){
                                include"koneksi.php";
                                $s="select * from cops where name like '%$key%'";
                                $q=mysqli_query($koneksi,$s);
                                while($r=mysqli_fetch_array($q)){
                                        echo"
                                        <div>
                                                <h6><a href='index.php?page=detilcop&id=$r[0]'>$r[2]</a></h6>
                                        </div>
                                        ";
                                }
                        }else if($sect==3){
                                include"koneksi.php";
                                $s="select * from projects where title like '%$key%'";
                                $q=mysqli_query($koneksi,$s);
                                while($r=mysqli_fetch_array($q)){
                                        echo"
                                        <div>
                                                <h6><a href='index.php?page=detilproject&id=$r[0]'>$r[2]</a></h6>
                                        </div>
                                        ";
                                }
                        }else{
                                echo"Redefine your keywords to get specific information you need.";
                        }
                       
                ?>
        </div> <!-- end of col -->
        </div> <!-- end of row -->
</div> <!-- end of container -->
