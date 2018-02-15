<?php  return array (
  0 => 
  array (
    'text' => 'Пользователь',
    'parent' => 'usernav',
    'action' => '',
    'description' => '',
    'icon' => '<span id="user-avatar">{$userImage}</span> <span id="user-username">{$username}</span>',
    'menuindex' => 5,
    'params' => '',
    'handler' => '',
    'permissions' => 'menu_user',
    'namespace' => 'core',
    'action_controller' => NULL,
    'action_namespace' => NULL,
    'id' => 'user',
    'children' => 
    array (
      0 => 
      array (
        'text' => 'Профиль',
        'parent' => 'user',
        'action' => 'security/profile',
        'description' => 'Обновить ваш профиль.',
        'icon' => '',
        'menuindex' => 0,
        'params' => '',
        'handler' => '',
        'permissions' => 'change_profile',
        'namespace' => 'core',
        'action_controller' => NULL,
        'action_namespace' => NULL,
        'id' => 'profile',
        'children' => 
        array (
        ),
        'controller' => '',
      ),
      1 => 
      array (
        'text' => 'Сообщения',
        'parent' => 'user',
        'action' => 'security/message',
        'description' => 'Просмотр ваших сообщений и отправка новых сообщений пользователям.',
        'icon' => '',
        'menuindex' => 1,
        'params' => '',
        'handler' => '',
        'permissions' => 'messages',
        'namespace' => 'core',
        'action_controller' => NULL,
        'action_namespace' => NULL,
        'id' => 'messages',
        'children' => 
        array (
        ),
        'controller' => '',
      ),
      2 => 
      array (
        'text' => 'Выйти',
        'parent' => 'user',
        'action' => 'security/logout',
        'description' => 'Выйти из бэкэнда MODX.',
        'icon' => '',
        'menuindex' => 2,
        'params' => '',
        'handler' => 'MODx.logout(); return false;',
        'permissions' => 'logout',
        'namespace' => 'core',
        'action_controller' => NULL,
        'action_namespace' => NULL,
        'id' => 'logout',
        'children' => 
        array (
        ),
        'controller' => '',
      ),
    ),
    'controller' => '',
  ),
  1 => 
  array (
    'text' => 'Админ',
    'parent' => 'usernav',
    'action' => '',
    'description' => '',
    'icon' => '<i class="icon-gear icon icon-large"></i>',
    'menuindex' => 6,
    'params' => '',
    'handler' => '',
    'permissions' => 'settings',
    'namespace' => 'core',
    'action_controller' => NULL,
    'action_namespace' => NULL,
    'id' => 'admin',
    'children' => 
    array (
      0 => 
      array (
        'text' => 'Системные настройки',
        'parent' => 'admin',
        'action' => 'system/settings',
        'description' => 'Изменение и создание системных настроек.',
        'icon' => '',
        'menuindex' => 0,
        'params' => '',
        'handler' => '',
        'permissions' => 'settings',
        'namespace' => 'core',
        'action_controller' => NULL,
        'action_namespace' => NULL,
        'id' => 'system_settings',
        'children' => 
        array (
        ),
        'controller' => '',
      ),
      1 => 
      array (
        'text' => 'Настройка форм',
        'parent' => 'admin',
        'action' => 'security/forms',
        'description' => 'Управление пользовательскими настройками админки',
        'icon' => '',
        'menuindex' => 1,
        'params' => '',
        'handler' => '',
        'permissions' => 'customize_forms',
        'namespace' => 'core',
        'action_controller' => NULL,
        'action_namespace' => NULL,
        'id' => 'bespoke_manager',
        'children' => 
        array (
        ),
        'controller' => '',
      ),
      2 => 
      array (
        'text' => 'Панели',
        'parent' => 'admin',
        'action' => 'system/dashboards',
        'description' => 'Управление панелями и виджетами.',
        'icon' => '',
        'menuindex' => 2,
        'params' => '',
        'handler' => '',
        'permissions' => 'dashboards',
        'namespace' => 'core',
        'action_controller' => NULL,
        'action_namespace' => NULL,
        'id' => 'dashboards',
        'children' => 
        array (
        ),
        'controller' => '',
      ),
      3 => 
      array (
        'text' => 'Контексты',
        'parent' => 'admin',
        'action' => 'context',
        'description' => 'Управление контекстами сайта и их настройками.',
        'icon' => '',
        'menuindex' => 3,
        'params' => '',
        'handler' => '',
        'permissions' => 'view_context',
        'namespace' => 'core',
        'action_controller' => NULL,
        'action_namespace' => NULL,
        'id' => 'contexts',
        'children' => 
        array (
        ),
        'controller' => '',
      ),
      4 => 
      array (
        'text' => 'Меню',
        'parent' => 'admin',
        'action' => 'system/action',
        'description' => 'Управление действиями и структурой верхнего меню.',
        'icon' => '',
        'menuindex' => 4,
        'params' => '',
        'handler' => '',
        'permissions' => 'actions',
        'namespace' => 'core',
        'action_controller' => NULL,
        'action_namespace' => NULL,
        'id' => 'edit_menu',
        'children' => 
        array (
        ),
        'controller' => '',
      ),
      5 => 
      array (
        'text' => 'Контроль доступа',
        'parent' => 'admin',
        'action' => 'security/permission',
        'description' => 'Управление привилегиями через группы, роли и политики доступа',
        'icon' => '',
        'menuindex' => 5,
        'params' => '',
        'handler' => '',
        'permissions' => 'access_permissions',
        'namespace' => 'core',
        'action_controller' => NULL,
        'action_namespace' => NULL,
        'id' => 'acls',
        'children' => 
        array (
        ),
        'controller' => '',
      ),
      6 => 
      array (
        'text' => 'Наборы параметров',
        'parent' => 'admin',
        'action' => 'element/propertyset',
        'description' => 'Управление наборами параметров и элементами которым эти наборы параметров назначены.',
        'icon' => '',
        'menuindex' => 6,
        'params' => '',
        'handler' => '',
        'permissions' => 'property_sets',
        'namespace' => 'core',
        'action_controller' => NULL,
        'action_namespace' => NULL,
        'id' => 'propertysets',
        'children' => 
        array (
        ),
        'controller' => '',
      ),
      7 => 
      array (
        'text' => 'Управление словарями',
        'parent' => 'admin',
        'action' => 'workspaces/lexicon',
        'description' => 'Изменение любых языковых строк в бэкэнде MODX.',
        'icon' => '',
        'menuindex' => 7,
        'params' => '',
        'handler' => '',
        'permissions' => 'lexicons',
        'namespace' => 'core',
        'action_controller' => NULL,
        'action_namespace' => NULL,
        'id' => 'lexicon_management',
        'children' => 
        array (
        ),
        'controller' => '',
      ),
      8 => 
      array (
        'text' => 'Пространства имён',
        'parent' => 'admin',
        'action' => 'workspaces/namespace',
        'description' => 'Управление пространствами имён. Пространства имён служат отличительным признаком между разными компонентами добавляемыми пользователями.',
        'icon' => '',
        'menuindex' => 8,
        'params' => '',
        'handler' => '',
        'permissions' => 'namespaces',
        'namespace' => 'core',
        'action_controller' => NULL,
        'action_namespace' => NULL,
        'id' => 'namespaces',
        'children' => 
        array (
        ),
        'controller' => '',
      ),
    ),
    'controller' => '',
  ),
  2 => 
  array (
    'text' => 'О проекте',
    'parent' => 'usernav',
    'action' => 'help',
    'description' => '',
    'icon' => '<i class="icon-question-circle icon icon-large"></i>',
    'menuindex' => 7,
    'params' => '',
    'handler' => '',
    'permissions' => 'help',
    'namespace' => 'core',
    'action_controller' => NULL,
    'action_namespace' => NULL,
    'id' => 'about',
    'children' => 
    array (
    ),
    'controller' => '',
  ),
);