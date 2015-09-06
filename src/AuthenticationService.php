<?php
class AuthenticationService
{
    public function IsValid($account, $password)
    {
       // 根據 account 取得自訂密碼
       $profileDao = new ProfileDao();
       $passwordFromDao = $profileDao->GetPassword($account);

       // 根據 account 取得 RSA token 目前的亂數
       $rsaToken = new RsaTokenDao();
       $randomCode = $rsaToken->GetRandom($account);

       // 驗證傳入的 password 是否等於自訂密碼 + RSA token亂數
       $validPassword = $passwordFromDao.$randomCode;
       $isValid = $password == $validPassword;

       return $isValid;
    }
}
