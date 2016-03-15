<?php

require_once '../vendor/Parsedown.php'; 

$side = rand(0,1) ? 'front' : 'back'; 
$pd = new Parsedown();
$pd->setMarkupEscaped(true);

?>
<h4 style="display: none"><?php echo $card['title']; ?></h4>
<div class="side front panel panel-default" style="<?php echo $side == 'front' ? '' : 'display: none'; ?>">
  <div class="panel-body">
    <?php echo $pd->text($card['front']); ?>
  </div>
</div>
<div class="side back panel panel-default" style="<?php echo $side == 'back' ? '' : 'display: none'; ?>">
  <div class="panel-body">
    <?php echo $pd->text($card['back']); ?>
  </div>
</div>
<button class="flip btn btn-info">Flip</button>
<a href="study" class="next pull-right btn btn-success">Next</a>
<script>
  jQuery('.flip').click(function() {
    jQuery('.side').toggle();
    jQuery('h4').show();
 
    return false;
  });
</script>
