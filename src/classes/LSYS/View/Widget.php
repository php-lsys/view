<?php
namespace LSYS\View;
use LSYS\View;
/**
 * Widget 基类
 */
abstract class Widget{
	/**
	 * @var View
	 */
	protected $_view;
	public function __construct(View $view){
		$this->_view=$view;
	}
	/**
	 * 代理方式获取数据
	 * $callable 当货物不到时回调
	 * @param string $key
	 * @param callable $callable
	 * @return mixed
	 */
	public function proxyData($key,callable $callable){
		if (!$this->_view->__isset($key))return call_user_func($callable);
		return $this->_view->{$key};
	}
	/**
	 * 渲染指定模板
	 * @param array $data 数据
	 * @param string $tpl 模板路径
	 * @param string $module 模块名
	 * @return string
	 */
	protected function _render($data=NULL,$tpl=NULL){
		if ($tpl==null){
			$tpl=get_called_class();
			if (strpos($tpl, '\\')!==false) $tpl=substr(strrchr($tpl, '\\'), 1);
		}
		if (substr($tpl, 0,1)=='/')$tpl=substr($tpl, 1);
		else $tpl="widget".DIRECTORY_SEPARATOR.$tpl;
		$this->_view->set($data);
		return $this->_view->render($tpl);
	}
	/**
	 * 执行widget并输出渲染结果
	 * @param array $data
	 * @return string
	 */
	abstract public function render($data=NULL);
}