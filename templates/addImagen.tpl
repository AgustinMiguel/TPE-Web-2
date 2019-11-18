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
  <form method="post" action="uploadImagenPlayer" enctype="multipart/form-data">
    <input type="hidden" class="form-control" id="idForm" name="id_jugador" value="{$id}">
    <input type="file" name="imagen" id="">
    <button type="submit" class="btn btn-dark">Agregar Imagen</button>
  </form>
{include file='footer.tpl'}
