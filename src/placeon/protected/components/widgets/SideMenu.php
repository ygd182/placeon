<?php
class SideMenu extends CWidget {
 
    public $links = array();
 
    public function run() {
        $this->render('sideMenu');
    }
 
}
?>