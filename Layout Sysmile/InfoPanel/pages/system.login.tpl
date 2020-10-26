{include file="../master/header_novo.tpl"}

<div class="wrapper wrapper-full-page">
    <div class="full-page login-page" data-color="green"><!--   you can change the color of the filter page using: data-color="blue | azure | green | orange | red | purple" -->
        <div class="content">
            <div class="container">
                <div class="row">                 
                    <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
                        <form method="post" action="/info/startSession">
                        <!--   if you want to have the card without animation please remove the ".card-hidden" class   -->
                            <div class="card">
                                <div class="header text-center">
									<img src="/styles/images/logo-h100.png" width="240">
								</div>
                                <div class="content">
                                    <div class="form-group">
                                        <label>Login</label>
                                        <input type="text" name="login" placeholder="Login" class="form-control" autofocus="autofocus">
                                    </div>
                                    <div class="form-group">
                                        <label>Senha</label>
                                        <input type="password" name="password" placeholder="Senha" class="form-control">
                                    </div>
                                </div>
                                <div class="footer text-center">
                                    <button type="submit" class="btn btn-fill btn-success btn-wd">Iniciar Sessão</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
	</div>
</div>

{include file="../master/footer_novo.tpl"}