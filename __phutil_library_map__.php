<?php

/**
 * This file is automatically generated. Use 'arc liberate' to rebuild it.
 *
 * @generated
 * @phutil-library-version 2
 */
phutil_register_library_map(array(
  '__library_version__' => 2,
  'class' => array(
    'PhabricatorDiscordAuthProvider' => 'discordoauth/DiscordOAuthProvider.php',
    'PhutilDiscordAuthAdapter' => 'discordoauth/DiscordOAuthAdapter.php',
    'PhutilDiscordFuture' => 'discordoauth/DiscordOAuthFuture.php',
  ),
  'function' => array(),
  'xmap' => array(
    'PhabricatorDiscordAuthProvider' => 'PhabricatorOAuth2AuthProvider',
    'PhutilDiscordAuthAdapter' => 'PhutilOAuthAuthAdapter',
    'PhutilDiscordFuture' => 'FutureProxy',
  ),
));
