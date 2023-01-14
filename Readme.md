
# InjetionNoSQL 
##### Langage : PHP / Base de donnée : Mongo DB

### Pour exploiter la faille :
##### Il suffit de rentrer : username[$eq]=ryan&password[$ne]=noMdp
##### Pour cela : 
##### - Se connecter a postman en method post 
##### - Aller dans body -> form-data
##### - Inserer dans la premiere key : username[$eq] et en value : ryan et dans la deuxieme key : password[$ne] et en value : noMdp
#### Voici comment ce connecter au compt "Admin" sans connaitre le mot de passe 
### Explication de la faille :
##### On peut expliquer cette faille : username[$eq]=ryan&password[$ne]=noMdp 
##### - username[$eq] signifie que le username égale au compt a ryan c'est a dire qu'il faut etre a connaissance du username de l'admin pour exploiter cette faille
##### - password[$ne] signifie que le mot de passe qu'on rentre est different de celui de l'admin, tant qu'on rentre pas le bon mot de passe la faille sera exploitable
### Résolution du bug : 
##### Afin de résoudre le bug, j'ai simplement ajouter une condition !isset($_POST["password"]['$ne']) dans le bute d'empecher la donnée de transitionner.