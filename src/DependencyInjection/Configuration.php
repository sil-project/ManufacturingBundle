<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Sil\Bundle\ManufacturingBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;
use Symfony\Component\Config\Definition\Builder\NodeBuilder;
use Blast\Bundle\ResourceBundle\DependencyInjection\Configuration\ResourceConfigurationTrait;
use Sil\Bundle\ManufacturingBundle\Domain\Entity;

class Configuration implements ConfigurationInterface
{

    use ResourceConfigurationTrait;

    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('sil_manufacturing');

        $this->addResourcesSection($rootNode);
        return $treeBuilder;
    }

    private function addResourceDefinitions(NodeBuilder $resourceNode)
    {
        $this->addResourceDefinition($resourceNode, 'bom', Entity\Bom::class);
        $this->addResourceDefinition($resourceNode, 'bom_line', Entity\BomLine::class);
    }
}
