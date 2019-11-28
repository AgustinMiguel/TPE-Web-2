{include file="header.tpl"}
<form method="post" action="recoverPass">
  <div class="form-group">
    <label for="exampleInputEmail1">Ingresa tu usuario</label>
    <input type="text" class="form-control" id="usuario" placeholder="Enter user" name="usuario">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Igresa tu mail</label>
    <input type="email" class="form-control" id="mail" aria-describedby="emailHelp" placeholder="Enter email" name="mail">
    <small id="emailHelp" class="form-text text-muted">Te enviaremos tu nueva password a este mail</small>
  </div>
  <button type="submit" class="btn btn-primary">Recuperala</button>
</form>
{include file="footer.tpl"}
