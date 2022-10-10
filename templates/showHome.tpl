{include file='templates/header.tpl'}

<h1>Lista de tus capitulos favoritos!!</h1>
<p>La ley y el orden: Unidad de víctimas especiales es una serie de televisión 
    estadounidense de drama policial, legal, procesal y criminal
    ambientada en la ciudad de Nueva York donde también se produce principalmente.</p>
<div>
    <table>
        <thead class="encabezado">
            <tr>
                <th>Nombre Capítulo</th>
                <th>Director</th>
                <th>Temporada</th>
                <th>Año</th>
            </tr>
        </thead>
        <tbody>
            {foreach from=$episodes item=$listEpisodes}
                <tr>
                    <td><a href="getEpisode/{$listEpisodes->id}"> {$listEpisodes->nameEpisode}</a></td>
                    <td><a href="getEpisode/{$listEpisodes->id}"> {$listEpisodes->Director}</a></td>
                    <td><a href="getEpisode/{$listEpisodes->id}"> {$listEpisodes->fk_id_Season}</a></td>
                    <td><a href="getEpisode/{$listEpisodes->id}"> {$listEpisodes->Year}</a></td>
                    <td><a href="updateEpisode/{$listEpisodes->id}">Editar</a></td>
                    <td><a href="deleteEpisode/{$listEpisodes->id}">Eliminar</a></td>
                </tr>
            {/foreach}
        </tbody>
    </table>

    <table>
        <thead class="season">
            <tr>
                <th>Nº Temporada</th>
                <th>Descripción</th>
            </tr>
        </thead>
        <tbody>
            {foreach from=$seasons item=$listSeasons}
                <tr>
                    <td><a href="showSeasonEp/{$listSeasons->id_Season}"> {$listSeasons->numberSeason}</a></td>
                    <td><a href="showSeasonEp/{$listSeasons->id_Season}"> {$listSeasons->Description}</a></td>
                    <td><a href="updateSeason/{$listSeasons->id_Season}">Editar</a></td>
                    <td><a href="deleteSeason/{$listSeasons->id_Season}">Eliminar</a></td>
                </tr>
            {/foreach}
        </tbody>
    </table>
</div>

{include file='templates/footer.tpl'}