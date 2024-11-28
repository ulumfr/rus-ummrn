<div class="container">
    <div class="row">
        <div style="width:100%; padding-top:40px;">
            <h2>Project Detail</h2>
            <hr />
        </div>
        <div class="col-lg-3">
            <div class="text-container">
                <div class='image-wrapper'>
                    <img class='img-fluid' style="height:200px; width:350px; margin-bottom:10px;" src='images/hexagon-green.svg' alt='alternative'>
                </div>
            </div>
        </div>
        <div class="col-lg-9">
            <?php
            include "koneksi.php";

            $sql = "SELECT * FROM projects WHERE id_project=$_GET[id]";
            $query = mysqli_query($koneksi, $sql);
            $project = mysqli_fetch_array($query, MYSQLI_ASSOC);

            echo "
                <h2>{$project['title']}</h2>
                <h6><i>{$project['description']}</i></h6>
                <p>Publication Year: {$project['published_year']}</p>
                <p>Status: {$project['status']}</p>
                <p>Attachment: <a href='{$project['attachment']}'>{$project['attachment']}</a></p>
            ";

            if ($project['status'] == 'Open') {
                echo "
                    <div class='mt-4'>
                        <h4>Add a Comment</h4>
                        <form action='index.php?page=add-comments' method='POST'>
                            <div class='mb-3'>
                                <textarea class='form-control' name='comment' rows='3' required placeholder='Write your comment here...'></textarea>
                            </div>
                            <input type='hidden' name='id_project' value='{$_GET['id']}'>
                            <button type='submit' class='btn text-white' style='background-color:#113448'>Submit Comment</button>
                        </form>
                    </div>
                ";
            } else {
                echo "<p class='mt-4 text-danger'>Comments can only be added when the project is 'Open'.</p>";
            }
            ?>
        </div> 
    </div> 

    <div class="row my-5">
        <div class="col-lg-12">
            <h3>List Comments</h3>
            <hr />
            <div class="list-group">
                <?php
              
                $comment_sql = "SELECT c.comment, c.comment_date, s.name, c.id_student
                            FROM comments c 
                            JOIN students s ON c.id_student = s.id_student 
                            WHERE c.id_project=$_GET[id] 
                            ORDER BY c.comment_date DESC";
                $comment_query = mysqli_query($koneksi, $comment_sql);

                $comments_grouped = [];

                while ($comment = mysqli_fetch_assoc($comment_query)) {
                    $comments_grouped[$comment['id_student']][] = $comment;
                }

                foreach ($comments_grouped as $id_student => $comments) {
                    $first_comment = true; 
                    echo "<div class='list-group-item'>";
                    echo "<h5 class='mb-1'>{$comments[0]['name']}</h5>";

                    foreach ($comments as $comment) {
                        if (!$first_comment) {
                            echo "<hr class='my-2'/>"; 
                        }
                        echo "
                    <small class='text-muted'>{$comment['comment_date']}</small>
                    <p class='mb-1'>{$comment['comment']}</p>
                    ";
                        $first_comment = false;
                    }
                    echo "</div>";
                }
                ?>
            </div>
        </div>
    </div>

</div>