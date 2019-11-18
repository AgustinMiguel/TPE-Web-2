{include file="header.tpl"}
<form method="post" action="insertUser">
  <div class="form-group">
    <label for="exampleInputEmail1">User address</label>
    <input type="text" class="form-control" id="usuario" placeholder="Enter user" name="usuario">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="mail" aria-describedby="emailHelp" placeholder="Enter email" name="mail">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="password" placeholder="password" name="password">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
{include file="footer.tpl"}
