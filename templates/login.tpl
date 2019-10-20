{include file="header.tpl"}
    <h1>LOGIN</h1>
    <form method="post" action="verificarLogin">
      <div class="form-group">
        <label for="exampleInputEmail1">Usuario</label>
        <input type="input" class="form-control" name="user" id="user" aria-describedby="usuarioId" placeholder="Enter email">
        </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" name="password" id="password" placeholder="password">
      </div>
      <button type="submit" class="btn btn-primary">Login</button>
    </form>
    </div>
{include file="footer.tpl"}
