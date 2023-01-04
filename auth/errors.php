<?php  if (count($result) > 0) : ?>
  <div class="error">
  	<?php foreach ($result as $error) : ?>
  	  <p><?php echo $error ?></p>
  	<?php endforeach ?>
  </div>
<?php  endif ?>