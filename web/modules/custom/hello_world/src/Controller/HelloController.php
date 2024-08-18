<?php

namespace Drupal\hello_world\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Drupal\hello_world\Service\GetUserNameService;
use Drupal\hello_world\Service\GetCurrentTimeService;

class HelloController extends ControllerBase {
  
  protected $GetUserNameService;
  protected $GetCurrentTimeService;

  public function __construct(
    //カスタムサービスを　autowire: true に設定しないとAutowireは使えません。
    #[Autowire(service: 'hello_world.get_user_name_service')] GetUserNameService $GetUserNameService,
    #[Autowire(service: 'hello_world.get_current_time_service')] GetCurrentTimeService $GetCurrentTimeService
  ){
    $this->GetUserNameService = $GetUserNameService;
    $this->GetCurrentTimeService = $GetCurrentTimeService;
  }

  public function content() {
    $user_name = $this->GetUserNameService->getUserName();
    $current_time = $this->GetCurrentTimeService->getCurrentTime();
     //kint($hello_world);

    $output = $user_name . "さん こんにちは!! 現在の日時は" . $current_time . "です。";
    return [
      '#markup' => $this->t('@hoge', ['@hoge' => $output]),
    ];
  }
}


//   public function content() {
//     //以前の方法ではサービスロケータを利用していたがコンストラクタインジェクションに改修した。
//     $hello_world = \Drupal::service('hello_world.my_module_service')->getHelloWorld();

//     return [
//       '#markup' => $this->t('@hoge', ['@hoge' => $hello_world]),
//     ];
//   }
// }