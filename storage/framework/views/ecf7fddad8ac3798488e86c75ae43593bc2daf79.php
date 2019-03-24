<?php $__env->startSection('content'); ?>
<script src="<?php echo e(asset('js/todo_note.js')); ?>" defer></script>
<div class="container">
    <div class="">
        
            <div class="card">
                <div class="card-header">Message
                        <ul id="messageList"></ul>
                </div>
                <div id="inline-block-containter">
                    
                    <div>
                        <table>
                            <tr>
                                <td><?php echo $__env->make('content.todo', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></td>
                                <td><?php echo $__env->make('content.note', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></td>
                            </tr>
                        </table>
                        
                        
                    </div>
                </div>
            </div>
        
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* C:\xampp\htdocs\TestForTimesPrinter--Laravel\resources\views/home.blade.php */ ?>