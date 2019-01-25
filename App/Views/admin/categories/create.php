<div class="content-box-large">
  <div class="panel-heading">
    <div class="panel-title"><h3><?= $title;?></h3></div>
    <a href="/admin/categories"><button class="btn btn-primary pull-right"> Go back</button></a>
  </div>
</div>
<div class="table-responsive">
  <form class="form-horizontal" method="POST" role="form" id="idForm">
    <div class="panel-body">
      <div class="form-group">
        <label for="name" class="col-sm-2 control-label">Category Name</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Category Name">
      </div>

      <div class="form-group">
        <label for="status" class="col-sm-2 control-label">Status</label>
        <select name="status" class="form-control">
          <option value="1" selected>Отображается</option>
          <option value="0">Скрыт</option>
        </select>
      </div>
    </div>
    <div class="form-group">
        <button id="save" type="submit" class="save btn btn-primary"><span data-feather="plus"></span> Add Category</button>
    </div>
  </form>
 
</div>
