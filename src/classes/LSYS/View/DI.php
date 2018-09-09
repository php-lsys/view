<?php
namespace LSYS\View;
/**
 * @method \LSYS\View view()
 * @method \LSYS\View\Widget widget($widget_class,$data=NULL)
 */
class DI extends \LSYS\DI{
    /**
     * @return static
     */
    public static function get(){
        $di=parent::get();
        !isset($di->view)&&$di->view(new \LSYS\DI\SingletonCallback(function (){
            return \LSYS\View::factory();
        }));
        !isset($di->widget)&&$di->widget(new \LSYS\DI\MethodCallback(function($widget_class,$data=NULL){
            return \LSYS\View::widget($widget_class,$data=NULL);
        }));
        return $di;
    }
}