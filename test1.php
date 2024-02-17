<?php
    class VerifikasiToken{
        private static $tokens = [];
        public static function generate($user){
            $token = self::generateRandomString();
            if(!isset(self::$tokens[$user])){
                self::$tokens[$user] = [];
            }
            if(count(self::$tokens[$user]) >= 10){
                array_shift(self::$tokens[$user]);
            }
            self::$tokens[$user][] = $token;
            return $token;
        }
        
        public static function generateRandomString($length = 10){
            $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
            $charactersLength = strlen($characters);
            $randomString = '';
            for($i = 0; $i < $length; $i++){
                $randomString .= $characters[rand(0, $charactersLength -1)];
            }
            return $randomString;
        }
        public static function verify($user, $token){
            if(isset(self::$tokens[$user])){
                $index = array_search($token, self::$tokens[$user]);
                if($index !== false){
                    unset(self::$tokens[$user][$index]);
                    return true;
                }
            }
            return false;
        }  
    }
    $user = "user123";
    //generate token 
    $token1 = VerifikasiToken::generate($user);
    $token2 = VerifikasiToken::generate($user);

    echo "Token 1: $token1\n";
    echo "Token 2: $token2\n";

    //verifikasi token 
    $verif = VerifikasiToken::verify($user, $token1);
    if($verif){
        echo " Token 1 berhasil diverifikasi.\n";
    }else{
        echo "Token 1 tidak valid atau sudah diverifikasi sebelumya.\n";
    }
    //verifikasi token kedua
    $verif = VerifikasiToken::verify($user, $token2);
    if($verif){
        echo "Token 1 berhasil diverifikasi kedua kali.\n";
    }else{
        echo "Token 1 tidak valid atau sudah diverifikasi sebelumnya.\n";
    }
?>