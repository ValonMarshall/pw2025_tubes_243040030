<?php
require '../functions/functions.php';

$keyword = $_GET ["keyword"];

$query = "SELECT * FROM professors
                WHERE
            name LIKE '%$keyword%' OR
            class LIKE '%$keyword%' OR
            subclass LIKE '%$keyword%' OR
            role LIKE '%$keyword%' OR
            description LIKE '%$keyword%'
            ";
$professors = query ($query);
?>


<table border="1" cellspacing="0" cellpadding="10">
    <tr>
      <th>id</th>
      <th>name</th>
      <th>class</th>
      <th>subclass</th>
      <th>role</th>
      <th>description</th>
      <th>Gambar</th>
      <th>Aksi</th>
    </tr>

    <?php $i = 1; ?>
    <?php foreach ( $professors as $row ) :?>
    <tr>
      <td><?php echo $i; ?></td>
      <td><?= $row['name']?></td>
      <td><?= $row['class']?></td>
      <td><?= $row['subclass']?></td>
      <td><?= $row['role']?></td>
      <td><?= $row['description']?></td>
      <td><img src="../img/uploaded_img/<?php echo $row["gambar"]; ?>" width="50">
      </td>
      <td>
        <a href="../ubah-admin.php?id=<?php echo $row["id"]; ?>">ubah</a> | 
        <a href="../hapus-admin.php?id=<?php echo $row["id"]; ?>" onclick = "return confirm('yakin?');">hapus</a>
      </td>
    </tr>
    
<?php $i++; ?>
<?php endforeach; ?>


  </table>