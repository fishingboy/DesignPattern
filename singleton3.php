單例模式範例3: 

PHP 大師裡的範例，不知道為什麼無法執行。
一直跳 Fatal error: Access level to Singleton::__construct() must be public 

作法：
2. 在你原本的 class 加上 public static 變數 $instance
3. 把建構子設為 private
4. 再建個 publi static method: get_instance，要取得實體一律透過它

<?php

class db
{
    private static $instance;

    private $host;
    private $user;
    private $password;

    private function __construct($host, $user, $password)
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

    public static function get_instance()
    {
        if ( ! self::$instance) {
            self::$instance = new db('localhost', 'leo', '123');
        }
        return self::$instance;
    }
}

$db = db::get_instance();
$result = $db->query();
echo "<pre>result = " . print_r($result, TRUE). "</pre>";
