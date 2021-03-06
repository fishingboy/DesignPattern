單例模式範例1: 

PHP 大師裡的範例，不知道為什麼無法執行。
一直跳 Fatal error: Access level to Singleton::__construct() must be public 

作法：
1. 建一個 class 去繼承你的做單例的那個 class
2. 在你建立的 class 加上 public static 變數 $instance
3. 把建構子設為 private
4. 再建個 publi static method: get_instance，要取得實體一律透過它

<?php
class db
{
    private $host;
    private $user;
    private $password;

    public function __construct($host, $user, $password)
    {
        $this->host     = $host;
        $this->user     = $user;
        $this->password = $password;
    }

    public function query()
    {
        // 資料庫查詢
        return ['id' => 1, 'name' => 'leo',];
    }
}


class Singleton extends db
{
    private static $instance;

    private function __construct()
    {
        parent::__construct('localhost', 'leo', '123');
    }

    public static function get_instance()
    {
        if ( ! self::$instance) {
            self::$instance = new Singleton('localhost', 'leo', '123');
        }
        return self::$instance;
    }
}

$db = Singleton::get_instance();
$result = $db->query();
echo "<pre>result = " . print_r($result, TRUE). "</pre>";
