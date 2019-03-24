<?php if(count($notes) > 0): ?>
    <?php $__currentLoopData = $notes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $note): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="noteRow">
                    <span class='noteTitle'><?php echo e($note->title); ?></span>
                    <div class='noteIcon'>
                        <span class="glyphicon glyphicon-edit" onClick='Edit(this,<?php echo e($note->id); ?>)'></span>
                        <span class='glyphicon glyphicon-trash' onClick='deleteNote(<?php echo e($note->id); ?>)'></span>
                    </div><br/>
                    <textarea style='display:none' style='width:100%' readonly><?php echo e($note->context); ?></textarea>
                    <div class='updateNote' style='display:none'></div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php else: ?>
    <p>No Note found</p>
<?php endif; ?>

<?php /* C:\xampp\htdocs\TestForTimesPrinter--Laravel\resources\views/content/notelist.blade.php */ ?>