<?php

namespace Vspomnit\oop_project_1\reset_pass;

use PDO;

class PasswordResetService
{
        private PDO $pdo;
        private TokenRepository $tokenRepository;
        private \MailService  $mailService;
        public function __construct(PDO $pdo, TokenRepository $tokenRepository, \MailService  $mailService)
        {
            $this->pdo = $pdo;
            $this->TokenRepository = $tokenRepository;
            $this->MailService = $mailService;
        }
        public function resetPassword(string $email): void
        { // ишем по email полученному пользователя который регистрировася
            $smtm = $this->pdo->prepare("SELECT id FROM resset_password.resset_pass WHERE email = ?");
            $smtm->execute([$email]);
            $user = $smtm->fetch(PDO::FETCH_ASSOC);

            if (!$user) {
                return;
            }

            $userId = (int)$user['id'];

            [$plaintoken, $tokenObj] = Token::create_token(30);

            $this->TokenRepository->save($userId,$tokenObj);

            $link = ''; // тут потом сделать как с регистрацией закончу

            $this->MailService->send(
                $email,
                'Восстановление пароля',
                "Перейдите по ссылке для смены пароля: <a href='{$link}'>Сменить пароль</a>"
            );
        }

        public function changePassword(string $plaintoken, string $newPassword): bool
        { // проверка и отправление нового пароля
            $tokenHash = hash('sha256', $plaintoken);

            $token = $this->TokenRepository->findToken($tokenHash);

            if (!$token) {
                return false;
            }

            if ($token->isExpiried()) {
                return false;
            }

            if ($token->isUsed()) {
                return false;
            }
            $passwordHash = password_hash($newPassword, PASSWORD_DEFAULT);

            $smtm = $this->pdo->prepare("UPDATE resset_password.resset_pass SET password = ? WHERE token_hash = ?");
            $smtm->execute([$passwordHash, $tokenHash]);
            $token->markUsed();
            $this->TokenRepository->markUsed($tokenHash);
            return true;
        }
}