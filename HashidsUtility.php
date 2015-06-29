<?php
App::uses('Component', 'Controller');
App::import('Vendor', 'Hashids' . DS . 'HashGenerator');
App::import('Vendor', 'Hashids' . DS . 'Hashids');

class HashidsUtility {

  private static $hashids;

  public function __construct() {
    $settings = array (
        'salt' => Configure::read('Hashids.salt'),
        'min_hash_length' => Configure::read('Hashids.min_hash_length'),
        'alphabet' => Configure::read('Hashids.alphabet')
    );

    self::$hashids = new Hashids\Hashids($settings['salt'], $settings['min_hash_length'], $settings['alphabet']);
  }

  public static function encode() {
    return call_user_func_array(array (
        self::$hashids,
        'encode'
    ), func_get_args());
  }

  public static function decode($hash, $array = false) {
    $result = self::$hashids->decode($hash);

    if ($array) {
        return $result;
    }

    if (!empty($result)) {
        return $result[0];
    }
 
    return false;
  }

  public static function encode_hex($str) {
    return self::$hashids->encode_hex($str);
  }

  public static function decode_hex($hash) {
    return self::$hashids->decode_hex($hash);
  }

  public static function get_max_int_value() {
    return self::$hashids->get_max_int_value();
  }
}
