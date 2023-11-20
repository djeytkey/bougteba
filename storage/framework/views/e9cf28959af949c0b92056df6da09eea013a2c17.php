<div class="container">
    <div class="row rounded text-white bg-<?php if($ticket->user->id === $ticket->user_id): ?><?php echo e("info"); ?><?php else: ?><?php echo e("primary"); ?><?php endif; ?>">
        <div class="col-md-3">
            <div class="p-2">
                <div><b><?php echo e(strtoupper($ticket->user->last_name)); ?> &nbsp;<?php echo e(strtoupper($ticket->user->first_name)); ?></b></div>
                <span><?php echo e(date(config('date_format'), strtotime($ticket->created_at->toDateString()))); ?></span>
                <?php
                $date = new DateTime($ticket->created_at);
                $heure_comment = $date->format('H:m:i');
                ?>
                <small><?php echo e($heure_comment); ?></small>
            </div>
        </div>
        <div class="col-md-9" style="display: flex; align-items:center;">
            <div class="p-2"><?php echo e($ticket->message); ?></div>
        </div>
    </div>
    <hr class="my-4">
    <?php $__currentLoopData = $ticket->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="row rounded text-white bg-<?php if($ticket->user->id === $comment->user_id): ?><?php echo e("info"); ?><?php else: ?><?php echo e("primary"); ?><?php endif; ?>">
            <div class="col-md-3">
                <div class="p-2">
                    <div><b><?php echo e(strtoupper($comment->user->last_name)); ?> &nbsp;<?php echo e(strtoupper($comment->user->first_name)); ?></b></div>
                    <span><?php echo e(date(config('date_format'), strtotime($comment->created_at->toDateString()))); ?></span>
                    <?php
                    $date = new DateTime($comment->created_at);
                    $heure_comment = $date->format('H:m:i');
                    ?>
                    <small><?php echo e($heure_comment); ?></small>
                </div>
            </div>
            <div class="col-md-9" style="display: flex; align-items:center;">
                <div class="p-2"><?php echo e($comment->comment); ?></div>
            </div>
        </div>
        <hr class="my-4">
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div><?php /**PATH /home/jbgz9206/public_html/magasinette.ma/resources/views/tickets/comments.blade.php ENDPATH**/ ?>