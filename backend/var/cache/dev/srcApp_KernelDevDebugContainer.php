<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerQW0VUdD\srcApp_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerQW0VUdD/srcApp_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerQW0VUdD.legacy');

    return;
}

if (!\class_exists(srcApp_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerQW0VUdD\srcApp_KernelDevDebugContainer::class, srcApp_KernelDevDebugContainer::class, false);
}

return new \ContainerQW0VUdD\srcApp_KernelDevDebugContainer([
    'container.build_hash' => 'QW0VUdD',
    'container.build_id' => 'f4fd2519',
    'container.build_time' => 1555885008,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerQW0VUdD');