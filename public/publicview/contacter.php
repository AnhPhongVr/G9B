
<form method="POST" class="form-container">
    <h1 align="center" style="color: white;">Envoyer un e-mail</h1>
    <table align="center">
        <tr>
            <td style="text-align: right">
                <label for="email" style="color: white;">Email :</label>
            </td>
            <td>
                <input id="email" type="email" name="email" placeholder="E-mail"><br>
            </td>
        </tr>
        <tr>
            <td style="text-align: right">
                <label for="objet" style="color: white">Objet :</label>
            </td>
            <td>
                <input id="objet" type="text" name="objet" placeholder="Objet"><br>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <textarea cols="139" rows="15" name="message" placeholder="Écrivez votre message"></textarea>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="submit" name="send" class="btn" value="Confirmer" />
            </td>
        </tr>
    </table>
</form>
<?php include("publicmodel/modelcontact.php");