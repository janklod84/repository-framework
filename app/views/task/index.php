<div class="main-container container">
<p>
    <a class="btn btn-md btn-primary" href="<?= Url::to("task/add"); ?>">Создать новую задачу</a>
</p>
<div class="bs-example">
<table class="table table-striped">
    <thead>
    <tr>
        <th>#</th>
        <th><a href="/sort-by-username"> Имя</a></th>
        <th>E-майл</th>
        <th>Текст</th>
        <th><a href="/sort-by-status">Статус</a></th>
        <?php if(Auth::isLogged()): ?>
          <th>Действия</th>
        <?php endif; ?>
    </tr>
    </thead>
    <tbody>
        <?php if(!empty($tasks)): $i = 1; ?> 
        <?php foreach($tasks as $task): ?>
        <tr>
              <td><?= $i++; ?></td>
              <td><?= $task->username ?></td>
              <td><?= $task->email ?></td>
              <td><?= crop($task->text, 50) ?></td>
              <td>
                  <?= checkStatus($task->status); ?>
              </td>
              <?php if(Auth::isLogged()): ?>
              <td>
                  <a href="<?= url("task.show", ['id' => $task->id]) ?>">
                      <span class="glyphicon glyphicon-pencil btn-sm btn-primary"></span>
                  </a>
                  <a href="<?= url("task.remove", ['id' => $task->id]) ?>" onclick="return confirm('Вы действительно уверен удалить?');">
                      <span class="glyphicon glyphicon-trash btn-sm btn-danger"></span>
                  </a>
                </td>
              <?php endif; ?>
           </tr>
          <?php endforeach; ?>
        <?php endif; ?>
     </tbody>
</table>
<div class="text-center">
    <p>Задачи: <?= count($tasks);?> из <?=$total;?></p>
    <?php if($pagination->getCountPages() > 1): ?>
        <?= $pagination; ?>
    <?php endif; ?>
</div>
<?php view_path(__FILE__); ?>
</div>
</div>
</div>

