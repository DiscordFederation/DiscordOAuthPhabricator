<?php

final class PhabricatorDiscordAuthProvider
  extends PhabricatorOAuth2AuthProvider {

  public function getProviderName() {
    return pht('Discord');
  }

  protected function getProviderConfigurationHelp() {
    $login_uri = PhabricatorEnv::getURI($this->getLoginURI());

    return pht(
      "To configure Discord OAuth, create a new application here:".
      "\n\n".
      "https://discordapp.com/developers/applications".
      "\n\n".
      "When creating your application, use these settings:".
      "\n\n".
      "  - **Redirect URI:** Set this to: `%s`".
      "\n\n".
      "After completing configuration, copy the **Client ID** and ".
      "**Client Secret** to the fields above. (You may need to generate the ".
      "client secret by clicking 'New Secret' first.)",
      $login_uri);
  }

  protected function newOAuthAdapter() {
    return new PhutilDiscordAuthAdapter();
  }

  protected function getLoginIcon() {
    return 'Discord';
  }

}
