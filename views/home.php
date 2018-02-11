<h1>Home page</h1>
<a href="index.php?c=Home&m=create">New User</a>
<ul>
<?php foreach($this->data as $user): ?>
<li><?php echo $user['id']."-".$user['name']."-".$user['email']; ?></li>
<?php endforeach; ?>

</ul>