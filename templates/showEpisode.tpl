{include file='templates/header.tpl'}

<h3>Nombre del capítulo: {$episode->nameEpisode}</h3>
<h4>Director: {$episode->Director}</h4>
<h4>Temporada: {$episode->fk_id_Season}</h4>
<h4>Año: {$episode->premiereYear}</h4>

<a href='home'> Volver </a>

{include file='templates/footer.tpl'}