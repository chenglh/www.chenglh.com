<?php
$envVal = env('WAREHOUSE_CODE');

return [
    // app.warehouseCode
    // 'warehouseCode' => ['a', 'b'],
    'warehouseCode' => $envVal ? explode(',', $envVal) : [],

	'website' => 'http://www.tladmin.com',
    'secret_salt' => '20200616XIYC',
    'allow_list' => ['/v1/login'],
];
