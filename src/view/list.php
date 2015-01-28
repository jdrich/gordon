<ul class="nav nav-stacked">
  <?php foreach($cards as $slug => $card): ?>
    <li role="presentation"><a href="edit?card=<?php echo urlencode($slug); ?>">
      <?php echo htmlspecialchars($card); ?>
    </a></li>
  <?php endforeach; ?>
  <?php if(count($cards) == 0): ?>
    <li role="presentation">No flash cards found.</li>
  <?php endif; ?>
</ul>
