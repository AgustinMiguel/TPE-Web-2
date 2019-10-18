    <h1>{"LOGIN"}</h1>
    <form method="post" action="startSesion">
      <div class="form-group">
        <label for="exampleInputEmail1">Usuario</label>
        <input type="text" class="form-control" name="user" id="user" aria-describedby="user" placeholder="user">
        </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" name="password" id="password" placeholder="password">
      </div>

      <button type="submit" class="btn btn-primary">Login</button>
    </form>
    </div>
    <form method="post" action="">
      <div>
        <button type="button" href="" class="btn btn-primary">Back</button>
      </div>
    </form>
{include file="footer.tpl"}
