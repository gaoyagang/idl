<?php
class http {
        /**
     * curl POST
     * @param string $url       请求地址
     * @param array  $data      post参数
     * @param array  $header    发送头信息
     * $param int    $timeout   curl执行超时时间
     * @Param int    $port      端口
     * @return mixed
     * 支付宝那边的请求超时时间大概为18秒
     */
    public function post($url, $data = array(), $header = array(), $timeout = 5, $port = 80) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 2); // 超时时间
        curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
        //curl_setopt($ch, CURLOPT_PORT, $port);
        !empty ($header) && curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

        $result = array();
        $result['result'] = curl_exec($ch);
        if (0 != curl_errno($ch)) {
            $result['error']  = "Error:\n" . curl_error($ch);
        }
        curl_close($ch);
        return $result;
    }


    /**
     * curl GET
     * @param string $url       请求地址
     * $param int    $timeout   curl执行超时时间
     * @Param int    $port      端口
     * @return mixed
     * 支付宝那边的请求超时时间大概为18秒
     */
    public function get($url, $timeout = 20, $port = 80) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 2); // 超时时间
        curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);

        $result = array();
        $result['result'] = curl_exec($ch);
        if (0 != curl_errno($ch)) {
            $result['error']  = "Error:\n" . curl_error($ch);
        }
        curl_close($ch);
        return $result;
    }
}
?>