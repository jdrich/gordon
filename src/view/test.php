<div>&nbsp;<strong class="pull-right">
<span class="text-success"><?php echo $correct; ?></span> /
<span class="text-danger"><?php echo $answered-$correct; ?></span> /
<span class="text-info"><?php echo $answered; ?></span> /
<?php echo $total; ?>
</strong></div>
<?php $side = rand(0,1) ? 'front' : 'back'; ?>
<form action="answer" method="post">
<input type="hidden" name="slug" value="<?php echo htmlspecialchars($slug); ?>" /> 
<input type="hidden" name="answer" value="" />
<h4 style="display: none"><?php echo $card['title']; ?></h4>
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
<button class="display btn btn-info">Show</button>
<button style="display:none;" class="answer knew btn btn-success">Knew</button>
<button style="display:none;" class="answer pull-right didnt btn btn-danger">Didn't Know</button>
</form>
<script>
  jQuery('.display').click(function() {
    jQuery('.side').show();
    jQuery('.answer').show();
    jQuery('h4').show();
    jQuery(this).hide();    
 
    return false;
  });

  jQuery('.answer').click(function() {
    var answer = jQuery(this).hasClass('knew') ? 'knew' : 'didnt';

    jQuery('input[name="answer"]').attr('value', answer);    

    return true;
  });
</script>
