<?php
namespace phpbu\App\Configuration;

use phpbu\App\Configuration;
use phpbu\App\Exception;

/**
 * Bootstrapper
 *
 * @package    phpbu
 * @subpackage app
 * @author     Sebastian Feldmann <sebastian@phpbu.de>
 * @copyright  Sebastian Feldmann <sebastian@phpbu.de>
 * @license    https://opensource.org/licenses/MIT The MIT License (MIT)
 * @link       http://phpbu.de/
 * @since      Class available since Release 5.0.8
 */
class Bootstrapper
{
    /**
     * Execute bootstrap runner.
     *
     * @param  \phpbu\App\Configuration $configuration
     * @throws \phpbu\App\Exception
     */
    public function run(Configuration $configuration)
    {
        $filename = $configuration->getBootstrap();

        if (!empty($filename)) {
            $pathToFile = stream_resolve_include_path($filename);
            if (!$pathToFile || !is_readable($pathToFile)) {
                throw new Exception(sprintf('Cannot open bootstrap file "%s".' . PHP_EOL, $filename));
            }
            require $pathToFile;
        }
    }
}
