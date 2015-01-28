  <form action="edit" method="post">
    <input type="hidden" name="slug" value="<?php echo htmlspecialchars($slug); ?>" />
    <div class="form-group">
      <input type="text" class="form-control" name="title" value="<?php echo $card['title']; ?>" readonly>
    </div>
    <div class="form-group">
      <textarea class="form-control" rows="3" name="front" placeholder="Front"><?php echo htmlspecialchars($card['front']); ?></textarea>
    </div>
    <div class="form-group">
      <textarea class="form-control" rows="3" name="back" placeholder="Back"><?php echo htmlspecialchars($card['back']); ?></textarea>
    </div>
    <button type="submit" class="btn btn-default">Save</button>
    <button type="submit" class="pull-right delete btn btn-danger">Delete</button>
  </form>
<script> 
  jQuery('.delete').click(
    function() {
      jQuery(this).parent().attr('action', 'delete');
    }
  );
</script>
