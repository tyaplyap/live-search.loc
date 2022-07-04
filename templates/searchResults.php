<?php if($articles !== []) : ?>
Вывод в виде списка со сслыками:
<ol>
	<?php foreach ($articles as $article): ?>
	<li><a href="?id=<?= $article->id; ?>" target="_blank"><?= $article->title; ?></a></li>
	<?php endforeach; ?>
</ol>
<p>Вывод в виде формы:</p>
<form method="post">
	<?php foreach ($articles as $article): ?>
	<label>
		<input type="checkbox" name="posts[]" value="<?= $article->id; ?>"> <?= $article->title; ?>
	</label><br>
	<?php endforeach; ?>
	<input type="submit">	
</form>
<?php endif; ?>
