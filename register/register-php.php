<?php 
    //import de la connexion à la BDD
    include './connectBdd.php';
    //récupération des données du formulaire
    //tester si le bouton est cliqué
    if(isset($_POST["submit"])){
        //tester si les champs sont remplis
        if(!empty($_POST["pseudo_client"]) AND !empty($_POST["prenom_client"]) AND !empty($_POST["nom_client"]) 
        AND !empty($_POST["email_client"]) AND !empty($_POST["password_client"]) AND !empty($_POST["confirm_password_client"])){
            //tester que les mdp soient bien identiques
            if($_POST["password_client"]===$_POST["confirm_password_client"]){
                //nettoyer le mail
                $email = cleanInput($_POST["email_client"]);
                //tester si le compte n'existe pas
                if(empty(getUserByMail($bdd,$email))){
                    $pseudo = cleanInput($_POST["pseudo_client"]);
                    $prenom = cleanInput($_POST["prenom_client"]);
                    $nom = cleanInput($_POST["nom_client"]);
                    $password = cleanInput($_POST["password_client"]);
                    //hasher le mdp
                    $hash = password_hash($password,PASSWORD_DEFAULT);
                    //ajouter utilisateur
                    ajouterUtilisateur($pseudo,$prenom,$nom,$email,$hash,$bdd);
                    header("Location:./connected.php");
                }
                else{
                    //le compte existe déjà
                    echo "The account already exists";
                }
            }
            else{
                echo "The passwords aren't similar";
            }
            // inscription utilisateur en bdd 
        }
        else{
            echo "Please complete all fields of the form";
        } 
    }   
    //Fonction pour ajouter un utilisateur en BDD
    function ajouterUtilisateur($pseudo,$prenom,$nom,$email,$password,$bdd){
        //bloc pour exécuter le code
        try {
            $requete = $bdd->prepare('INSERT INTO clients(pseudo_client,prenom_client,nom_client,email_client,password_client)VALUE
            (?,?,?,?,?)');
            $requete->bindParam(1,$pseudo,PDO::PARAM_STR);
            $requete->bindParam(2,$prenom,PDO::PARAM_STR);
            $requete->bindParam(3,$nom,PDO::PARAM_STR);
            $requete->bindParam(4,$email,PDO::PARAM_STR);
            $requete->bindParam(5,$password,PDO::PARAM_STR);
            $requete->execute();
        }
        //bloc pour récupérer les erreurs 
        catch (Exception $e) {
            //affichage de l'erreur
            die("Error : ".$e->getMessage());
        }    
    }

    function cleanInput(?string $value):?string{
        return htmlspecialchars(strip_tags(trim($value)),ENT_NOQUOTES);
    } 
    function getUserByMail($bdd,$email){
        try {
            $requete = $bdd->prepare('SELECT id_client FROM clients WHERE email_client = ?');
            $requete->bindParam(1,$email,PDO::PARAM_STR);
            $requete->execute();
            $data = $requete->fetch(PDO::FETCH_ASSOC);
            return $data;
        } 
        catch (Exception $e) {
            die('Error : '.$e->getMessage());
        }
    }