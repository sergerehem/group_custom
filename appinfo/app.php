<?php

OC::$CLASSPATH['OC_Group_Custom']='apps/group_custom/lib/group_custom.php';
OC::$CLASSPATH['OC_Group_Custom_Local']='apps/group_custom/lib/group_custom_local.php';
OC::$CLASSPATH['OC_Group_Custom_Hooks'] = 'apps/group_custom/lib/hooks.php';

OCP\Util::connectHook('OC_User', 'post_deleteUser', 'OC_Group_Custom_Hooks', 'post_deleteUser');
OC_Group::useBackend( new OC_Group_Custom() );

OCP\Util::addScript('group_custom','script');
OCP\Util::addStyle ('group_custom','style');

$l = OC_L10N::get('group_custom');

OCP\App::addNavigationEntry(
    array( 'id' => 'group_custom_index',
           'order' => 80,
           'href' => OCP\Util::linkTo( 'group_custom' , 'index.php' ),
           'icon' => OCP\Util::imagePath( 'group_custom', 'group.png' ),
           'name' => $l->t('My Groups') )
   );
