<?php

require_once($_SERVER["DOCUMENT_ROOT"] . '/src/models/user.php');
require_once($_SERVER["DOCUMENT_ROOT"] . '/src/services/authService.php');
require_once($_SERVER["DOCUMENT_ROOT"] . '/src/repositories/userRepository.php');

/** A hook to get the current user. */
function useUser(): User | null {
  if (!AuthService::isValid()) {
    return null;
  }

  $user_repo = new UserRepository();
  $user = $user_repo->read(AuthService::getUserId());

  return $user;
}
