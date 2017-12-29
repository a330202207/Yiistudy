<?php
/**
 * @desc 接口错误代码对应的多语言，接口有返回errCode在这里找到对应接口的errorCode代码的多语言替换，逻辑在AppCurl的_convertResErrorCode()方法
 */
$errorCode = [
    'userRegister' => [
        '-10012' => 'member.emailIsUsed',
    ]
];
return ['error-code' => $errorCode];