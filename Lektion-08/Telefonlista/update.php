<?php
// om id saknas i URLen gå till startsidan
if (!isset($_GET['id'])) {
    header("Location:index.php");
    exit();
    // https://www.php.net/manual/en/function.header
}

// id finns i URLen => Hämta id
$id = htmlspecialchars($_GET['id']);

require_once 'header.php';
require_once 'database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    

    $name = htmlspecialchars($_POST['name']);
    $tel = htmlspecialchars($_POST['tel']);

    $stmt2 = $conn->prepare("UPDATE contacts 
                             SET name=:name, 
                                 tel=:tel
                             WHERE id=:id");

    $stmt2->bindParam(':name', $name);
    $stmt2->bindParam(':tel', $tel);
    $stmt2->bindParam(':id', $id);


    $stmt2->execute();

    echo "<p class='alert alert-success mt-3'>Record updated successfully.
            <br>Last inserted ID is: $id </p>";
}

$stmt = $conn->prepare("SELECT * FROM contacts WHERE id = :id");
$stmt->bindParam(':id', $id);
$stmt->execute();
$result = $stmt->fetch();
?>

<div class="row col-md-6 mx-auto text-center">
    <h2>Redigera kontakt</h2>
</div>
<form action="#" method="post" class="row">
    <div class="col-md-6">
    <label for="name">Ange namn</label>
        <input id="name" type="text" name="name" class="form-control mt-2 text-center" required 
        value="<?= $result['name'] ?>">
    </div>
    <div class=" col-md-6">
    <label for="tel">Ange Telefonummer</label>
        <input id="tel" type="text" name="tel" class="form-control mt-2 text-center" required 
        value="<?= $result['tel'] ?>">
    </div>
    <div class='col-md-6 mx-auto'>
        <input type='submit' class='form-control mt-2 btn btn-outline-primary' value='Uppdatera'>
    </div>
</form>

<?php
require_once 'footer.php';