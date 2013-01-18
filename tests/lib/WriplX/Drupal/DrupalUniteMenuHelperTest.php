<?php

require_once 'WriplX/Drupal/DrupalWriplMenuHelper.php';
require_once 'Wripl/Link/Collection.php';

/**
 * Test class for DrupalWriplMenuHelper.
 * Generated by PHPUnit on 2011-09-26 at 10:30:29.
 */
class DrupalWriplMenuHelperTest extends PHPUnit_Framework_TestCase
{

    public function testBuildAdaptableList()
    {
        $expectedJson = '[{"uri":"http:\/\/www.example.com\/one.html"},{"uri":"http:\/\/www.example.com\/two.html"},{"uri":"http:\/\/www.example.com\/three.html","listItems":[{"uri":"http:\/\/www.example.com\/three-one.html"},{"uri":"http:\/\/www.example.com\/three-two.html"}]}]';

        $adaptableList = DrupalWriplMenuHelper::buildAdaptableList($this->_getDrupalTestMenu());
        $this->assertInstanceOf('Wripl_Link_Collection', $adaptableList);
        $this->assertSame(3, count($adaptableList));
        $this->assertSame($expectedJson, $adaptableList->toJson());
    }

    public function testGetAdaptedDrupalMenu()
    {
        $adaptableList = DrupalWriplMenuHelper::buildAdaptableList($this->_getDrupalTestMenu());
        $adaptedList = $this->_dummyAdaptList($adaptableList);
        $drupalTestMenu = $this->_getDrupalTestMenu();
        $adaptedDrupalMenu = DrupalWriplMenuHelper::getAdaptedDrupalMenu($drupalTestMenu, $adaptedList);

        $this->assertSame(3, count($adaptedDrupalMenu));
    }

