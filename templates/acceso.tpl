{include file='templates/header.tpl'}

<p>Se debe registrar y/o iniciar sesión si quiere hacer modificaciones a la tablas.</p>
<div class="container">
    <h3>Registrarse</h3>
        <form class="form-alta" action="registerUser" method="post">
            <input placeholder="Email" type="text" name="Email" id="Email" required>
            <input placeholder="Contraseña" type="password" name="Password" id="Password" required>
            <input type="submit" class="btn btn-primary" value="Registrarse">
        </form>

    <h3>Iniciar Sesión</h3>
    <form class="form-alta" action="verify" method="post">
        <input placeholder="Email" type="text" name="Email" id="Email" required>
        <input placeholder="Contraseña" type="password" name="Password" id="Password" required>
        <input type="submit" class="btn btn-primary">
    </form>
    <h4 class="alert-danger">{$error}</h4>
</div>

{include file='templates/footer.tpl'}
