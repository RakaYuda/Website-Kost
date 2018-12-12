<?php
use \MongoDB\BSON\ObjectID as MongoId;
// including the database connection file
include_once("viewedit.php");
 
if(isset($_POST['update']))
{    
    $id = $_POST['id'];
    $user = array (
                'firstname' => $_POST['firstname'],
                'lastname' => $_POST['name'],
                'address' => $_POST['address'],
                // 'alamat' => $_POST['alamat'],
                // 'agama' => $_POST['agama'],
                // 'pekerjaan' => $_POST['pekerjaan'],
            );
    
    // checking empty fields
    $errorMessage = '';
    foreach ($user as $key => $value) {
        if (empty($value)) {
            $errorMessage .= $key . ' field is empty<br />';
        }
    }
            
    if ($errorMessage) {
        // print error message & link to the previous page
        echo '<span style="color:red">'.$errorMessage.'</span>';
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";    
    } else {
        //updating the 'users' table/collection
        $db->twarga->updateOne(
                        array('_id' => new MongoId($id)),
                        array('$set' => $user)
                    );
        
        //redirectig to the display page. In our case, it is index.php
        header("Location: lihat.php");
    }
} // end if $_POST
?>
<?php
//getting id from url
$id = $_GET['id'];
 
//selecting data associated with this particular id
$result = $db->twarga->findOne(array('_id' => new MongoId($id)));
 
$firstname = $result['firstname'];
$lastname = $result['lastname'];
$address = $result['address'];
// $alamat = $result['alamat'];
// $agama = $result['agama'];
// $pekerjaan = $result['pekerjaan'];
?>
<html>
<head>    
    <title>Edit Data</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
 
<body> <!-- class="bdedit" style="background-image: linear-gradient(-225deg, #FF057C 0%, #7C64D5 48%, #4CC3FF 100%);height:635px" -->
<!-- <div id="edit">
    <form name="form1" method="post" action="edit.php">
    <h1>Edit Data Warga</h1>
        <table border="0">
            <tr> 
                <td>firstname</td>
                <td><input type="text" name="firstname" value="<?php //echo $firstname;?>"></td>
            </tr>
            <tr> 
                <td>lastname</td>
                <td><input type="text" name="name" value="<?php //echo $lastname;?>"></td>
            </tr>
            <tr> 
                <td>TEMPAT TANGGAL LAHIR</td>
                <td><input type="text" name="address" value="<?php //echo $address;?>"></td>
            </tr>
            <tr> 
                <td>ALAMAT</td>
                <td><input type="text" name="alamat" value="<?php //echo $alamat;?>"></td>
            </tr>
            <tr> 
                <td>AGAMA</td>
                <td><input type="text" name="agama" value="<?php //echo $agama;?>"></td>
            </tr>
            <tr> 
                <td>PEKERJAAN</td>
                <td><input type="text" name="pekerjaan" value="<?php //echo $pekerjaan;?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" class="updatte" name="id" value="<?php //echo $_GET['id'];?>"></td>
                <td><input type="submit" class="updatte" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
    </div> -->

    <div class="card text-center">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Tambah</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="lihat.php">Lihat</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="edit.php">Edit</a>
                </li>
            </ul>
        </div>

</body>
</html>