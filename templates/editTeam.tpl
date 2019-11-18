{if $admin eq true}
  {include file="headerAdm.tpl"}
{else}
  {if $login eq true}
    {include file="headerLogout.tpl"}
  {else}
    {include file="header.tpl"}
  {/if}
{/if}
    <h1>{$Titulo}</h1>
    <div class="container-fluid">
      <h2>Formulario</h2>
      <form method="post" action="updateTeam">
          <input type="hidden" class="form-control" id="id_equipo" name="id_equipo" value= "{$equipo->id_equipo}">
        <div class="form-group">
          <label for="tituloForm">Nombre</label>
          <input type="text" class="form-control" id="nombre_equipo" name="nombre_equipo" value= "{$equipo->nombre_equipo}">
        </div>
        <div class="form-group">
          <label for="descripcionForm">Partidos ganados</label>
          <input type="text" class="form-control" id="partidos_ganados" name="partidos_ganados" value="{$equipo->partidos_ganados}">
        </div>
        <div class="form-group">
          <label for="descripcionForm">Partidos Perdidos</label>
          <input type="text" class="form-control" id="partidos_perdidos" name="partidos_perdidos" value="{$equipo->partidos_perdidos}">
        </div>
        <button type="submit" class="btn btn-primary">Editar Equipo</button>
      </form>
      <form method="post" action="uploadImagenTeam" enctype="multipart/form-data">
        <input type="hidden" class="form-control" id="id_equipo" name="id_equipo" value= "{$equipo->id_equipo}">
        <input type="file" name="imagen" id="imagen">
        <button type="submit" class="btn btn-primary">Agregar Imagen</button>
      </form>
    </div>
    </div>
{include file="footer.tpl"}
