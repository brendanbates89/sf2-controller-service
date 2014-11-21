<?php

namespace My\TestBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;

class ContainerAwarePass implements CompilerPassInterface
{    
    public function process(ContainerBuilder $container) 
    {
        // Get an array of tagged services.
        $taggedServices = $container->findTaggedServiceIds('container_aware');
        
        // Add some references to the services.
        foreach($taggedServices as $id => $attributes)
        {
            $service = $container->getDefinition($id);
            $service->addMethodCall('setContainer', [new Reference('service_container')]);
        }
    }
}