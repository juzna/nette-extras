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
	public function install(InstalledRepositoryInterface $repo, PackageInterface $package)
	{
		$section = @$package->getExtra()['nette-addon']['extras'];
		var_dump("Debug - installing a nette addon extras", $section, $package->getExtra());
	}

	function update(InstalledRepositoryInterface $repo, PackageInterface $initial, PackageInterface $target)
	{
		// TODO: Implement update() method.
	}

	function uninstall(InstalledRepositoryInterface $repo, PackageInterface $package)
	{
		// TODO: Implement uninstall() method.
	}

}
