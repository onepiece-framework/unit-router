<?php
/**
 * unit-router:/ROUTER.trait.php
 *
 * @created   2019-11-21
 * @version   1.0
 * @package   unit-template
 * @author    Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright Tomoaki Nagahara All right reserved.
 */

/** namespace
 *
 * @created   2018-04-13  OP\UNIT\NEWWORLD
 * @updated   2019-02-23  OP\UNIT
 * @updated   2019-11-21  OP
 */
namespace OP;

/** Use for route table's associative array key name.
 *
 * @created   2019-11-21
 * @var       string
 */
const _ARGS_ = 'args';

/** Use for route table's associative array key name.
 *
 * @created   2019-11-21
 * @var       string
 */
const _END_POINT_ = 'end-point';

/** Router
 *
 * @created   2015-01-30  Born at NewWorld.
 * @updated   2016-11-26  Separate to unit.
 * @updated   2019-02-23  Separate from NewWorld.
 * @updated   2019-11-21  Separate from Router class.
 * @version   1.0
 * @package   unit-router
 * @author    Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright Tomoaki Nagahara All right reserved.
 */
trait UNIT_ROUTER
{
	/** Route table.
	 *
	 * @var array
	 */
	private $_route;

	/** Init route table.
	 *
	 * <pre>
	 * 1. Search end-point by request uri.
	 * 2. Generate smart-url's arguments by request uri.
	 *
	 * Structure:
	 * {
	 *   "args" : [],
	 *   "end-point" : "/foo/bar/index.php"
	 * }
	 * </pre>
	 */
	private function __ROUTER_INIT()
	{
		//	...
		$this->_route = [];
		$this->_route[_ARGS_] = [];
		$this->_route[_END_POINT_] = null;

		//	...
		$app_root = RootPath()['app'];

		//	Separate of URL Query.
		if( $pos   = strpos($_SERVER['REQUEST_URI'], '?') ){
			$uri   = substr($_SERVER['REQUEST_URI'], 0, $pos);
		}else{
			$uri   = $_SERVER['REQUEST_URI'];
		};

		//	Generate real full path.
		$full_path = $_SERVER['DOCUMENT_ROOT'].$uri;

		//	...
		if( file_exists($full_path) and !is_dir($full_path) ){

			//	html-pass-through and
			$this->_route[_END_POINT_] = $full_path;

			//	...
			return;
		};

		//	Remove application root: /www/htdocs/api/foo/bar/ --> api/foo/bar/
		$uri = str_replace($app_root, '', $full_path);

		//	Remove slash from tail: api/foo/bar/ --> api/foo/bar
		$uri  = rtrim($uri, DIRECTORY_SEPARATOR);

		//	'' --> [], /foo/bar --> ['foo','bar']
		$dirs = explode(DIRECTORY_SEPARATOR, $uri);

		//	...
		$dir = null;

		//	...
		do{
			//	['foo','bar'] --> foo/bar//index.php --> foo/bar/index.php
			$path = trim(join(DIRECTORY_SEPARATOR, $dirs).DIRECTORY_SEPARATOR.'index.php', DIRECTORY_SEPARATOR);

			//	...
			if( isset($dir) ){
				array_unshift($this->_route[_ARGS_], \OP\Encode($dir));
			}

			//	...
			$full_path = $app_root.$path;

			//	...
			if( file_exists($full_path) ){
				$this->_route[_END_POINT_] = $full_path;
				break;
			}

			//	...
		}while( false !== $dir = array_pop($dirs) );
	}

	/** EndPoint
	 *
	 * @creation 2019-02-23
	 * @return   string
	 */
	function EndPoint()
	{
		if(!$this->_route ){
			$this->__ROUTER_INIT();
		}
		return $this->_route[_END_POINT_];
	}

	/** Args
	 *
	 * @creation 2019-02-23
	 * @return   array
	 */
	function Args()
	{
		if(!$this->_route ){
			$this->__ROUTER_INIT();
		}
		return $this->_route[_ARGS_];
	}
}
