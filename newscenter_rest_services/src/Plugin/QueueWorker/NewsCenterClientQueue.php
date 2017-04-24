<?php
/**
 * Created by PhpStorm.
 * User: mahim
 * Date: 4/7/17
 * Time: 2:49 PM
 */

namespace Drupal\newscenter_rest_services\Plugin\QueueWorker;

use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\Core\Queue\QueueWorkerBase;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\taxonomy\Entity\Term;


abstract class NewsCenterClientQueue extends QueueWorkerBase implements ContainerFactoryPluginInterface
{
// Here we don't use the Dependency Injection,
    // but the create method and __construct method are necessary to implement
    protected $entity_query_service;
    protected $taxonomy_query_service;

    /**
     * {@inheritdoc}
     */
    public function __construct() {}

    /**
     * {@inheritdoc}
     */
    public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition)
    {
       return new static();
    }

    /**
     * {@inheritdoc}
     */
    public function processItem($item)
    {
        // Get the content array
        $content = $item->data;
        // Create node from the array
        $this->createContent($content);
    }
}