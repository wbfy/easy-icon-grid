<?php
/**
 * Add some simple debug output settings
 * Debug is written to the standard PHP error_log
 */
namespace WBFY\EasyIconGrid;

defined('ABSPATH') || exit;

class Debug
{
    /**
     * Singleton
     *
     * @return object Singleton instance
     */
    public static function instance($clear = true)
    {
        static $instance = null;
        if (is_null($instance)) {
            if ($clear && file_exists(ini_get('error_log'))) {
                unlink(ini_get('error_log'));
            }
            $me       = __CLASS__;
            $instance = new $me;
            return $instance;
        }
        return $instance;
    }

    /**
     * Output to log
     *
     * @param $output data to be output
     */
    public function write($output = '')
    {
        error_log(print_r($output, 1));
    }

    /**
     * Enable debug output
     *
     * @param array $flag list of debug outputs to enable
     *              this argument can also a single string
     */
    public function enable($flags)
    {
        $flags = (is_array($flags)) ? $flags : array($flags);
        foreach ($flags as $flag) {
            switch ($flag) {
                case 'dump_scripts':
                    add_action('wp_print_scripts', array($this, 'dump_scripts'));
                    break;
                case 'dump_styles':
                    add_action('wp_print_styles', array($this, 'dump_styles'));
                    break;
            }
        }
    }

    /**
     * List queued scripts
     */
    public function dump_scripts()
    {
        global $wp_scripts;
        error_log('Enqueued SCRIPTS:');
        error_log(print_r($wp_scripts->queue, 1));
    }

    /**
     * List queued styles
     */
    public function dump_styles()
    {
        global $wp_styles;
        error_log('Enqueued STYLES:');
        error_log(print_r($wp_styles->queue), 1);
    }
}
