<?php
/**
 * @link http://www.diemeisterei.de/
 * @copyright Copyright (c) 2014 diemeisterei GmbH, Stuttgart
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace dmstr\log;

use Yii;
use yii\helpers\VarDumper;
use yii\log\Logger;
use yii\log\Target;

/**
 * SyslogTarget writes log to syslog.
 *
 * @author Tobias Munk <tobias@diemeisterei.de>
 * @author Marc Mautz <marc@diemeisterei.de>
 * @since 2.0
 */
class SyslogTarget extends Target
{
    /**
     * @var string syslog identity
     */
    public $identity;
    /**
     * @var integer syslog facility.
     */
    public $facility = LOG_USER;

    /**
     * @var array syslog levels
     */
    private $_syslogLevels = [
        Logger::LEVEL_TRACE         => LOG_DEBUG,
        Logger::LEVEL_PROFILE_BEGIN => LOG_DEBUG,
        Logger::LEVEL_PROFILE_END   => LOG_DEBUG,
        Logger::LEVEL_INFO          => LOG_INFO,
        Logger::LEVEL_WARNING       => LOG_WARNING,
        Logger::LEVEL_ERROR         => LOG_ERR,
    ];


    /**
     * Writes log messages to syslog
     */
    public function export()
    {
        error_log(__METHOD__ . ' via error_log() ===');
        error_log("\n--- begin ---");
        $block = '';
        foreach ($this->messages as $i => $message) {
            $block .= $msg = $this->formatMessage($message);
            // flush if log amount exceeds limit (eg. 2048 for nginx, including "PHP message: " per call)
            if (strlen($block) > 1500) {
                error_log("\n--- end chunk ---");
                flush();
                error_log("\n--- begin chunk ---");
                $block = '';
            } else {

            }
            error_log($msg);
        }
        error_log("\n--- end ---");
        flush();
    }

    /**
     * @inheritdoc
     */
    public function formatMessage($message)
    {
        list($text, $level, $category, $timestamp) = $message;
        $level = Logger::getLevelName($level);
        if (!is_string($text)) {
            $text = VarDumper::export($text);
        }

        $prefix = $this->getMessagePrefix($message);
        return "{$prefix}[$level][$category] $text";
    }
}