    /**
     * Unserialises a drupal menu array for testing purposes.
     *
     * @return type array
     */
    protected function _getDrupalTestMenu()
    {
        return unserialize('a:3:{s:18:"49950 Link One 364";a:2:{s:4:"link";a:45:{s:9:"menu_name";s:15:"menu-dummy-menu";s:4:"mlid";s:3:"364";s:4:"plid";s:1:"0";s:9:"link_path";s:31:"http://www.example.com/one.html";s:11:"router_path";s:0:"";s:10:"link_title";s:8:"Link One";s:7:"options";a:1:{s:10:"attributes";a:1:{s:5:"title";s:0:"";}}s:6:"module";s:4:"menu";s:6:"hidden";s:1:"0";s:8:"external";s:1:"1";s:12:"has_children";s:1:"0";s:8:"expanded";s:1:"0";s:6:"weight";s:3:"-50";s:5:"depth";s:1:"1";s:10:"customized";s:1:"1";s:2:"p1";s:3:"364";s:2:"p2";s:1:"0";s:2:"p3";s:1:"0";s:2:"p4";s:1:"0";s:2:"p5";s:1:"0";s:2:"p6";s:1:"0";s:2:"p7";s:1:"0";s:2:"p8";s:1:"0";s:2:"p9";s:1:"0";s:7:"updated";s:1:"0";s:14:"load_functions";N;s:16:"to_arg_functions";N;s:15:"access_callback";N;s:16:"access_arguments";N;s:13:"page_callback";N;s:14:"page_arguments";N;s:17:"delivery_callback";N;s:10:"tab_parent";N;s:8:"tab_root";N;s:5:"title";s:8:"Link One";s:14:"title_callback";N;s:15:"title_arguments";N;s:14:"theme_callback";N;s:15:"theme_arguments";N;s:4:"type";N;s:11:"description";N;s:15:"in_active_trail";b:0;s:6:"access";i:1;s:4:"href";s:31:"http://www.example.com/one.html";s:17:"localized_options";a:1:{s:10:"attributes";a:1:{s:5:"title";s:0:"";}}}s:5:"below";a:0:{}}s:18:"49951 Link Two 365";a:2:{s:4:"link";a:45:{s:9:"menu_name";s:15:"menu-dummy-menu";s:4:"mlid";s:3:"365";s:4:"plid";s:1:"0";s:9:"link_path";s:31:"http://www.example.com/two.html";s:11:"router_path";s:0:"";s:10:"link_title";s:8:"Link Two";s:7:"options";a:1:{s:10:"attributes";a:1:{s:5:"title";s:0:"";}}s:6:"module";s:4:"menu";s:6:"hidden";s:1:"0";s:8:"external";s:1:"1";s:12:"has_children";s:1:"0";s:8:"expanded";s:1:"0";s:6:"weight";s:3:"-49";s:5:"depth";s:1:"1";s:10:"customized";s:1:"1";s:2:"p1";s:3:"365";s:2:"p2";s:1:"0";s:2:"p3";s:1:"0";s:2:"p4";s:1:"0";s:2:"p5";s:1:"0";s:2:"p6";s:1:"0";s:2:"p7";s:1:"0";s:2:"p8";s:1:"0";s:2:"p9";s:1:"0";s:7:"updated";s:1:"0";s:14:"load_functions";N;s:16:"to_arg_functions";N;s:15:"access_callback";N;s:16:"access_arguments";N;s:13:"page_callback";N;s:14:"page_arguments";N;s:17:"delivery_callback";N;s:10:"tab_parent";N;s:8:"tab_root";N;s:5:"title";s:8:"Link Two";s:14:"title_callback";N;s:15:"title_arguments";N;s:14:"theme_callback";N;s:15:"theme_arguments";N;s:4:"type";N;s:11:"description";N;s:15:"in_active_trail";b:0;s:6:"access";i:1;s:4:"href";s:31:"http://www.example.com/two.html";s:17:"localized_options";a:1:{s:10:"attributes";a:1:{s:5:"title";s:0:"";}}}s:5:"below";a:0:{}}s:20:"49952 Link Three 366";a:2:{s:4:"link";a:45:{s:9:"menu_name";s:15:"menu-dummy-menu";s:4:"mlid";s:3:"366";s:4:"plid";s:1:"0";s:9:"link_path";s:33:"http://www.example.com/three.html";s:11:"router_path";s:0:"";s:10:"link_title";s:10:"Link Three";s:7:"options";a:1:{s:10:"attributes";a:1:{s:5:"title";s:0:"";}}s:6:"module";s:4:"menu";s:6:"hidden";s:1:"0";s:8:"external";s:1:"1";s:12:"has_children";s:1:"1";s:8:"expanded";s:1:"0";s:6:"weight";s:3:"-48";s:5:"depth";s:1:"1";s:10:"customized";s:1:"1";s:2:"p1";s:3:"366";s:2:"p2";s:1:"0";s:2:"p3";s:1:"0";s:2:"p4";s:1:"0";s:2:"p5";s:1:"0";s:2:"p6";s:1:"0";s:2:"p7";s:1:"0";s:2:"p8";s:1:"0";s:2:"p9";s:1:"0";s:7:"updated";s:1:"0";s:14:"load_functions";N;s:16:"to_arg_functions";N;s:15:"access_callback";N;s:16:"access_arguments";N;s:13:"page_callback";N;s:14:"page_arguments";N;s:17:"delivery_callback";N;s:10:"tab_parent";N;s:8:"tab_root";N;s:5:"title";s:10:"Link Three";s:14:"title_callback";N;s:15:"title_arguments";N;s:14:"theme_callback";N;s:15:"theme_arguments";N;s:4:"type";N;s:11:"description";N;s:15:"in_active_trail";b:0;s:6:"access";i:1;s:4:"href";s:33:"http://www.example.com/three.html";s:17:"localized_options";a:1:{s:10:"attributes";a:1:{s:5:"title";s:0:"";}}}s:5:"below";a:2:{s:24:"49950 Link Three-One 367";a:2:{s:4:"link";a:45:{s:9:"menu_name";s:15:"menu-dummy-menu";s:4:"mlid";s:3:"367";s:4:"plid";s:3:"366";s:9:"link_path";s:37:"http://www.example.com/three-one.html";s:11:"router_path";s:0:"";s:10:"link_title";s:14:"Link Three-One";s:7:"options";a:1:{s:10:"attributes";a:1:{s:5:"title";s:0:"";}}s:6:"module";s:4:"menu";s:6:"hidden";s:1:"0";s:8:"external";s:1:"1";s:12:"has_children";s:1:"0";s:8:"expanded";s:1:"0";s:6:"weight";s:3:"-50";s:5:"depth";s:1:"2";s:10:"customized";s:1:"1";s:2:"p1";s:3:"366";s:2:"p2";s:3:"367";s:2:"p3";s:1:"0";s:2:"p4";s:1:"0";s:2:"p5";s:1:"0";s:2:"p6";s:1:"0";s:2:"p7";s:1:"0";s:2:"p8";s:1:"0";s:2:"p9";s:1:"0";s:7:"updated";s:1:"0";s:14:"load_functions";N;s:16:"to_arg_functions";N;s:15:"access_callback";N;s:16:"access_arguments";N;s:13:"page_callback";N;s:14:"page_arguments";N;s:17:"delivery_callback";N;s:10:"tab_parent";N;s:8:"tab_root";N;s:5:"title";s:14:"Link Three-One";s:14:"title_callback";N;s:15:"title_arguments";N;s:14:"theme_callback";N;s:15:"theme_arguments";N;s:4:"type";N;s:11:"description";N;s:15:"in_active_trail";b:0;s:6:"access";i:1;s:4:"href";s:37:"http://www.example.com/three-one.html";s:17:"localized_options";a:1:{s:10:"attributes";a:1:{s:5:"title";s:0:"";}}}s:5:"below";a:0:{}}s:24:"49951 Link Three-Two 368";a:2:{s:4:"link";a:45:{s:9:"menu_name";s:15:"menu-dummy-menu";s:4:"mlid";s:3:"368";s:4:"plid";s:3:"366";s:9:"link_path";s:37:"http://www.example.com/three-two.html";s:11:"router_path";s:0:"";s:10:"link_title";s:14:"Link Three-Two";s:7:"options";a:1:{s:10:"attributes";a:1:{s:5:"title";s:0:"";}}s:6:"module";s:4:"menu";s:6:"hidden";s:1:"0";s:8:"external";s:1:"1";s:12:"has_children";s:1:"0";s:8:"expanded";s:1:"0";s:6:"weight";s:3:"-49";s:5:"depth";s:1:"2";s:10:"customized";s:1:"1";s:2:"p1";s:3:"366";s:2:"p2";s:3:"368";s:2:"p3";s:1:"0";s:2:"p4";s:1:"0";s:2:"p5";s:1:"0";s:2:"p6";s:1:"0";s:2:"p7";s:1:"0";s:2:"p8";s:1:"0";s:2:"p9";s:1:"0";s:7:"updated";s:1:"0";s:14:"load_functions";N;s:16:"to_arg_functions";N;s:15:"access_callback";N;s:16:"access_arguments";N;s:13:"page_callback";N;s:14:"page_arguments";N;s:17:"delivery_callback";N;s:10:"tab_parent";N;s:8:"tab_root";N;s:5:"title";s:14:"Link Three-Two";s:14:"title_callback";N;s:15:"title_arguments";N;s:14:"theme_callback";N;s:15:"theme_arguments";N;s:4:"type";N;s:11:"description";N;s:15:"in_active_trail";b:0;s:6:"access";i:1;s:4:"href";s:37:"http://www.example.com/three-two.html";s:17:"localized_options";a:1:{s:10:"attributes";a:1:{s:5:"title";s:0:"";}}}s:5:"below";a:0:{}}}}}');
    }

    protected function _dummyAdaptList(Wripl_Link_Collection $list)
    {
        $iterator = new RecursiveIteratorIterator($list, RecursiveIteratorIterator::SELF_FIRST);
        foreach ($iterator as $item)
        {
            $item->setRelevance(rand(1, 10));
        }

        return $list;
    }

}

?>