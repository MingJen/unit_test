<?php
class AuthenticationService
{
    public function __construct(IProfileDao $profile_dao, IToken $token)
    {
        $this->profile_dao = $profile_dao;
        $this->token = $token;
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

       return $isValid;
    }
}
