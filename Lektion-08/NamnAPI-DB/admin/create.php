<?php

/***************************************************************
 *
 *                     NamnAPI Adminpanel
 *               Skapa nya namn via ett formulär
 *
 ***************************************************************/

require_once("Database.php");

$db = new Database();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // print_r($_POST);

    $firstname = htmlspecialchars($_POST['firstname']);
    $lastname = htmlspecialchars($_POST['lastname']);
    $gender = htmlspecialchars($_POST['gender']);

    if (empty($firstname) && empty($lastname))
        $db->printMessage("Ange förnamn eller efternamn tack");

    if (empty($gender) && $firstname)
        $db->printMessage("Välj kön tack!");

    if (!empty($firstname) && $gender == "male")
        $db->insertInto("firstNamesMale", $firstname);

    if (!empty($firstname) && $gender == "female")
        $db->insertInto("firstNamesFemale", $firstname);

    if (!empty($lastname))
        $db->insertInto("lastNames", $lastname);
}

?>

<form action="#" method="post" class="row">

    <div class="col-md-6 offset-md-3 mt-2">
        <input type="text" name="firstname" class="form-control" 
        placeholder="Ange förnamn" value="<?php if(!empty($firstname)) echo $firstname; ?>">
    </div>

    <div class="col-md-6 offset-md-3 mt-2">
        <input type="text" name="lastname" class="form-control" 
        placeholder="Ange efternamn" value="<?php if(!empty($lastname)) echo $lastname; ?>">
    </div>

    <div class="col-md-6 offset-md-3  mt-2">
        <select name="gender" class="form-select">
            <option value="">-- Välj kön --</option>
            <option <?php if($gender=="male") echo "selected" ?> value="male">Man</option>
            <option <?php if($gender=="female") echo "selected" ?> value="female">Kvinna</option>
        </select>
    </div>

    <div class="col-md-6 offset-md-3  mt-2">
        <input type="submit" class="form-control mt-2 btn btn-primary" value="Lägg till">
    </div>

</form>