<?php
class AuthenticationService
{
    public function __construct(IProfileDao $profile_dao, IToken $token, ILog $log)
    {
        $this->profile_dao = $profile_dao;
        $this->token = $token;
        $this->log = $log;
    }
    public function IsValid($account, $password)
    {
       // 根據 account 取得自訂密碼
       $passwordFromDao = $this->profile_dao->GetPassword($account);

       // 根據 account 取得 RSA token 目前的亂數
       $randomCode = $this->token->GetRandom($account);

       // 驗證傳入的 password 是否等於自訂密碼 + RSA token亂數
       $validPassword = $passwordFromDao.$randomCode;
       $isValid = $password == $validPassword;

       if (!$isValid)
       {
           // todo, 如何驗證當有非法登入的情況發生時，有正確地記錄log？
           $content = sprintf("account:%s try to login failed", $account);
           $this->log->Save($content);
       }

       return $isValid;
    }
}
