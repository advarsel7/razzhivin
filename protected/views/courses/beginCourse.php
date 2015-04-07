<?php
	$this->breadcrumbs=array(
		'Courses'=>array('/courses'),
		$course['title'],
	);
?>

<h3><?=$course['title']?></h3>

<p>
	<?=$course['description']?>
</p>

<style>
    .next-question {
        width: 100px;
        height: 15px;
        background: black;
        cursor: pointer;
        color: white;
        text-align: center;
        line-height: 15px;
        border-radius: 10px;
        margin: 5px 0;
    }
</style>

<script>
    $(document).ready(function(){
        var q = 0;
        showQuestion();

        $('.next-question').eq($('.question').length - 1).hide();
        $('input[type="submit"]').eq($('.question').length - 1).show();

        $('.next-question').click(function() {
            if(q < $('.question').length - 1) q++;
            showQuestion();
        });

        function showQuestion() {
            for (var i = 0; i < $('.question').length; i++)
                $('.question').eq(i).hide();
            $('.question').eq(q).show();
        }

    });
</script>

<div>
    <form action="" method="post">
        <?php foreach ($questions as $q): ?>
            <div class="question">
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
                <div class="next-question"> >>> </div>
                <div><input style="display: none;" type="submit" value="Send"/></div>
            </div>
        <?php endforeach; ?>
        <input name="course_id" type="hidden" value="<?=$course['id']?>"/>
    </form>
</div>

