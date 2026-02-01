<section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form action="/index.php?for=login_user" method="POST">
                            <h2 class="card-header">Login</h2>
                            <div class="form-group">
                                <label for="username">Username or Email</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Login</button>
                            
                            <div class="loginlik" style="margin-top:16px">
                                <span>Vous n'avez pas de compte.</span>
                                <a href="index.php?for=register" class="connectionlik">Inscrivez vous</a>
                            </div>
                        
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>