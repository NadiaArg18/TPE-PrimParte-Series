{include file='header.tpl'}

<h3>Edite cualquier campo del formulario</h3>

<form action="updateEpisodeFromDB" method="POST">
    <input type="number" name="id" id="id" value="{$listEpisodes->id}" class="hidden">
    <input type="text" placeholder="Nombre" name="nameEpisode" id="nameEpisode" value="{$listEpisodes->nameEpisode}" required>
    <input type="text" placeholder="Director" name="Director" id="Director" value="{$listEpisodes->Director}" required>
    <select type="text" name="fk_id_Season" id="fk_id_Season">
        {foreach from=$seasons item=listSeasons}
            <option value="{$listSeasons->id_Season}">{$listSeasons->numberSeason}</option>
        {/foreach}
    </select>
    <input type="text" placeholder="Año" name="premiereYear" id="premiereYear" value="{$listEpisodes->premiereYear}" required>
    <input type="submit" value="Modificar">
</form>

{include file='footer.tpl'}