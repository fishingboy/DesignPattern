單例模式範例4: 

直接用 function 做就好

作法：
1. 建一個 function get_instance
2. 在內部加上 static 變數 $instance
3. 要取得實體一律透過它

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

function get_instance()
{
    static $instance;

    if ( ! $instance) {
        $instance = new db('localhost', 'leo', '123');
    }
    return $instance;
}

$db = get_instance();
$result = $db->query();
echo "<pre>result = " . print_r($result, TRUE). "</pre>";
