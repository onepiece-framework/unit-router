<?php
/**
 * unit-router:/router.class.php
 *
 * @created   2019-02-23 Separate from NewWorld.
 * @version   1.0
 * @package   unit-router
 * @author    Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright Tomoaki Nagahara All right reserved.
 */

/** namespace
 *
 * @created   2018-04-13  OP\UNIT\NEWWORLD
 * @updated   2019-02-23  OP\UNIT
 */
namespace OP\UNIT;

/** Used class.
 *
 */
use OP\OP_CORE;
use OP\OP_UNIT;
use OP\IF_UNIT;
use OP\UNIT_ROUTER;

/** Router
 *
 * @created   2015-01-30  Born at NewWorld.
 * @update    2016-11-26  Separate to unit.
 * @update    2019-02-23  Separate from NewWorld.
 * @update    2019-11-21  Separate to UNIT_ROURER trait.
 * @version   1.0
 * @package   unit-router
 * @author    Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright Tomoaki Nagahara All right reserved.
 */
class Router implements IF_UNIT
{
	/** trait.
	 *
	 */
	use OP_CORE, OP_UNIT, UNIT_ROUTER;

	/** g11n is Globalization.
	 *
	 *  <pre>
	 *  Globalization is not Multilingalization.
	 *  World Wide Web is connecting of world wide people.
	 *  People from all over the world visit your site.
	 *
	 *  Internationalization is not Multilingalization.
	 *  Multilingualization is one manifestation of that policy.
	 *
	 *  Localization is local area unique settings.
	 *  For example currency, tax, holiday.
	 *  </pre>
	 *
	 * @creation 2019-03-19
	 * @return   array
	 */
	/*
	function G11n()
	{
		return $this->_route['g11n'] ?? null;
	}
	*/
}
