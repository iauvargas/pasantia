<?php

namespace Drupal\israel_module\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\israel_module\Services\Repetir;
use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\Session\AccountProxyInterface;
use Drupal\node\NodeInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
class IsraelController extends ControllerBase
{

  /** @var Repetir */
  private $repetir;
  /**
   * @var AccountProxyInterface
   */
  private $accountProxy;

  public function __construct(Repetir $repetir, ConfigFactoryInterface $configFactory, AccountProxyInterface $accountProxy)
  {
    $this->repetir = $repetir;
    $this->configFactory = $configFactory;
    $this->accountProxy = $accountProxy;
  }

  public static function create(ContainerInterface $container)
  {
    return new static(
      $container->get('israel_module.repetir'),
      $container->get('config.factory'),
      $container->get('current_user')
    );
  }

  public function home(NodeInterface $node) {

    $resultado = $this->repetir->repetir('Adonis');

    return [
      '#theme' => 'demo_plantilla',
      '#etiqueta' => $node->label(),
      '#tipo' => $resultado,
    ];
  }
  public function formController() {

    if (!$this->accountProxy->hasPermission('israel permiso limitado')) {
      return ['#markup' => 'Como usuario no tienes permisos'];
    }

    $form = $this->formBuilder()->getForm('\Drupal\israel_module\Form\israelForm');

    $build = [];

    $texto = 'form';
    $markup = ['#markup' => $this->t('This is the page of the @form', ['@form' => $texto]),];

    $build[] = $markup;
    $build[] = $form;

    return $build;
  }
}
