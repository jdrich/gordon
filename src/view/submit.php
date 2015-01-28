<h4>Recent Test Scores</h4>
<table class="table table-striped">
 <thead>
   <tr>
     <th>Date</th>
     <th class="text-success">Knew</th>
     <th class="text-danger">Didn't Know</th>
     <th class="text-info">Answered</th>
     <th>Total</th>
   </tr>
 </head>
 <tbody>
   <?php foreach($tests as $time => $test): ?>
     <tr>
       <?php $knew = round(array_sum(array_values($test))  / count($test)) * 100; ?>
       <td><?php echo date('m/d/Y h:i:s a', $time); ?></td>
       <td><?php echo $knew; ?>%</td>
       <td><?php echo 100 - $knew; ?>%</td>
       <td><?php echo count($test); ?></td>
       <td><?php echo count($test); ?></td>
     </tr>
   <?php endforeach; ?>  
 </tbody>
</table>
<h4>Question Detail</h4>
<table class="table table-striped">
 <thead>
   <tr>
     <th>Title</th>
     <th class="text-success">Knew</th>
     <th class="text-danger">Didn't Know</th>
     <th class="text-info">Answered</th>
     <th>Total</th>
   </tr>
 </head>
 <tbody>
   <?php foreach($success as $slug => $answers): ?>
     <?php $title = json_decode(file_get_contents('../data/' . $slug), true)['title']; ?>
     <tr>
       <?php $knew = array_sum(array_values($answers)); ?>
       <td><a href="edit?card=<?php echo urlencode($slug); ?>"><?php echo $title; ?></a></td>
       <td><?php echo $knew; ?></td>
       <td><?php echo count($answers) - $knew; ?></td>
       <td><?php echo count($test); ?></td>
       <td><?php echo count($test); ?></td>
     </tr>
   <?php endforeach; ?>
 </tbody>
</table>

