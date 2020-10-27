<?php /* Smarty version Smarty-3.1.13, created on 2020-10-26 19:58:12
         compiled from "C:\xampp\htdocs\sysmile\engine\view\InfoPanel\master\renderTopBody2.tpl" */ ?>
<?php /*%%SmartyHeaderCode:61145f7c9bdece3484-58361786%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4ff16a867f68e4841b85a259f0c74e6b6289acc2' => 
    array (
      0 => 'C:\\xampp\\htdocs\\sysmile\\engine\\view\\InfoPanel\\master\\renderTopBody2.tpl',
      1 => 1603753064,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '61145f7c9bdece3484-58361786',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5f7c9bdee48b46_59538545',
  'variables' => 
  array (
    'inf' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5f7c9bdee48b46_59538545')) {function content_5f7c9bdee48b46_59538545($_smarty_tpl) {?><div class="navbar navbar-default navbar-static-top header">
    <img src="/styles/images/logo-h40.png" alt="" class="img-responsive logo pull-left" />
	
    <div class="btn-group pull-right user">
        <span type="button" class="btn dropdown-toggle" data-toggle="dropdown"><?php echo $_smarty_tpl->tpl_vars['inf']->value->name;?>
<span class="caret"></span></span>
        <ul class="dropdown-menu" role="menu">
			<li><a href="/info/cadastros">Cadastros</a></li>
            <li class="divider"></li>
            <li><a href="/info/pacientes">Pacientes</a></li>
            <li class="divider"></li>
            <li><a href="/info/usuarios">Usuários</a></li>
            <li class="divider"></li>
            <li><a href="/info/changePass">Alterar Senha</a></li>
            <li class="divider"></li>
            <li><a href="/info/logout">Encerrar Sessão</a></li>
        </ul>
	</div>
</div>

<div class="row">
        <div class="col-md-2 left-menu visible-md visible-lg">
        <ul id="side-nav" class="side-nav">			
			<li class="panel"><a href="/info/cadastros">Cadastros</a></li>
			<li class="panel"><a href="/info/pacientes">Pacientes</a></li>
			<li class="panel"><a href="/info/usuarios">Usuários</a></li>
            <li class="panel"><a href="/info/changePass">Alterar Senha</a></li>
            <li class="panel"><a href="/info/logout">Encerrar Sessão</a></li>
        </ul>
		
    </div>

    <div class="col-md-10 main"><?php }} ?>