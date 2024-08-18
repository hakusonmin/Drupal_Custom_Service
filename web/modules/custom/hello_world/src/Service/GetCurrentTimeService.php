<?php

namespace Drupal\hello_world\Service;

use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Drupal\Core\Datetime\DateFormatterInterface;

class GetCurrentTimeService {
  /**
   * @var \Drupal\Core\Datetime\DateFormatterInterface
   */
  protected $dateFormatter;
  
  /**
   * @param \Drupal\Core\Datetime\DateFormatterInterface $date_formatter
   */
  public function __construct(
    #[Autowire(service: 'date.formatter')] 
    DateFormatterInterface $date_formatter
    ) {
    $this->dateFormatter = $date_formatter;
  }
  
  public function getCurrentTime() {
        // 現在のタイムスタンプを取得
        $timestamp = \Drupal::time()->getRequestTime();
        
        // 現在の時刻をフォーマット
        $current_time = $this->dateFormatter->format($timestamp, 'custom', 'Y-m-d H:i:s');

        return $current_time;
      }

}


    

