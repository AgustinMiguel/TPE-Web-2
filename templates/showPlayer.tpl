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
                  <th scope="col">Id jugador</th>
                  <th scope="col">Equipo </th>
                  <th scope="col"> </th>
                  <th scope="col"> </th>
                  <th scope="col"> </th>
            </tr>
          </thead>
        <tbody class="contenedor-tabla" >
            <tr>
                  <th scope="col">{$player->nombre_jugador}</th>
                  <th scope="col">{$player->procedencia}</th>
                  <th scope="col">{$player->id_jugador}</th>
                  <th scope="col">{$player->nombre_equipo}</th>
            </tr>
      </tbody>
    </table>
  </div>
  <div class="container-fluid">
    {foreach from=$img item= imagen}
      <img src="{$imagen->url}" class="img-fluid" width="100" height="100" alt="Responsive image">
      {if $admin eq true}
        <a href="deleteImagenPlayer/{$imagen->id_imagen}">BORRAR
      {/if}
    {/foreach}
  </div>
  <div class="container-fluid">
    {if $admin eq true}
    {include file="vue/comments-list-admin.tpl"}
    <form id="comments-form" action="insert" method="post">
      <input type="hidden" name="id_jugador" placeholder="jugador" value="{$player->id_jugador}">
      <input type="hidden" name="id_usuario" placeholder="usuario" value="{$usuario}">
      <input type="text" name="texto" placeholder="texto">
      <input type="number" name="puntuacion" max="5">
      <input type="submit" value="insert">
    </form>
    {else}
      {if $login eq true}
        {include file="vue/comments-list-login.tpl"}
        <form id="comments-form" action="insert" method="post">
          <input type="hidden" name="id_jugador" placeholder="jugador" value="{$player->id_jugador}">
          <input type="hidden" name="id_usuario" placeholder="usuario" value="{$usuario}">
          <input type="text" name="texto" placeholder="texto">
          <input type="number" name="puntuacion" max="5">
          <input type="submit" value="insert">
        </form>
        {else}
          {include file="vue/comments-list-login.tpl"}
          <form id="comments-form" action="insert" method="post">
              <input type="hidden" name="id_jugador" placeholder="jugador" value="{$player->id_jugador}">
              <input type="hidden" name="id_usuario" placeholder="usuario" value="{$usuario}">
          </form>
      {/if}
    {/if}
  </div>
  <script src="js/comentariosAdmin.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</body>
</html>
{include file='footer.tpl'}
