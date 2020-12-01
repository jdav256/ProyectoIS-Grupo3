 <?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AppLayout::class, []); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header'); ?> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Bienvenido Empleado
        </h2>
        <a href="" class="mr-2">Pagos</a>
        <a href="" class="mr-2">Solicitdues</a>
        <a href="">Pedidos Activos</a>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                 <?php if (isset($component)) { $__componentOriginala182a157df19b3ff1adf4cde080c157363bf88ef = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\TablaPedidos::class, []); ?>
<?php $component->withName('tabla-pedidos'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginala182a157df19b3ff1adf4cde080c157363bf88ef)): ?>
<?php $component = $__componentOriginala182a157df19b3ff1adf4cde080c157363bf88ef; ?>
<?php unset($__componentOriginala182a157df19b3ff1adf4cde080c157363bf88ef); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
            </div>
        </div>
    </div>
 <?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
<?php /**PATH C:\wamp64\www\laravel\pedidos\resources\views/employee.blade.php ENDPATH**/ ?>