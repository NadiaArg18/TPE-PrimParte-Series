<h3>Agrega tu capítulo de la temporada en la tabla</h3>

<form class="episode" action="addEpisode" method="POST">
        <input type="text" placeholder="Nombre" name="nameEpisode" id="nameEpisode">
        <input type="text" placeholder="Director" name="Director" id="Director">
        <select type="text" name="fk_id_Season" id="fk_id_Season">
                {foreach from=$seasons item=$listSeasons}
                        <option value="{$listSeasons->id_Season}">{$listSeasons->numberSeason}</option>
                {/foreach}
        </select>
        <input type="text" placeholder="Año" name="Year" id="Year">
        <input type="submit" value="Agregar">
</form>