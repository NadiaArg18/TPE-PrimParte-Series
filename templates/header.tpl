<!DOCTYPE html>
<html lang="en">

<head>
    <base href="{BASE_URL}" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilo.css">
    <title>Tu serie!!</title>
</head>

<body>
    <header>
        <nav class="inicio">
            <a class="serie" href="">Serie: La ley y el Orden: U.V.E.!!</a>
            <ul class="navegador">
                <li>
                    <a class="link" aria-current="page" href="">Home</a>
                </li>
                {if {$smarty.session.IS_LOGGED} == 1}
                    <li>
                        <a class="link" aria-current="page" href="logout">Logout</a>
                    </li>
                {else}
                    <li>
                        <a class="link" aria-current="page" href="login">Login</a>
                    </li>
                {/if}
            </ul>
        </nav>
    </header>