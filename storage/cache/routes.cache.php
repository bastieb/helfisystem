<?php return array (
  0 => 
  array (
    'GET' => 
    array (
      '/' => 'HomeController@index',
      '/credits' => 'CreditsController@index',
      '/health' => 'HealthController@index',
      '/login' => 'AuthController@login',
      '/logout' => 'AuthController@logout',
      '/settings/password' => 'SettingsController@password',
      '/settings/oauth' => 'SettingsController@oauth',
      '/password/reset' => 'PasswordResetController@reset',
      '/metrics' => 'Metrics\\Controller@metrics',
      '/stats' => 'Metrics\\Controller@stats',
      '/news' => 'NewsController@index',
      '/meetings' => 'NewsController@meetings',
      '/faq' => 'FaqController@index',
      '/questions' => 'QuestionsController@index',
      '/questions/new' => 'QuestionsController@add',
      '/api' => 'ApiController@index',
      '/design' => 'DesignController@index',
      '/admin/faq' => 'Admin\\FaqController@edit',
      '/admin/logs' => 'Admin\\LogsController@index',
      '/admin/schedule' => 'Admin\\Schedule\\ImportSchedule@index',
      '/admin/schedule/edit' => 'Admin\\Schedule\\ImportSchedule@edit',
      '/admin/questions' => 'Admin\\QuestionsController@index',
      '/admin/news' => 'Admin\\NewsController@edit',
    ),
    'POST' => 
    array (
      '/login' => 'AuthController@postLogin',
      '/settings/password' => 'SettingsController@savePassword',
      '/password/reset' => 'PasswordResetController@postReset',
      '/questions' => 'QuestionsController@delete',
      '/questions/new' => 'QuestionsController@save',
      '/admin/faq' => 'Admin\\FaqController@save',
      '/admin/logs' => 'Admin\\LogsController@index',
      '/admin/schedule/edit' => 'Admin\\Schedule\\ImportSchedule@save',
      '/admin/questions' => 'Admin\\QuestionsController@delete',
      '/admin/news' => 'Admin\\NewsController@save',
    ),
  ),
  1 => 
  array (
    'GET' => 
    array (
      0 => 
      array (
        'regex' => '~^(?|/oauth/([^/]+)|/password/reset/(.+)()|/news/(\\d+)()()|/api/(.+)()()()|/admin/faq/(\\d+)()()()()|/admin/schedule/edit/(\\d+)()()()()()|/admin/schedule/load/(\\d+)()()()()()()|/admin/questions/(\\d+)()()()()()()()|/admin/user/(\\d+)/shirt()()()()()()()()|/admin/news/(\\d+)()()()()()()()()())$~',
        'routeMap' => 
        array (
          2 => 
          array (
            0 => 'OAuthController@index',
            1 => 
            array (
              'provider' => 'provider',
            ),
          ),
          3 => 
          array (
            0 => 'PasswordResetController@resetPassword',
            1 => 
            array (
              'token' => 'token',
            ),
          ),
          4 => 
          array (
            0 => 'NewsController@show',
            1 => 
            array (
              'id' => 'id',
            ),
          ),
          5 => 
          array (
            0 => 'ApiController@index',
            1 => 
            array (
              'resource' => 'resource',
            ),
          ),
          6 => 
          array (
            0 => 'Admin\\FaqController@edit',
            1 => 
            array (
              'id' => 'id',
            ),
          ),
          7 => 
          array (
            0 => 'Admin\\Schedule\\ImportSchedule@edit',
            1 => 
            array (
              'id' => 'id',
            ),
          ),
          8 => 
          array (
            0 => 'Admin\\Schedule\\ImportSchedule@loadSchedule',
            1 => 
            array (
              'id' => 'id',
            ),
          ),
          9 => 
          array (
            0 => 'Admin\\QuestionsController@edit',
            1 => 
            array (
              'id' => 'id',
            ),
          ),
          10 => 
          array (
            0 => 'Admin\\UserShirtController@editShirt',
            1 => 
            array (
              'id' => 'id',
            ),
          ),
          11 => 
          array (
            0 => 'Admin\\NewsController@edit',
            1 => 
            array (
              'id' => 'id',
            ),
          ),
        ),
      ),
    ),
    'POST' => 
    array (
      0 => 
      array (
        'regex' => '~^(?|/oauth/([^/]+)/connect|/oauth/([^/]+)/disconnect()|/password/reset/(.+)()()|/news/(\\d+)()()()|/news/comment/(\\d+)()()()()|/admin/faq/(\\d+)()()()()()|/admin/schedule/edit/(\\d+)()()()()()()|/admin/schedule/import/(\\d+)()()()()()()()|/admin/questions/(\\d+)()()()()()()()()|/admin/user/(\\d+)/shirt()()()()()()()()()|/admin/news/(\\d+)()()()()()()()()()())$~',
        'routeMap' => 
        array (
          2 => 
          array (
            0 => 'OAuthController@connect',
            1 => 
            array (
              'provider' => 'provider',
            ),
          ),
          3 => 
          array (
            0 => 'OAuthController@disconnect',
            1 => 
            array (
              'provider' => 'provider',
            ),
          ),
          4 => 
          array (
            0 => 'PasswordResetController@postResetPassword',
            1 => 
            array (
              'token' => 'token',
            ),
          ),
          5 => 
          array (
            0 => 'NewsController@comment',
            1 => 
            array (
              'id' => 'id',
            ),
          ),
          6 => 
          array (
            0 => 'NewsController@deleteComment',
            1 => 
            array (
              'id' => 'id',
            ),
          ),
          7 => 
          array (
            0 => 'Admin\\FaqController@save',
            1 => 
            array (
              'id' => 'id',
            ),
          ),
          8 => 
          array (
            0 => 'Admin\\Schedule\\ImportSchedule@save',
            1 => 
            array (
              'id' => 'id',
            ),
          ),
          9 => 
          array (
            0 => 'Admin\\Schedule\\ImportSchedule@importSchedule',
            1 => 
            array (
              'id' => 'id',
            ),
          ),
          10 => 
          array (
            0 => 'Admin\\QuestionsController@save',
            1 => 
            array (
              'id' => 'id',
            ),
          ),
          11 => 
          array (
            0 => 'Admin\\UserShirtController@saveShirt',
            1 => 
            array (
              'id' => 'id',
            ),
          ),
          12 => 
          array (
            0 => 'Admin\\NewsController@save',
            1 => 
            array (
              'id' => 'id',
            ),
          ),
        ),
      ),
    ),
  ),
);