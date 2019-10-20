{include file="header.tpl"}
    <h1>{$Titulo}</h1>
    <div class="container-fluid">
      <h2>Formulario</h2>
      <form method="post" action="updatePlayer">
          <input type="hidden" class="form-control" id="idForm" name="id_jugador" value="{$player->id_jugador}">
        <div class="form-group">
          <label for="tituloForm">Nombre</label>
          <input type="text" class="form-control" id="nombreForm" name="nombre_jugador" value="{$player->nombre_jugador}">
        </div>
        <div class="form-group">
          <label for="descripcionForm">Procedencia</label>
          <input type="text" class="form-control" id="lugarForm" name="procedencia" value="{$player->procedencia}">
        </div>
        <button type="submit" class="btn btn-primary">Editar Jugador</button>
      </form>
    </div>
{include file="footer.tpl"}
