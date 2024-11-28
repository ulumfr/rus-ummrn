        <div class="container">
            <div class="row">            
            <div style="width:100%; padding-top:50px;"></div>
                <div class="col-lg-5">
                    <div class="text-container">
                        <h2>Register Here!</h2>
                        <hr />
                        
                        <form name="RegForm" method="POST" action="index.php?page=registeraction">
                            <div class="form-group">
                                <input type="text" class="form-control-input" name="name" value="" id="cname" required>
                                <label class="label-control" for="cname">Name</label>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control-input" name="nim" value="" id="cemail" required>
                                <label class="label-control" for="cemail">Student ID</label>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control-input" name="phone" value="" id="cname" required>
                                <label class="label-control" for="cname">Phone</label>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control-input" name="email" value="" id="cemail" required>
                                <label class="label-control" for="cemail">Email</label>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control-input" name="usr" value="" id="cemail" required>
                                <label class="label-control" for="cemail">Username</label>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control-input" name="psw" value="" id="psws" required>
                                <label class="label-control" for="cemail">Password</label>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control-input" name="psw" value="" id="pswsnew" required>
                                <label class="label-control" for="cemail">Confirm Password</label>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control-textarea" name="description" id="cmessage" required></textarea>
                                <label class="label-control" for="cmessage">About you</label>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group checkbox">
                                <input type="checkbox" id="cterms" value="Agreed-to-Terms" required>I agree with UMMRN's Terms and Serices</a> 
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="form-control-submit-button" value="REGISTER" />
                            </div>
                            <!--
                            <div class="form-message">
                                <div id="cmsgSubmit" class="h3 text-center hidden"></div>
                            </div>
                            -->
                        </form>
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
                <div class="col-lg-7"> 
                        <h2>Terms and Services</h2>
                        <hr />
                        <p style="line-height:35px;"><b>Please read carefully before using the UMMRN Services:</b> <br />
                        1. UMMRN only provides service, not content. UMMRN is not responsible for all data that has been submitted to the application.<br />
                        2. The member must be registered at Universitas Muhammadiyah Malang, either as lecturers of students. <br />
                        3. The members must provide valid data. <br />
                        4. UMMRN has the right to stop or continue the service.<br />
                        5. UMMRN is under the authority of Universitas Muhammadiyah Malang.
                        </p>
                        
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
<script type="text/javascript">
    var ps=document.getElementById("psws");
    var psnew=document.getElementById("pswsnew");

    function validatePsw(){
        if(ps.value!=psnew.value){
            psnew.setCustomValidity("Password doesn't match!");
        }else{
            psnew.setCustomValidity('');
        }
    }

    ps.onChange=validatePsw;
    psnew.onkeyup=validatePsw;
</script>