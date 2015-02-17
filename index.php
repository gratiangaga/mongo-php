<?php

$mon = new Mongo();
$db $mon->mongodb;
$people = $db->people;


if (isset($_POST['name'])) {
 $people->insert( array
 "name" => $_POST['name'],
 "job" => $_POST['job']
 ));
}

$cursor = $people->find()

?>

<form method="POST">
<p>Name: <input type="text" name="name" /></p>
<p>Job: <input type="text" name="job" /></p>
<p><button>Add </button></p>
</form>


<?php if ($cursor->count() >0): ?>
<ul>
 <?php foreach($cursor as $doc): ?>
 <li>
 <h2><?php echo $doc['name'] ?>
 <p>
 <a href="/update.php?id=<?php echo $doc['_id']; ?>"> UPDATE </a>
 <a href="/delete.php?id=<?php echo $doc['_id']; ?>"> DELETE </a>
 </p>
 </li>
<?php endforeach; ?>
