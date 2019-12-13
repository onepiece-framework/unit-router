<?php
/**
 * module-testcase:/unit/router/action.php
 *
 * @creation  2019-03-20
 * @version   1.0
 * @package   module-testcase
 * @author    Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright Tomoaki Nagahara All right reserved.
 */
/* @var $app    \OP\UNIT\App  */
/* @var $args    array        */

//	...
$temp = [];
$temp['End-Point']         = $app->Unit('Router')->EndPoint();
$temp['SmartURL-Argument'] = $app->Unit('Router')->Args();
D($temp);

//	...
$app->Unit('router')->Debug();
