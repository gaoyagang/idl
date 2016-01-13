<?php
// 微信企业号SDK父类
class enterprise {
    // 企业号接口host
    const HOST = 'https://qyapi.weixin.qq.com/cgi-bin';
    // 获得token地址
    const GET_TOKEN_URL = '/gettoken?';


    public function __construct() {
    }

    /*
     * 获得token
     * params: corpid => 企业Id,
     *         corpsecret => 管理组的凭证密钥
     * return: array(access_token => 获取到的凭证, expires_in => 凭证的有效时间（秒）)
     */
    public function getToken($corpid, $corpsecret) {
        $params = array(
            'corpid' => $corpid,
            'corpsecret' => $corpsecret
        );
        $token_info = Requests::get(self::HOST . self::GET_TOKEN_URL . http_build_query($params)) -> body;
        return json_decode($token_info, true);
    }
}
?>