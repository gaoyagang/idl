<?php
defined('WEIXIN_PATH') || define('WEIXIN_PATH', __DIR__ . '/wechar/enterprise');

class Weixin {
    // SDK目录
    const SDK_DIR = WEIXIN_PATH;
    // 需要被实例化的类名称
    private $__class_name = 'enterprise';
    private $__instance = null;

    public function __construct($class_name = '') {
        if ($class_name) {
            $this -> __class_name = $class_name;
        }

        require_once sprintf("%s/%s.php", self::SDK_DIR, $this -> __class_name);
        $this -> __instance = new $this -> __class_name();
    }

    // 代理实际功能
    public function __call($name, array $args) {
        return call_user_func_array(array($this -> __instance, $name), $args);
    }
}
?>