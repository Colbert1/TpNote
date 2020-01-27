<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="registrer.css" />
    <title>INSCRIPTION</title>

</head>

<body>
    <h2>INSCRIPTION</h2>


    <table align="center" cellpadding="10">

        <!----- Prénom ---------------------------------------------------------->
        <tr>
            <td>NOM</td>
            <td>
                <form action="regist.php" method="post">
                    <input type="text" name="Last_Name" maxlength="12" />
                    (max 12 caracteres a-z et A-Z)
            </td>
        </tr>

        <!----- Pseudo ---------------------------------------------------------->
        <tr>
            <td>PSEUDO</td>
            <td>
                <input type="text" name="Pseudo" maxlength="12" />
                (max 12 caracteres a-z et A-Z)
            </td>
        </tr>

        <!----- Nom ---------------------------------------------------------->

        <td>MOT DE PASSE</td>
        <td>
            <input type="password" name="password" maxlength="12" />
            (max 12 caracteres a-z et A-Z)
        </td>
        </tr>

        <!---- ID ------------------------------------------------------->

        <td>ID</td>
        <td>
            <input type="id" name="id" maxlength="12" />
            (max 12 caracteres a-z et A-Z)
        </td>
        </tr>

        <!----- Submit et Reset ------------------------------------------------->
        <tr>
            <td colspan="2" align="center">
                <button type="submit" value="Valider">Valider</button>
                </form>
            </td>
        </tr>
    </table>


</body>

</html>