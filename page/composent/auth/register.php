<section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form action="/index.php?for=register_submission" method="POST">
                            <h2 class="card-header">Register</h2>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation">Confirm Password</label>
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Register</button>
                            
                            <div class="loginlik" style="margin-top:16px">
                                <span>Vous avez un compte.</span>
                                <a href="index.php?for=login" class="connectionlik">Connecter vous</a>
                            </div>
                        
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>