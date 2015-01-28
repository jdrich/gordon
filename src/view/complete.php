<h4>Test Complete</h4>
<ul class="list-group">
  <li class="list-group-item list-group-item-success"><?php echo array_sum(array_values($_SESSION['test'])); ?> Known</li>
  <li class="list-group-item list-group-item-danger"><?php echo count($_SESSION['test']) - array_sum(array_values($_SESSION['test'])); ?> Not Known</li>
  <li class="list-group-item list-group-item-info"><?php echo count($_SESSION['test']); ?> Answered</li>
  <li class="list-group-item"><?php echo count($_SESSION['test']); ?> Total</li>
</ul>

<table class="table table-striped">
  <tbody>
  <?php foreach($_SESSION['test'] as $slug => $answer): ?>
    <?php $title = json_decode(file_get_contents('../data/' . $slug), true)['title']; ?>

    <tr><td><a href="edit?card=<?php echo urlencode($slug); ?>"><?php echo htmlspecialchars($title); ?></a></td><td><span class="pull-right text-<?php echo $answer ? 'success' : 'danger'; ?>"><?php echo $answer ? 'Knew' : 'Didn\'t Know'; ?></span></td></tr>
  <?php endforeach; ?>
  </tbody>
</table>

<a href="submit" class="btn btn-info">Submit</a>
<a href="clear" class="pull-right btn btn-warning">Clear</a>
