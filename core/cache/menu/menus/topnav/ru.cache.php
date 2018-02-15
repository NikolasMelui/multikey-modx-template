<?php  return array (
  0 => 
  array (
    'text' => 'Содержимое',
    'parent' => 'topnav',
    'action' => '',
    'description' => '',
    'icon' => '',
    'menuindex' => 0,
    'params' => '',
    'handler' => '',
    'permissions' => 'menu_site',
    'namespace' => 'core',
    'action_controller' => NULL,
    'action_namespace' => NULL,
    'id' => 'site',
    'children' => 
    array (
      0 => 
      array (
        'text' => 'Новый ресурс',
        'parent' => 'site',
        'action' => 'resource/create',
        'description' => 'Создать новый ресурс.',
        'icon' => '',
        'menuindex' => 0,
        'params' => '',
        'handler' => '',
        'permissions' => 'new_document',
        'namespace' => 'core',
        'action_controller' => NULL,
        'action_namespace' => NULL,
        'id' => 'new_resource',
        'children' => 
        array (
        ),
        'controller' => '',
      ),
      1 => 
      array (
        'text' => 'Перейти на сайт',
        'parent' => 'site',
        'action' => '',
        'description' => 'Будет загружена главная страница сайта в новой вкладке.',
        'icon' => '',
        'menuindex' => 4,
        'params' => '',
        'handler' => 'MODx.preview(); return false;',
        'permissions' => '',
        'namespace' => 'core',
        'action_controller' => NULL,
        'action_namespace' => NULL,
        'id' => 'preview',
        'children' => 
        array (
        ),
        'controller' => '',
      ),
      2 => 
      array (
        'text' => 'Импорт HTML',
        'parent' => 'site',
        'action' => 'system/import/html',
        'description' => 'Пакетный импорт HTML файлов.',
        'icon' => '',
        'menuindex' => 5,
        'params' => '',
        'handler' => '',
        'permissions' => 'import_static',
        'namespace' => 'core',
        'action_controller' => NULL,
        'action_namespace' => NULL,
        'id' => 'import_site',
        'children' => 
        array (
        ),
        'controller' => '',
      ),
      3 => 
      array (
        'text' => 'Импорт ресурсов',
        'parent' => 'site',
        'action' => 'system/import',
        'description' => 'Пакетный импорт статических ресурсов.',
        'icon' => '',
        'menuindex' => 6,
        'params' => '',
        'handler' => '',
        'permissions' => 'import_static',
        'namespace' => 'core',
        'action_controller' => NULL,
        'action_namespace' => NULL,
        'id' => 'import_resources',
        'children' => 
        array (
        ),
        'controller' => '',
      ),
      4 => 
      array (
        'text' => 'Группы ресурсов',
        'parent' => 'site',
        'action' => 'security/resourcegroup',
        'description' => 'Управление принадлежностью ресурсов к группам ресурсов.',
        'icon' => '',
        'menuindex' => 7,
        'params' => '',
        'handler' => '',
        'permissions' => 'access_permissions',
        'namespace' => 'core',
        'action_controller' => NULL,
        'action_namespace' => NULL,
        'id' => 'resource_groups',
        'children' => 
        array (
        ),
        'controller' => '',
      ),
      5 => 
      array (
        'text' => 'Типы содержимого',
        'parent' => 'site',
        'action' => 'system/contenttype',
        'description' => 'Вы можете добавить новые типы содержимого для ресурсов, например такие как .html, .js, и т.д.',
        'icon' => '',
        'menuindex' => 8,
        'params' => '',
        'handler' => '',
        'permissions' => 'content_types',
        'namespace' => 'core',
        'action_controller' => NULL,
        'action_namespace' => NULL,
        'id' => 'content_types',
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
    'text' => 'Медиа',
    'parent' => 'topnav',
    'action' => '',
    'description' => 'Обновить медиа-файлы и их «источники»',
    'icon' => '',
    'menuindex' => 1,
    'params' => '',
    'handler' => '',
    'permissions' => 'file_manager',
    'namespace' => 'core',
    'action_controller' => NULL,
    'action_namespace' => NULL,
    'id' => 'media',
    'children' => 
    array (
      0 => 
      array (
        'text' => 'Управление медиа',
        'parent' => 'media',
        'action' => 'media/browser',
        'description' => 'Отображение, загрузка и управление медиа-файлами',
        'icon' => '',
        'menuindex' => 0,
        'params' => '',
        'handler' => '',
        'permissions' => 'file_manager',
        'namespace' => 'core',
        'action_controller' => NULL,
        'action_namespace' => NULL,
        'id' => 'file_browser',
        'children' => 
        array (
        ),
        'controller' => '',
      ),
      1 => 
      array (
        'text' => 'Источники файлов',
        'parent' => 'media',
        'action' => 'source',
        'description' => 'Управление источниками файлов.',
        'icon' => '',
        'menuindex' => 1,
        'params' => '',
        'handler' => '',
        'permissions' => 'sources',
        'namespace' => 'core',
        'action_controller' => NULL,
        'action_namespace' => NULL,
        'id' => 'sources',
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
    'text' => 'Приложения',
    'parent' => 'topnav',
    'action' => '',
    'description' => '',
    'icon' => '',
    'menuindex' => 2,
    'params' => '',
    'handler' => '',
    'permissions' => 'components',
    'namespace' => 'core',
    'action_controller' => NULL,
    'action_namespace' => NULL,
    'id' => 'components',
    'children' => 
    array (
      0 => 
      array (
        'text' => 'Установщик',
        'parent' => 'components',
        'action' => 'workspaces',
        'description' => 'Управление приложениями и репозиториями',
        'icon' => '',
        'menuindex' => 0,
        'params' => '',
        'handler' => '',
        'permissions' => 'packages',
        'namespace' => 'core',
        'action_controller' => NULL,
        'action_namespace' => NULL,
        'id' => 'installer',
        'children' => 
        array (
        ),
        'controller' => '',
      ),
    ),
    'controller' => '',
  ),
  3 => 
  array (
    'text' => 'Управление',
    'parent' => 'topnav',
    'action' => '',
    'description' => '',
    'icon' => '',
    'menuindex' => 3,
    'params' => '',
    'handler' => '',
    'permissions' => 'menu_tools',
    'namespace' => 'core',
    'action_controller' => NULL,
    'action_namespace' => NULL,
    'id' => 'manage',
    'children' => 
    array (
      0 => 
      array (
        'text' => 'Пользователи',
        'parent' => 'manage',
        'action' => 'security/user',
        'description' => 'Добавление, обновление, и назначение прав пользователям.',
        'icon' => '',
        'menuindex' => 0,
        'params' => '',
        'handler' => '',
        'permissions' => 'view_user',
        'namespace' => 'core',
        'action_controller' => NULL,
        'action_namespace' => NULL,
        'id' => 'users',
        'children' => 
        array (
        ),
        'controller' => '',
      ),
      1 => 
      array (
        'text' => 'Очистить кэш',
        'parent' => 'manage',
        'action' => '',
        'description' => 'Очистить кэш сайта.',
        'icon' => '',
        'menuindex' => 1,
        'params' => '',
        'handler' => 'MODx.clearCache(); return false;',
        'permissions' => 'empty_cache',
        'namespace' => 'core',
        'action_controller' => NULL,
        'action_namespace' => NULL,
        'id' => 'refresh_site',
        'children' => 
        array (
          0 => 
          array (
            'text' => 'Обновить URI-ссылки',
            'parent' => 'refresh_site',
            'action' => '',
            'description' => 'Перегенерировать URI ресурсов',
            'icon' => '',
            'menuindex' => 0,
            'params' => '',
            'handler' => 'MODx.refreshURIs(); return false;',
            'permissions' => 'empty_cache',
            'namespace' => 'core',
            'action_controller' => NULL,
            'action_namespace' => NULL,
            'id' => 'refreshuris',
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
        'text' => 'Снять блокировки',
        'parent' => 'manage',
        'action' => '',
        'description' => 'Будут сняты все блокировки со страниц сайта. Эти блокировки являются результатом того, что другие пользователи редактируют эти страницы.',
        'icon' => '',
        'menuindex' => 2,
        'params' => '',
        'handler' => 'MODx.removeLocks();return false;',
        'permissions' => 'remove_locks',
        'namespace' => 'core',
        'action_controller' => NULL,
        'action_namespace' => NULL,
        'id' => 'remove_locks',
        'children' => 
        array (
        ),
        'controller' => '',
      ),
      3 => 
      array (
        'text' => 'Перезагрузить права доступа',
        'parent' => 'manage',
        'action' => '',
        'description' => 'Перезагрузить все права доступа и очистить кэш.',
        'icon' => '',
        'menuindex' => 3,
        'params' => '',
        'handler' => 'MODx.msg.confirm({
    title: _(\'flush_access\')
    ,text: _(\'flush_access_confirm\')
    ,url: MODx.config.connector_url
    ,params: {
        action: \'security/access/flush\'
    }
    ,listeners: {
        \'success\': {fn:function() { location.href = \'./\'; },scope:this},
        \'failure\': {fn:function(response) { Ext.MessageBox.alert(\'failure\', response.responseText); },scope:this},
    }
});',
        'permissions' => 'access_permissions',
        'namespace' => 'core',
        'action_controller' => NULL,
        'action_namespace' => NULL,
        'id' => 'flush_access',
        'children' => 
        array (
        ),
        'controller' => '',
      ),
      4 => 
      array (
        'text' => 'Завершить все сеансы',
        'parent' => 'manage',
        'action' => '',
        'description' => 'Завершить все сеансы работы пользователей и произвести принудительный выход из системы всех пользователей.',
        'icon' => '',
        'menuindex' => 4,
        'params' => '',
        'handler' => 'MODx.msg.confirm({
    title: _(\'flush_sessions\')
    ,text: _(\'flush_sessions_confirm\')
    ,url: MODx.config.connector_url
    ,params: {
        action: \'security/flush\'
    }
    ,listeners: {
        \'success\': {fn:function() { location.href = \'./\'; },scope:this}
    }
});',
        'permissions' => 'flush_sessions',
        'namespace' => 'core',
        'action_controller' => NULL,
        'action_namespace' => NULL,
        'id' => 'flush_sessions',
        'children' => 
        array (
        ),
        'controller' => '',
      ),
      5 => 
      array (
        'text' => 'Отчёты',
        'parent' => 'manage',
        'action' => '',
        'description' => 'Различные отчеты MODX для администратора',
        'icon' => '',
        'menuindex' => 5,
        'params' => '',
        'handler' => '',
        'permissions' => 'menu_reports',
        'namespace' => 'core',
        'action_controller' => NULL,
        'action_namespace' => NULL,
        'id' => 'reports',
        'children' => 
        array (
          0 => 
          array (
            'text' => 'Расписание сайта',
            'parent' => 'reports',
            'action' => 'resource/site_schedule',
            'description' => 'Просмотр расписания публикаций и снятия с публикации.',
            'icon' => '',
            'menuindex' => 0,
            'params' => '',
            'handler' => '',
            'permissions' => 'view_document',
            'namespace' => 'core',
            'action_controller' => NULL,
            'action_namespace' => NULL,
            'id' => 'site_schedule',
            'children' => 
            array (
            ),
            'controller' => '',
          ),
          1 => 
          array (
            'text' => 'Журнал системы управления',
            'parent' => 'reports',
            'action' => 'system/logs',
            'description' => 'Просмотр последних действий менеджеров сайта.',
            'icon' => '',
            'menuindex' => 1,
            'params' => '',
            'handler' => '',
            'permissions' => 'logs',
            'namespace' => 'core',
            'action_controller' => NULL,
            'action_namespace' => NULL,
            'id' => 'view_logging',
            'children' => 
            array (
            ),
            'controller' => '',
          ),
          2 => 
          array (
            'text' => 'Журнал ошибок',
            'parent' => 'reports',
            'action' => 'system/event',
            'description' => 'Открыть error.log MODX.',
            'icon' => '',
            'menuindex' => 2,
            'params' => '',
            'handler' => '',
            'permissions' => 'view_eventlog',
            'namespace' => 'core',
            'action_controller' => NULL,
            'action_namespace' => NULL,
            'id' => 'eventlog_viewer',
            'children' => 
            array (
            ),
            'controller' => '',
          ),
          3 => 
          array (
            'text' => 'Информация о системе',
            'parent' => 'reports',
            'action' => 'system/info',
            'description' => 'Просмотр информации о сервере, настройках php, информации о базе данных mysql, и многое другое.',
            'icon' => '',
            'menuindex' => 3,
            'params' => '',
            'handler' => '',
            'permissions' => 'view_sysinfo',
            'namespace' => 'core',
            'action_controller' => NULL,
            'action_namespace' => NULL,
            'id' => 'view_sysinfo',
            'children' => 
            array (
            ),
            'controller' => '',
          ),
        ),
        'controller' => '',
      ),
    ),
    'controller' => '',
  ),
);