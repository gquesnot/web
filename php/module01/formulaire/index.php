<html>
    <head>
        
    </head>
    <body>
     
        <h1> Exemple Formulaire </h1>
        
        <form action="data.php" method="GET">
            <label for="email"> Email </label>
            <input type="text" name="email" id="email" />
            
            <label for="firstname"> Prenom </label>
            <input type="text" name="firstname" id="firstname" />
            
            <label for="country"> Pays </label>
            <select name="country" id="country">
                <option value="France"> France </option>
                <option value="USA"> USA </option>
            </select>
            
            <input type="submit" value="Valider">
        </form>
        
        
    </body>
</html>