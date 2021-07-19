<?php

/**
 * Authentication adapter for Discord OAuth2.
 */
final class PhutilDiscordAuthAdapter extends PhutilOAuthAuthAdapter {

  public function getAdapterType() {
    return 'Discord';
  }

  public function getAdapterDomain() {
    return 'discord.com';
  }

  public function getAccountID() {
    $user = $this->getOAuthAccountData('id');
    return $user;
  }

  public function getAccountEmail() {
    $user = $this->getOAuthAccountData('email');
    $verified = $this->getOAuthAccountData('verified');
    if ($verified) {
      return $user;
    }
    else {
      return null;
    }
  }

  public function getAccountImageURI() {
    $avatar = $this->getOAuthAccountData('avatar');
    $user_id = $this->getAccountID();
    if (strpos($avatar, "a_") === 0) {
      $avatar = "https://cdn.discordapp.com/avatars/{$user_id}/{$avatar}.gif";
    }
    else {
      $avatar = "https://cdn.discordapp.com/avatars/{$user_id}/{$avatar}.png"; 
    }
    return $avatar;
  }

  public function getAccountName() {
    $user = $this->getOAuthAccountData('username');
    return $user;
  }

  protected function getAuthenticateBaseURI() {
    return 'https://discord.com/oauth2/authorize';
  }

  protected function getTokenBaseURI() {
    return 'https://discord.com/api/v9/oauth2/token';
  }

  public function getScope() {
    return 'identify email';
  }

  public function getExtraAuthenticateParameters() {
    return array(
      'response_type' => 'code',
    );
  }

  public function getExtraTokenParameters() {
    return array(
      'grant_type' => 'authorization_code',
    );
  }

  protected function loadOAuthAccountData() {
    return id(new PhutilDiscordFuture())
      ->setAccessToken($this->getAccessToken())
      ->setRawDiscordQuery('users/@me')
      ->resolve();
  }

}
