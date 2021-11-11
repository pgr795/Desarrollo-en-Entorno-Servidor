<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		 <h1>Datos Alumnos</h1>

        <label for="nombre">Nombre:</label> 
        <input type="text" name="nombre">* Obligatorio <br>

        <label for="apellido1">Apellido 1:</label>
        <input type="text" name="apellido1"> <br>

        <label for="apellido2">Apellido 2:</label> 
        <input type="text" name="apellido2"> <br>

        <label for="email">Email:</label> 
        <input type="mail" name="email">* Obligatorio <br>

        <fieldset>
            <legend>Sexo</legend>
            <input type="radio" value="mujer" name="sexo" /> Mujer 
            <input type="radio" value="hombre" name="sexo" /> Hombre *Obligatorio
        </fieldset>

        <br>

        <input type="submit" value="enviar"></input>
        <input type="reset" value="borrar">
</form>



<?php
include("datos.php");
?>


</body>
</html>