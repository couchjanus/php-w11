<div class="content-box-large">
  <div class="panel-heading">
    <div class="panel-title"><h3><?= $title;?></h3></div>
    <a href="/admin/gallery/create"><button class="btn btn-primary pull-right"><span data-feather="plus"></span> Add New</button></a>
  </div>
</div>
<div class="table-responsive">
<?php if ($numRows): 
  echo '<h4>There is '.$numRows.' Pictures in the storage</h4>'; ?>
  <table class="table table-striped table-sm">
    <thead>
      <tr>
      <th>#</th>
      <th>Picture Name</th>
      <th>Action</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($pictures as $picture):?>
      <tr>
        <td><?php echo $picture->id;?></td>
        <td><?php echo $picture->name;?></td>
        <td>
          <button class="btn btn-default"><span data-feather="eye"></span> View</button>
          <a href="/admin/gallery/edit/<?=$picture->id?>"><button class="btn btn-primary"><span data-feather="edit"></span> Edit</button></a>
          <a href="/admin/gallery/delete/<?=$picture->id?>"><button class="btn btn-danger"><span data-feather="delete"></span> Delete</button></a></td>
        </tr>
    <?php endforeach;?>
    
    </tbody>
  </table>
  <?php else:?>
    <h3>Not pictures yet...</h3>
<?php endif; ?>
</div>
