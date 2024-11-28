<div class="container">
    <div class="row">
        <div style="width:100%; padding-top:50px;">
            <h2>Join this Project</h2>
            <hr />
        </div>

        <div class="col-lg-6">
            <div class="text-container">
                <h3>Requirements and Rules</h3>
                <p>Please read the requirements and rules carefully before submitting your request.</p>
                <?php
                include "koneksi.php";
                $sql = "select * from cfps where id_cfp=1";
                $query = mysqli_query($koneksi, $sql);
                while ($row = mysqli_fetch_array($query, MYSQLI_NUM)) {
                    echo "$row[2]";
                }
                ?>
                <p />
                <p>Need more information about this project? Feel free to contact us at:
                <ul class="list-unstyled li-space-lg" style="margin-top:3px;">
                    <li class="address"><i class="fas fa-map-marker-alt"></i> Kantor Program Studi Informatika, Universitas Muhammadiyah Malang, Room No. 13</li>
                    <li><i class="fas fa-phone"></i> <a style="text-decoration:none;" href="tel:081553114556">+62 81 553 114 556</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <i class="fas fa-envelope"></i> <a style="text-decoration:none;" href="mailto:ilyas@umm.ac.id">ilyas@umm.ac.id</a>
                    </li>
                </ul>
            </div> <!-- end of text-container -->
        </div> <!-- end of col -->
        <div class="col-lg-6">
            <?php
            session_start();
            if (isset($_SESSION['userid']) && is_numeric($_SESSION['userid'])) {
                include "koneksi.php";
                $sql = "SELECT * FROM students WHERE id_student = ?";
                $stmt = $koneksi->prepare($sql);
                $stmt->bind_param("i", $_SESSION['userid']);
                $stmt->execute();
                $result = $stmt->get_result();

                $id = $_GET['id'];
                while ($row = $result->fetch_array(MYSQLI_NUM)) {
                    echo "
                    <!-- Contact Form -->
                    <form name='logFormJoin' method='POST' action='index.php?page=joinaction'>
                        <div class='form-group'>
                            <input style='font-weight:bold; padding-top:30px;' type='text' name='name' class='form-control-input' id='cname' value='$row[1]' readonly />
                            <label class='label-control' for='cmessage'>Name</label>
                            <input type=hidden name='studentid' value='$row[0]'/>
                            <input type=hidden name='projectid' value='$id'/>
                            
                        </div>
                        <div class='form-group'>
                            <input style='font-weight:bold; padding-top:30px;' type='text' name='nim' class='form-control-input' id='cemail' value='$row[2]' readonly />
                            <label class='label-control' for='cmessage'>Student ID</label>
                            
                        </div>
                        <div class='form-group'>
                            <input style='font-weight:bold; padding-top:30px;' type='text' name='phone' class='form-control-input' id='cemail' value='$row[3]' readonly />
                            <label class='label-control' for='cmessage'>Phone</label>
                            
                        </div>
                        <div class='form-group'>
                            <textarea name='motivation' class='form-control-textarea' id='cmessage' required></textarea>
                            <label class='label-control' for='cmessage'>Motivation</label>
                            <div class='help-block with-errors'></div>
                        </div>
                        <div class='form-group'>
                            <button type='submit' class='form-control-submit-button'>SUBMIT</button>
                        </div>
                        <div class='form-message'>
                            <div id='cmsgSubmit' class='h3 text-center hidden'></div>
                        </div>
                    </form>
                    <!-- end of contact form -->
                    ";
                }
            } else {
                echo "<a href='index.php?page=login'><b>Login first to join this project!</b></a>";
            }
            ?>
        </div> <!-- end of col -->
    </div> <!-- end of row -->
</div> <!-- end of container -->