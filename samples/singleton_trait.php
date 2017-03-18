單例模式範例5: 

直接用 function 做就好

作法：
1. 建一個 function get_instance
2. 在內部加上 static 變數 $instance
3. 要取得實體一律透過它

<?php

trait Singleton 
{
    public static $instance;

    public  static function get_instance()
    {
        if ( ! self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }
}

class db
{
    use Singleton;

    public function __construct()
    {
    }

    public function query()
    {
        // 資料庫查詢
        return ['id' => 1, 'name' => 'leo',];
    }

}

$db = db::get_instance();
$result = $db->query();
echo "<pre>result = " . print_r($result, TRUE). "</pre>";
