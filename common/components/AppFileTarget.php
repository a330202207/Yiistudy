<?php
/**
 * @link http://www.tomtop.com/
 * @copyright Copyright (c) 2016 TOMTOP
 * @license http://www.tomtop.com/license/
 */

namespace common\components;

use Yii;
use yii\helpers\FileHelper;
use yii\log\Logger;
use yii\log\Target;

/**
 * @desc 文件类型记录日志. 从老站群移动来的
 *
 * 文件记录都是以 @runtime/logs/Yii::$app->id/yyyymm/$level_dd.log 命名进行切割
 * 每天一个文件 每个年月一个目录
 *
 * @author caoxl
 */
class AppFileTarget extends Target
{
    /**
     * @var string 基础日志目录
     */
    public $baseLogDir;

    /**
     * @var string 日志目录
     */
    private $_logDir;

    /**
     * @var int 清理到的截止月份 默认两个月之前
     */
    public $clearToEndMonth;

    /**
     * @var boolean $enableAutoClear 当在文件超期后是否自动清理
     */
    public $enableAutoClear = false;

    /**
     * @var int 单个日志文件的最大大小 单位 KB 默认10240KB 即10MB.
     */
    public $maxFileSize = 10240; // in KB

    /**
     * @var 设置文件的权限.
     */
    public $fileMode;

    /**
     * @var 设置新目录的权限.
     */
    public $dirMode = 0775;


    /**
     * 初始化.
     */
    public function init()
    {
        parent::init();
        $this->clearToEndMonth === null && $this->clearToEndMonth = date('Ym', strtotime('-2 month'));
        if ($this->baseLogDir === null) {
            $this->baseLogDir = Yii::$app->getRuntimePath() . DIRECTORY_SEPARATOR . 'logs' . DIRECTORY_SEPARATOR;
        } else {
            $this->baseLogDir = Yii::getAlias($this->baseLogDir);
        }

        //默认目录为 @runtime/logs/应用ID/yyyymm/dd/
        $this->_logDir === null && $this->_logDir = $this->baseLogDir . date('Ym') . DIRECTORY_SEPARATOR . date('d') . DIRECTORY_SEPARATOR;

        !is_dir($this->_logDir) && FileHelper::createDirectory($this->_logDir, $this->dirMode, true);
    }

    /**
     * 将日志写入文件.
     * @throws InvalidConfigException 如果日志文件无法以写入/追加模式打开 抛出异常
     */
    public function export()
    {
        $logTypes = array(
            Logger::getLevelName(Logger::LEVEL_ERROR),
            Logger::getLevelName(Logger::LEVEL_WARNING),
            Logger::getLevelName(Logger::LEVEL_INFO),
            Logger::getLevelName(Logger::LEVEL_TRACE),
            'profile',
        );
        $_messages = array();//各种类型的日志
        foreach ($logTypes as $key) {
            !array_key_exists($key, $_messages) && $_messages[$key] = array(
                'messages' => array(),
                'text' => '',
            );
        }

        foreach ($this->messages as $msg) {
            $_levelName = in_array($msg[1], array(Logger::LEVEL_PROFILE_BEGIN, Logger::LEVEL_PROFILE_END)) ? 'profile' : Logger::getLevelName($msg[1]);
            $_messages[$_levelName]['messages'][] = $msg;
        }

        $maxFileSizeInKb = $this->maxFileSize * 1024;
        foreach ($logTypes as $type) {
            $text = implode("\n", array_map([$this, 'formatMessage'], $_messages[$type]['messages']));
            if ($text == "\n" || $text == '' || $text == ' ' || $text == "\t" || $text == "\r" || $text == "\r\n" || $text == "\v") {
                continue;
            }
            $file = $this->_logDir . $type . '.log';
            if (is_file($file) && @filesize($file) >= $maxFileSizeInKb) {//如果文件大小超过最大限制 采用新文件 如 'error_1.log','info_2.log'
                for ($i = 1; $i < 100000; $i++) {
                    $file = str_replace('.log', '_' . $i . '.log', $file);
                    if (!is_file($file)) {
                        break;
                    }
                }
            }

            if (($fp = @fopen($file, 'a')) === false) {//打不开跳过
                continue;
            }
            @flock($fp, LOCK_EX);//锁定文件

            @fwrite($fp, $text);//写入文件
            @flock($fp, LOCK_UN);//释放锁定
            @fclose($fp);//关闭流

            if ($this->fileMode !== null) {
                @chmod($this->logFile, $this->fileMode);//改变文件权限模式
            }
        }

        $this->enableAutoClear && $this->clearFiles();//如果开启了自动清理 则开始清理日志文件
    }

    /**
     * 自动清理日志文件.
     */
    protected function clearFiles()
    {
        $mothNum = intval(date('Ym'));
        $this->clearToEndMonth = intval($this->clearToEndMonth);
        if ($this->clearToEndMonth >= $mothNum) {//不能删除当月及以后的
            return;
        }

        if (($dh = @opendir($this->baseLogDir)) !== false) {
            while (($file = @readdir($dh)) !== false) {
                $realFile = $this->baseLogDir . DIRECTORY_SEPARATOR . $file;
                if (!in_array($file, array('.', '..')) && is_dir($realFile) && intval($file) <= $this->clearToEndMonth) {
                    FileHelper::removeDirectory($realFile);
                }
            }
        }
        @closedir($dh);
    }
}
