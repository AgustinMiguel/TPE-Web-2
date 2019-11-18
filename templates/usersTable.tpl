  {include file="headerAdm.tpl"}
  <body>
  <div class="container-fluid">
    <table class="table table-hover">
      <thead class="thead-dark">
          <tr>
                  <th scope="col">Usuario</th>
                  <th scope="col">Permisos</th>
                  <th scope="col"></th>
                  <th scope="col"> </th>
                  <th scope="col"> </th>
                  <th scope="col"> </th>
                  <th scope="col"> </th>
            </tr>
          </thead>
        <tbody class="contenedor-tabla" >
          {foreach from=$users item=user}
            <tr>
                  <th scope="col"> {$user->usuario} </th>
                  <th scope="col"> {$user->adm} </th>
                  <th scope="col"> </th>
                  <th scope="col"> <a href="deleteUser/{$user->id} ">BORRAR</th>
                  <th scope="col"> <a href="giveAdmin/{$user->id}">DAR PERMISOS</th>
                  <th scope="col"> <a href="removeAdmin/{$user->id}">QUITAR PERMISOS</th>
                  <th scope="col">  </th>
            </tr>
        {/foreach}
      </tbody>
    </table>
  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  <script src="js/our.js" charset="utf-8"></script>
</body>
</html>
{include file='footer.tpl'}
