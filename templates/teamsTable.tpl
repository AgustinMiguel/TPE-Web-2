{if $admin eq true}
  {include file="headerAdm.tpl"}
{else}
  {if $login eq true}
    {include file="headerLogout.tpl"}
  {else}
    {include file="header.tpl"}
  {/if}
{/if}
  <body>
  <div class="container-fluid">
    <table class="table table-hover">
      <thead class="thead-dark">
          <tr>
                  <th scope="col">Equipo</th>
                  <th scope="col">PG</th>
                  <th scope="col">PP</th>
                  <th scope="col"> </th>
                  <th scope="col"> </th>
                  <th scope="col"> </th>
                  <th scope="col"> </th>
            </tr>
          </thead>
        <tbody class="contenedor-tabla" >
          {foreach from=$equipos item=equipo}
            <tr>
                  <th scope="col"> {$equipo->nombre_equipo} </th>
                  <th scope="col"> {$equipo->partidos_ganados} </th>
                  <th scope="col"> {$equipo->partidos_perdidos} </th>
                  {if $admin eq true}
                  <th scope="col"> <a href="deleteTeam/ {$equipo->id_equipo} ">BORRAR</th>
                  <th scope="col"> <a href="editTeam/ {$equipo->id_equipo} ">EDITAR</th>
                  <th scope="col"> <a href="showPlayers/{$equipo->id_equipo}">VER MAS</th>
                  {else}
                  <th scope="col"> </th>
                  <th scope="col"> </th>
                  <th scope="col"> <a href="showPlayers/{$equipo->id_equipo}">VER MAS</th>
                  {/if}
            </tr>
        {/foreach}
      </tbody>
    </table>
  </div>
{if $admin eq true}
  <div class="container-fluid">
    <br>
    <br>
    <h2>Equipo</h2>
    <form method="post" action="addTeam">
      <div class="form-group">
        <label for="equipoForm">Nombre Equipo</label>
        <input type="text" class="form-control" id="equipoForm" name="nombre_equipo">
      </div>
      <div class="form-group">
        <label for="ganadosForm">Partidos ganados</label>
        <input type="text" class="form-control" id="ganadosForm" name="partidos_ganados">
      </div>
      <div class="form-group">
        <label for="perdidosForm">Partidos perdidos</label>
        <input type="text" class="form-control" id="perdidosForm" name="partidos_perdidos">
      </div>
      <button type="submit" class="btn btn-primary">Agregar Equipo</button>
    </form>
  </div>
  {/if}
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  <script src="js/our.js" charset="utf-8"></script>
</body>
</html>
{include file='footer.tpl'}
