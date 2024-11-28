<div class="container" style="padding-bottom:40px";>
    <div class="row">
        <div style="width:100%; padding-top:40px;">
                <h2>Login Here!</h2>
                <hr />
        </div>      
        <div class="col-lg-6">
            <div class="text-container">
                <form name="logForm" method="POST" action="login.php">
                    <div class="form-group">
                        <input type="text" name="usr" class="form-control-input" value="" id="cname" required>
                        <label class="label-control" for="cname">Username:</label>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <input type="password" name="psw" class="form-control-input" value="" id="cemail" required>
                        <label class="label-control" for="cemail">Password:</label>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" value="LOGIN" class="form-control-submit-button" style="float:left; width:50%;"/>
                        <span style="padding-left:25px;"> <a href="index.php?page=register">Click here to register!</a></span>
                    </div>
                </form>
            </div> <!-- end of text-container -->
        </div> <!-- end of col -->
        <?php
            if($_GET['stat']=="false"){
                echo" <font color=red> <b>Access denied.</b></font>";
            }else{}
        ?>
    </div> <!-- end of row -->
</div> <!-- end of container -->
