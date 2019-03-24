<?php if(count($todos) > 0): ?>
    <?php $__currentLoopData = $todos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $todo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="well">
            <div class="col-xs-3">
                    <span class="todoTitle"><?php echo e($todo->todo); ?></span>
                    <div class='noteIcon'>
                        
                        <?php if($todo->mark =='1'): ?>
                            <span class="glyphicon glyphicon-ok" onClick='Update(this,<?php echo e($todo->id); ?>)' val='<?php echo e($todo->mark); ?>'></span>
                        <?php else: ?>
                           <span class="glyphicon glyphicon-remove" onClick='Update(this,<?php echo e($todo->id); ?>)' val='<?php echo e($todo->mark); ?>'></span>
                        <?php endif; ?>
                        
                        <span class='glyphicon glyphicon-trash' onClick='deleteTodo(<?php echo e($todo->id); ?>)'></span>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
<?php else: ?>
    <p>No TODO found</p>
<?php endif; ?>

<?php /* C:\xampp\htdocs\TestForTimesPrinter--Laravel\resources\views/content/todolist.blade.php */ ?>