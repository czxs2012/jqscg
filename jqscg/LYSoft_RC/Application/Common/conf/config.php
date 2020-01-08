<?php
return array(
    //'配置项'=>'配置值'
    'DB_TYPE' => 'sqlsrv',
    'DB_HOST' => '192.168.8.240',
    'DB_NAME' => 'rc',
    'DB_USER' => 'sa',
    'DB_PWD' => 'adminlysoft',
    'DB_CHARSET' => 'utf8',

    'DB_CONFIG1' => array(
        'DB_TYPE' => 'mysql',
        'DB_HOST' => 'localhost',
        'DB_NAME' => 'admin',
        'DB_USER' => 'root',
        'DB_PWD' => 'root',
        'DB_CHARSET' => 'utf8',
    ),


    'TMPL_PARSE_STRING' => array('__JS__' => __ROOT__ . '/Public/js', // 增加新的js类库路径替换规则
        '__CSS__' => __ROOT__ . '/Public/css', // 增加新的css类库路径替换规则
        '__IMG__' => __ROOT__ . '/Public/images', // 增加新的IMg类库路径替换规则
    ),


    'USREIDEN' => 'user',

    'LOG_RECORD'            =>  false,   // 默认不记录日志
    'LOG_TYPE'              =>  'File', // 日志记录类型 默认为文件方式
    'LOG_LEVEL'             =>  'EMERG,ALERT,CRIT,ERR',// 允许记录的日志级别
    'LOG_EXCEPTION_RECORD'  =>  false,    // 是否记录异常信息日志
);