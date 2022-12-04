<?php
class Remote {
    public string $ip;
    public string $ipv4;
    public string $ipv6;
    public string $remoteHost;
    public bool $ipv6_on;
    function __construct(){
        $this->ip = $_SERVER['REMOTE_ADDR'];
        $this->remoteHost =$_SERVER['REMOTE_HOST']?: gethostbyaddr($_SERVER["REMOTE_ADDR"]);
        if(filter_var($this->ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)){
            $this->ipv4 = $this->ip;
            $this->ipv6_on =false;
        }

        if(filter_var($this->ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)){
            $this->ipv6 = $this->ip;
            $this->ipv6_on =true;
        }
    }
    function get_json() {
        return json_encode($this);
    }
}
$user = new Remote();
echo $user->get_json()
?>