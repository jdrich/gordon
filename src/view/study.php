<?php $side = rand(0,1) ? 'front' : 'back'; ?>
<h2 style="display: none"><?php echo $card['title']; ?></h2>
<div class="side front panel panel-default" style="<?php echo $side == 'front' ? '' : 'display: none'; ?>">
  <p class="panel-body">
    <?php echo htmlspecialchars($card['front']); ?>
  </p>
</div>
<div class="side back panel panel-default" style="<?php echo $side == 'back' ? '' : 'display: none'; ?>">
  <p class="panel-body">
    <?php echo htmlspecialchars($card['back']); ?>
  </p>
</div>
<button class="flip btn btn-info">Flip</button>
<a href="study" class="next pull-right btn btn-success">Next</a>
<script>
  jQuery('.flip').click(function() {
    jQuery('.side').toggle();
 
    return false;
  });
</script>
