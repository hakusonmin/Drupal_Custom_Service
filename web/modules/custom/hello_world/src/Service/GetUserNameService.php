<?php

namespace Drupal\hello_world\Service;

class GetUserNameService {
  /**
   * currentUserはユーティリティのためDIより静的に読んだ方が良い。
   * @return string
   */
  public function getUserName() {
    $name = \Drupal::currentUser()->getAccountName();
    return $name ;
  }
}

// class MyModuleService {

//   /**
//    * @param \Drupal\Core\Session\AccountInterface $current_user
//    */
//   public function __construct(AccountInterface $current_user) {
//     $this->currentUser = $current_user;
//   }

//   /**
//    * @return string
//    */
//   public function getHelloWorld() {
//     $name = $this->currentUser->getAccountName();
//     return $name . 'さん Hello World!';
//   }

// }