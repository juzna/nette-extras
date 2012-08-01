<?php

namespace Nette\Extras;

use Composer\Repository\InstalledRepositoryInterface;
use Composer\Package\PackageInterface;


/**
 * Custom installer for 'extras' section in nette-addon in composer.json
 *
 * @author Jan Dolecek <juzna.cz@gmail.com>
 */
class Installer implements \Nette\Addons\CustomInstallers\IInstaller
{
	private $baseDir;

	public function __construct()
	{
		$this->baseDir = realpath(__DIR__ . '/../../../');
	}


	public function install(InstalledRepositoryInterface $repo, PackageInterface $package, $section, & $config)
	{
		// var_dump(getcwd(), $this->baseDir);

		$items = (array) $section; // expected list of items to be installed


		if ( ! file_exists('www/temp/')) mkdir('www/temp/', 0777);


		if (in_array('jQuery', $items)) {
			copy("$this->baseDir/assets/javascript/jquery.js", "www/temp/jquery.js"); // copy to output
			$config['assets']['javascript'][] = '%wwwDir%/temp/jquery.js'; // add to addons.neon config
		}


		if (in_array('jQuery-UI', $items)) {
			`cp -r $this->baseDir/assets/css/jquery-ui www/temp/jquery-ui`; // FIXME: do it by PHP
			copy("$this->baseDir/assets/javascript/jquery-ui.js", "www/temp/jquery-ui.js"); // copy to output

			// add to addons.neon config
			$config['assets']['css'][] = '%wwwDir%/temp/jquery-ui/jquery-ui.css';
			$config['assets']['javascript'][] = '%wwwDir%/temp/jquery-ui.js';
		}


		if (in_array('netteForms', $items)) {
			copy("$this->baseDir/assets/javascript/netteForms.js", "www/temp/netteForms.js"); // copy to output
			$config['assets']['javascript'][] = '%wwwDir%/temp/netteForms.js'; // add to addons.neon config
		}

	}

	function update(InstalledRepositoryInterface $repo, PackageInterface $initial, PackageInterface $target, $section)
	{
		// TODO: Implement update() method.
	}

	function uninstall(InstalledRepositoryInterface $repo, PackageInterface $package, $section)
	{
		// TODO: Implement uninstall() method.
	}

}
