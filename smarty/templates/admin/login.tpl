<div id="wrap_login">
  <div id="container_logo">
    <div id="logo">
      <h1>
        <span class="none">
          SysProJur - Sistema de Controle de Processos Jur�dicos
        </span>
      </h1>
    </div>
  </div>
  <div id="container_login">
    <form action="login.php_" method="post" id="formLogin" onSubmit="ControleAcesso.entrarSistema(); return false;">
      <input type="hidden" name="ACTION" value="FazerLoginAction" />
      <fieldset>
      <legend>Digite sua informa��es</legend>
      <div class="information">
        <strong id="msg">Preencha os dados para entrar:</strong>
        <p>
          <label for="formLogin_login" class="label">Login:</label>
          <input type="text" name="login" id="formLogin_login" class="input-login"  style=" width: 210px " />
        </p>
        <p>
          <label for="formLogin_senha" class="label">Senha:</label>
          <input type="password" name="senha" id="formLogin_senha" class="input-login" style=" width: 210px " />
        </p>
        <p class="check">
          <input type="checkbox" name="lembrar" id="lembrar" />
          <label for="lembrar">Lembrar Senha</label>
        </p>
        <input  type="submit" value="Entrar" class="button-login" style="margin-top: -2px; padding-bottom: 7px; padding-top: 2px; cursor: pointer;"/>
        <span class="mysenha none">
          <a href="javascript:;" onClick="js.sendMail()">Esqueci<br/>
          &nbsp;&nbsp;&nbsp;minha<br/>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;senha</a>
        </span>
      </div>
      </fieldset>
    </form>
  </div>
  <div class="recuperar" id="recuperar" style="display:none;">
    <form action="recuperar.php" method="post">
      <fieldset>
      <legend>Digite seu email</legend>
      <strong>Esqueceu sua senha?</strong>
      <span>
        Digite o seu email para iniciar o processo de recupera��o da senha.
      </span>
      <p>
        <label for="email_recup">Email:</label>
        <input type="text" name="email_recup" id="email_recup"/>
        <input type="submit" value="Enviar" id="button_send"/>
      </p>
      </fieldset>
    </form>
  </div>
  <div class="clear">
  </div>
</div>
