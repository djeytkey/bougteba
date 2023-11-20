 <?php $__env->startSection('content'); ?>
    <?php if(session()->has('message')): ?>
        <div class="alert alert-success alert-dismissible text-center"><button type="button" class="close"
                data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><?php echo session()->get('message'); ?>

        </div>
    <?php endif; ?>
    <?php if(session()->has('not_permitted')): ?>
        <div class="alert alert-danger alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert"
                aria-label="Close"><span aria-hidden="true">&times;</span></button><?php echo e(session()->get('not_permitted')); ?>

        </div>
    <?php endif; ?>

    <section class="no-search">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header mt-2">
                    <h2 class="text-center"><?php echo e($ticket->ticket_id); ?></h2>
                </div>
                <div class="row no-mrl mb-3">
                    <div class="col-md-12 mt-3">
                        <div class="form-group row">
                            <table class="table w-75 mx-auto border">
                                <tbody>
                                    <tr>
                                        <th scope="row">Catégorie</th>
                                        <td>:</td>
                                        <td><?php echo e($ticket->category->name); ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Status</th>
                                        <td>:</td>
                                        <?php if($ticket->status == '1'): ?>
                                            <td><span class="badge badge-success">Open</span></td>
                                        <?php else: ?>
                                            <td><span class="badge badge-danger"><?php echo e(trans('file.Closed')); ?></span></td>
                                        <?php endif; ?>
                                    </tr>
                                    <tr>
                                        <th scope="row">Message</th>
                                        <td>:</td>
                                        <td><?php echo e($ticket->message); ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Création</th>
                                        <td>:</td>
                                        <td><?php echo e($ticket->created_at->diffForHumans()); ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
            <div class="card">
                <div class="row no-mrl mb-3">
                    <div class="col-md-12 mt-3">
                        <div class="form-group row">
                            <?php echo $__env->make('tickets.comments', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            $url_components = parse_url($actual_link);
            parse_str($url_components['query'], $params);
            if(!$params['close']) {                        
        ?>
            <div class="card">
                <div class="row no-mrl mb-3">
                    <div class="col-md-12 mt-3">
                        <div class="form-group row">
                            <?php echo $__env->make('tickets.reply', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php 
            }
        ?>
        </div>
    </section>

    <script type="text/javascript">
        $("ul#ticket").siblings('a').attr('aria-expanded', 'true');
        $("ul#ticket").addClass("show");
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/jbgz9206/public_html/magasinette.ma/resources/views/tickets/show.blade.php ENDPATH**/ ?>