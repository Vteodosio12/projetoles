{include file="../../master/header2.tpl"}

{include file="../../master/renderTopBody2.tpl"}

<div class="step">
    <form method="post" action="/info/alterPass" id="alterarSenha">
		
		 {if $status == 1}<div class="alert alert-success" role="alert">Senha alterada com sucesso!</div>{/if}
        {if $smarty.get.error}
        <div class="alert alert-danger">
            {if $smarty.get.error eq "445511"}
            <strong>Atenção</strong> As senhas são iguais
            {elseif $smarty.get.error eq "445512"}
            <strong>Atenção</strong> A senha é a mesma que a antiga
            {else}
            <strong>Atenção</strong> Error ao alterar a senha, contate o administrador
            {/if}
        </div>
        {/if}

        <div class="form-group">
            <label for="oldPassword">Nova senha</label>
            <input type="password" name="oldpassword" class="form-control" minlength="6" maxlength="10" placeholder="Senha Antiga" required="required">
        </div>

        <div class="form-group">
            <label for="newPassword">Repita Nova Senha</label>
            <input type="password" name="newPassword" class="form-control" minlength="6" maxlength="10" placeholder="Nova senha" required="required">
        </div>

        <button type="submit" class="btn btn-default">Enviar</button>
    </form>
</div>

{include file="../../master/renderBottomBody.tpl"}

{include file="../../master/footer.tpl"}