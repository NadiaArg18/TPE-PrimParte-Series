{include file='templates/header.tpl'}

<h2>Lista completa de Capítulos de la Temporada.</h2>

<ul class="seasonEpisodes">
    {foreach from=$seasonEpisodes item=$seasonEpisode}
        <li>
            <a href="showSeasonEp/{$seasonEpisode->id_Season}">{$seasonEpisode->nameEpisode}</a>
        </li>
    {/foreach}
</ul>

<a href='home'> Volver </a>

{include file='templates/footer.tpl'}