<section class="inner-page" id="login">
    <div class="container" id="login_container">
        <div id="login-row" class="row justify-content-center align-items-center">
            <div id="login-column" class="col-md-6 px-2 py-5">
                <div id="login-box" class="col-md-12">
                    <form id="login-form" class="form" action="index.php" method="post"> 
                        <h3 class="text-center text-light">Connexion</h3>
                        <?php 
                            if(isset($_GET['erreur'])){
                                echo ' <div class="alert alert-danger m-3 " role="alert">
                                    Le nom d\'utilisateur ou  le mot de passe est incorrect !
                                </div>';
                            }
                        ?>
                        <div class="form-group mt-3 m-auto w-75">
                            <label for="username" class="text-light mb-1">Nom d'utilisateur:</label><br>
                            <input type="text" name="username" id="username" class="form-control">
                        </div>
                        <div class="form-group mt-3 m-auto w-75">
                            <label for="password" class="text-light mb-1">Mot de passe:</label><br>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>
                        <div class="form-group mt-3 m-auto w-75">
                            <input type="submit" name="submit" class="btn btn-info btn-md text-light mt-2" value="Connexion">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>