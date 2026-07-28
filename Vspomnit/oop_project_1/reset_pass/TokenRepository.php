<?php

namespace Vspomnit\oop_project_1\reset_pass;

use DateTimeImmutable;
use PDO;

class TokenRepository // этот же токен уже берёт и взаимодейцствует с тем что ьы до этого писали в классе токен, и взиамодкйствет с бд
{
    private PDO $pdo;
    public function __construct(PDO $pdo) { // более удобный варриант подключения к бд, и более гибкий, так как он не будет за одним классом таким образом закреплён
        $this->pdo = $pdo;
    }
    public function save(int $user_id, Token $token): void // тут у нас Token $token обьект класса токен ждётся мы бдует его длаьше вызывать и заполнять им бд
    {
        $smtm = $this->pdo->prepare("INSERT INTO resset_password.resset_pass (user_id, token_hash, used_at, expiries_at) VALUES (?,?,?,?)");
        $smtm->execute([
            $user_id,
            $token->getToken(),
            $token->getUsedAt()->format('Y-m-d H:i:s'),
            $token->getExpiriesAt()?->format('Y-m-d H:i:s')
        ]);
    }
    public function findToken(string $tokenHash): ?Token
    { // ишем по хещу токен создан ли бьыл такой
        $smtm = $this->pdo->prepare("SELECT token_hash, expiries_at, used_at FROM resset_password.resset_pass WHERE token_hash = ?");
        $smtm->execute([$tokenHash]);
        $toks = $smtm->fetchAll(PDO::FETCH_ASSOC);
        foreach ($toks as $tok) { // если ьыл создан то получаем его данные которы нам причатсы
            $token_hash = $tok['token_hash'];
            $usedAt = $tok['used_at'];
            $expiriasAt = $tok['expiries_at'];
        }

        if (empty($toks)) { // длаьше проверка на то найден ли она
            return null;
        }

        $token_hash = $tok['token_hash'];

        if ($toks['used_at']) { // использован лли он
            $usedAt = new DateTimeImmutable($toks['used_at']);
        }else {
            $usedAt = null;
        }
        //тут мы загатовили что бы проверить на то истёк лимо он
        $expiriasAt = new DateTimeImmutable($toks['expiries_at']); // для проверки истёк ли токен

        $tokenobj = new Token(
            $token_hash,
            $usedAt,
            $expiriasAt,
        );
        return $tokenobj;
    }
    public function markUsed(int $tokenHash): void
    {
        $smtm = $this->pdo->prepare("UPDATE resset_password.resset_pass SET used_at = ? WHERE token_hash = ?");
        $smtm->execute([(new DateTimeImmutable())->format('Y-m-d H:i:s') ,$tokenHash]);
    }
}