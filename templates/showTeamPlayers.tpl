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
                  <th scope="col"> <a href="showPlayer/{$player->id_jugador}">VER MAS</th>
                  {else}
                  <th scope="col"> <a href="showPlayer/{$player->id_jugador}">VER MAS</th>
                  {/if}
            </tr>
        {/foreach}
      </tbody>
    </table>
  </div>
  <div class="container-fluid">
    {foreach from=$img item= imagen}
      <img src="{$imagen->url}" class="img-fluid" width="100" height="100" alt="Responsive image">
      {if $admin eq true}
        <a href="deleteImagenTeam/{$imagen->id_imagen}">BORRAR
      {/if}
    {/foreach}
  </div>
  <form method="get" action="orderPlayers" enctype="multipart/form-data">
    <button type="submit" class="btn btn-dark">Ordenar Jugadores</button>
  </form>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  <script src="js/our.js" charset="utf-8"></script>
</body>
</html>
{include file='footer.tpl'}
