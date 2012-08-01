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
		var_dump(getcwd(), $this->baseDir);

		$items = (array) $section; // expected list of items to be installed

		if (in_array('jQuery', $items)) {
			copy("$this->baseDir/assets/javascript/jquery.js", "www/temp/jquery.js"); // copy to output
			$config['assets']['javascript'][] = 'temp/jquery.js'; // add to addons.neon config
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
