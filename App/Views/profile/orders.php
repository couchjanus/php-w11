<!-- Conatiner profile Start -->
<?php use Core\Helper;?>
<maim class="main-container">
    <div class="column row">
        <h2 class="feature_title"><?=$title;?></h2>
        <h4 class="feature_sub">Hello There <?= $user['name']; ?>!</h4>
    </div>

    <div class="column">

    <div class="panel-body">
        <?php if(count($orders)>0):?>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Дата оформления</th>
                        <th>Статус заказа</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody class="table-items">
                    <?php foreach ($orders as $order):?>
                    <tr>
                        <td><?= $order['id']?></td>
                        <td><?= $order['formated_date']?></td>

                        <td><?php echo Helper::getStatusText($order['status']);?></td>

                        <td>
                            <a title="Show order" href="/profile/orders/view/<?= $order['id']?>">
                                <button class="btn btn-default"><i class="glyphicon glyphicon-eye-open"></i>
                                    View</button></a>

                            <a title="Edit Order" href="/profile/orders/edit/<?= $order['id']?>">
                                <button class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i>
                                    Edit</button></a>

                            <a title="Delete Order" href="/profile/orders/delete/<?= $order['id']?>">
                                <button class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i>
                                    Delete</button></a></td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
        <?php endif;?>

    </div>
</div> <!-- Conatiner product end -->



</maim>
<hr class='cb'>
<!-- Our product End -->
<div id="shadow-layer" class="shadow-layer"></div>



<!-- Our product End -->
<div class="clearfix"></div>