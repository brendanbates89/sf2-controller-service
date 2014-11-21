<?php

namespace My\TestBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use My\TestBundle\DependencyInjection\Compiler\ContainerAwarePass;

class MyTestBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);        
        $container->addCompilerPass(new ContainerAwarePass());
    }
}