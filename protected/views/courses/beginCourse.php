<?php
	$this->breadcrumbs=array(
		'Courses'=>array('/courses'),
		'Design',
	);
?>

<h3><?=$course['title']?></h3>

<p>
	<?=$course['description']?>
</p>

<div>
	<?php foreach ($questions as $q): ?>
		<p><?=$q['title']?></p>
		<p><?=$q['description']?></p>
		<?php if($q['type'] == 'Close'): ?>
			<?php
				$answerVariant = explode("&", $q['answers']);
				$i = 0;
				foreach ($answerVariant as $av) {
					$answer = explode("=", $av);
					echo '<div><input type="checkbox" name="closeAnswer-'.$i++.'" value="'.$i.'">'.$answer[1].'</div>';
				}
			?>
		<?php else: ?>
			<?php echo '<textarea name="openAnswer-'.$q['id'].'" cols="30" rows="5"></textarea>'; ?>
		<?php endif; ?>
	<?php endforeach; ?>
</div>

