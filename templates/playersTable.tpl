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
                  <th scope="col">Nombre</th>
                  <th scope="col">Procedencia</th>
                  <th scope="col">Nombre Equipo </th>
                  <th scope="col"> </th>
                  <th scope="col"> </th>
                  <th scope="col"> </th>
            </tr>
          </thead>
        <tbody class="contenedor-tabla" >
          {foreach from=$players item=player}
            <tr>
                  <th scope="col">{$player->nombre_jugador}</th>
                  <th scope="col">{$player->procedencia}</th>
                  <th scope="col">{$player->nombre_equipo}</th>
                  {if $admin eq true}
                  <th scope="col"> <a href="deletePlayer/{$player->id_jugador}">BORRAR</th>
                  <th scope="col"> <a href="editPlayer/{$player->id_jugador}">EDITAR</th>
                  <th scope="col"> <a href="addImagenPlayer/{$player->id_jugador}">AGREGAR IMAGEN</th>
                  {/if}
                  <th scope="col"> <a href="showPlayer/{$player->id_jugador}">VER MAS</th>
            </tr>
        {/foreach}
      </tbody>
    </table>
  </div>

  <form method="get" action="orderPlayers" enctype="multipart/form-data">
    <button type="submit" class="btn btn-dark">Ordenar Jugadores</button>
  </form>
{if $admin eq true}
  <div class="container-fluid">
    <br>
    <br>
    <h2>Jugador</h2>
    <form method="post" action="addPlayer" enctype="multipart/form-data">
      <div class="form-group">
        <label for="nombreForm">Nombre Jugador :</label>
        <input type="text" class="form-control" id="nombre_jugador" name="nombre_jugador">
      </div>
      <div class="form-group">
        <label for="lugarForm">Procedencia :</label>
        <input type="text" class="form-control" id="procedencia" name="procedencia">
      </div>
      <div class="form-group">
        <label for="idForm">ID Equipo :</label>
        <input type="text" class="form-control" id="idForm" name="id_equipo">
      </div>
      <button type="submit" class="btn btn-dark">Agregar Jugador</button>
    </form>
    <div class="">

    </div>
  </div>
{/if}
<div class="container-fluid">
</div>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  <script src="js/our.js" charset="utf-8"></script>
</body>
</html>
{include file='footer.tpl'}
