<?php 
    include "connection.php";
    if(isset($_POST["btn_register"])){
        echo "hello";
    }
 ?>
<?php include"header.php"; ?>

    <div class="row">
        <div class="container">
            <div style="margin-top: 50px;" class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                
                <!-- username panel starts here -->
                <div class="panel panel-info" style='display:<?php echo $form_username; ?>'>
                    <div class="panel-heading">
                        <div class="panel-title">Registration</div>
                    </div>
                    <div class="panel-body">
                        <?php echo $msg_username; ?>
                        <form id="form_register" class="form-horizontal" rol="form" method="post" action='<?php echo $_SERVER["PHP_SELF"]; ?>'>
                            <div style="margin-bottom: 25px;" class="input-group">
                                <span class="input-group-addon">Username</span>
                                <input id="username" type="text" class="form-control" name="username" placeholder="username">
                            </div> 
                            <div style="margin-bottom: 25px;" class="input-group">
                                <span class="input-group-addon">Password</span>
                                <input id="password" type="password" class="form-control" name="password" placeholder="password">
                            </div>
                            <div style="margin-bottom: 25px;" class="input-group">
                                <span class="input-group-addon">Email</span>
                                <input id="email" type="email" class="form-control" name="email" placeholder="email">
                            </div>
                            <div style="margin-bottom: 25px;" class="input-group">
                                <span class="input-group-addon">Email (confirm)</span>
                                <input id="email_confirm" type="email" class="form-control" name="email_confirm" placeholder="email confirm">
                            </div>
                            <div style="margin-top: 10px;" class="form-group">
                                <div class="col-sm-12 controls">
                                    <input type="submit" id="btn_register" name="btn_register" class="btn btn-info btn-block btn-large" value="Register">
                                </div>
                                <span id="msg"></span>
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
                    if ($('#email_confirm').val() == '') {
                        $('#email_confirm').css("border-color", "#DA190B");
                        $('#email_confirm').css("background", "#F2DEDE");
                        e.preventDefault();
                    }
                    if ($('#email').val() != $('#email_confirm').val()) {
                        $('#msg').html("Sorry! Email and confirm email are not the same")
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