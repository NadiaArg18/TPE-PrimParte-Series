{include file='templates/header.tpl'}

<h3>Edite cualquier campo del formulario</h3>

<form action="updateSeason" method="POST">
    <input type="text" placeholder="id" name="id_Season" value="{$listSeasons->id_Season}" class="hidden">
    <input type="text" placeholder="Temporada" name="numberSeason" value="{$listSeasons->numberSeason}">
    <textarea rows="5" cols="20" type="text" placeholder="Descripcion" name="seasonDescrip" value="{$listSeasons->seasonDescrip}"></textarea>
    <input type="submit" value="Modificar">
</form>

<a href='home'> Volver </a>

{include file='templates/footer.tpl'}