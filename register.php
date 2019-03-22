<?php 
    include "connection.php";
    $msg = "";
    if(isset($_POST["btn_register"])){
        $qr = mysqli_query($con, "select * from table_user where email='".mres($con, $_POST["email"])."'");
        if(mysqli_num_rows($qr)>0){
            $msg = '<div id="login-alert" class="alert alert-danger col-sm-12">This Email is already existed.</div>';
        }
        else{
            $qi = mysqli_query($con, "insert into table_user values('', '".mres($con, $_POST["username"])."', '".mres($con, $_POST["email"])."', '".mres($con, $_POST["fullname"])."', '".mres($con, md5($_POST["password"]))."')");
            if(($_POST["password"]) == ($_POST["password_confirm"])){
                $msg = '<div id="login-alert" class="alert alert-success col-sm-12">Thank You! Your registration is successful! Please <a href="login.php">login</a> now.</div>';
            }
        }
    }
 ?>
<?php include"header.php"; ?>

    <div class="row">
        <div class="container">
            <div style="margin-top: 50px;" class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                
                <!-- username panel starts here -->
                <?php echo $msg; ?>
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <div class="panel-title">Registration</div>
                    </div>
                    <div class="panel-body">
                        <form id="form_register" class="form-horizontal" rol="form" method="post" action='<?php echo $_SERVER["PHP_SELF"]; ?>'>
                            <div style="margin-bottom: 25px;" class="input-group">
                                <span class="input-group-addon">Fullname</span>
                                <input id="fullname" type="text" class="form-control" name="fullname" placeholder="fullname">
                            </div>
                            <div style="margin-bottom: 25px;" class="input-group">
                                <span class="input-group-addon">Username</span>
                                <input id="username" type="text" class="form-control" name="username" placeholder="username">
                            </div>
                            <div style="margin-bottom: 25px;" class="input-group">
                                <span class="input-group-addon">Email</span>
                                <input id="email" type="email" class="form-control" name="email" placeholder="email">
                            </div> 
                            <div style="margin-bottom: 25px;" class="input-group">
                                <span class="input-group-addon">Password</span>
                                <input id="password" type="password" class="form-control" name="password" placeholder="password">
                            </div>
                            <div style="margin-bottom: 25px;" class="input-group">
                                <span class="input-group-addon">Password (confirm)</span>
                                <input id="password_confirm" type="password" class="form-control" name="password_confirm" placeholder="password confirm">
                            </div>
                            <span id="msg"></span>
                            <div style="margin-top: 10px;" class="form-group">
                                <div class="col-sm-12 controls">
                                    <input type="submit" id="btn_register" name="btn_register" class="btn btn-info btn-block btn-large" value="Register">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include"footer.php"; ?>
        <script>
            $(document).ready(function(){
                $("#btn_register").click(function(e){
                    if ($('#fullname').val() == '') {
                        $('#fullname').css("border-color", "#DA190B");
                        $('#fullname').css("background", "#F2DEDE");
                        e.preventDefault();
                    }
                    if ($('#username').val() == '') {
                        $('#username').css("border-color", "#DA190B");
                        $('#username').css("background", "#F2DEDE");
                        e.preventDefault();
                    }
                    if ($('#password').val() == '') {
                        $('#password').css("border-color", "#DA190B");
                        $('#password').css("background", "#F2DEDE");
                        e.preventDefault();
                    }
                    if ($('#email').val() == '') {
                        $('#email').css("border-color", "#DA190B");
                        $('#email').css("background", "#F2DEDE");
                        e.preventDefault();
                    }
                    if ($('#password_confirm').val() == '') {
                        $('#password_confirm').css("border-color", "#DA190B");
                        $('#password_confirm').css("background", "#F2DEDE");
                        e.preventDefault();
                    }
                    if ($('#password').val() != $('#password_confirm').val()) {
                        $('#msg').html("Sorry! Password is not matched.")
                        e.preventDefault();
                    }
                    else {
                        $('form_register').unbind('submit').submit();
                    }
                });
            });
        </script>
	</body>
</html>