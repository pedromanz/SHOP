<?php 
echo '<!-- Begin | Register Form -->
        <form action="phplogin.php" method="post" enctype="application/x-www-form-urlencoded">
            <div class="" align="center">
					<img class="img-circle" id="img_logo" src="http://bootsnipp.com/img/logo.jpg">
				</div>
            		    <div class="modal-body" align="center">
		    				<div id="div-register-msg">
                                <div id="icon-register-msg" class="glyphicon glyphicon-chevron-right"></div>
                                <span id="text-register-msg">Login de usuario.</span>
                            </div>
                            <input name="user" class="form-control" type="text" placeholder="Username" required></br>
                            <input name="pass" class="form-control" type="password" placeholder="Password" required></br>
            			</div>
		    		    <div class="modal-footer" align="center">
                            <div>
                                <input type="submit" class="btn btn-primary btn-lg btn-block" value="Entrar" />
                            </div>
		    		    </div>
                    </form>';
?>