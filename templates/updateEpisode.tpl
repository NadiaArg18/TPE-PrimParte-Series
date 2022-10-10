{include file='templates/header.tpl'}

<h3>Edite cualquier campo del formulario</h3>

<form action="updateEpisode/{$listEpisodes->id}" method="POST">
    <input type="number" name="id" id="id" class="hidden">
    <input type="text" placeholder="Nombre" name="nameEpisode" id="nameEpisode" required>
    <input type="text" placeholder="Director" name="Director" id="Director" required>
    <select type="text" name="fk_id_Season" id="fk_id_Season">
        {foreach from=$seasons item=$listSeasons}
            <option value="{$listSeasons->id_Season}">{$listSeasons->numberSeason}</option>
        {/foreach}
    </select>
    <input type="text" placeholder="Año" name="Year" id="Year" required>
    <input type="submit" value="Modificar">
</form>

<a href='home'> Volver </a>

{include file='templates/footer.tpl'}