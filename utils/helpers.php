<?php require_once(dirname(__FILE__).'/../vendor/autoload.php');//autoload packages
    session_start();
    $dotenv = new Dotenv\Dotenv(__DIR__.'/..');
    $dotenv->load();

    function get_domain(){
    //$domain = $_SERVER['HTTP_HOST'];
    //return $_SERVER['HTTP_HOST'];
    return getenv('SITE_URL');
}

    function parse_extras($rule)
{
    if ($rule[0] == "#") //1
    {
        $id = substr($rule,1,strlen($rule)); //2
        $data = ' id="' . $id . '"'; //3
        return $data;
    }

    if ($rule[0] == ".") //4
    {
        $class = substr($rule,1,strlen($rule));
        $data = ' class="' . $class . '"';
        return $data;
    }

    if ($rule[0] == "_") //5
    {
        $data = ' target="' . $rule . '"';
        return $data;
    }
}

    function anchor($link, $text, $title, $extras)//1
{
    $domain = get_domain();
    $link = $link;
    $data = '<a href="' . $link . '"';

    if ($title)
    {
        $data .= ' title="' . $title . '"';
    }
    else
    {
        $data .= ' title="' . $text . '"';
    }

    if (is_array($extras))//2
    {
        foreach($extras as $rule)//3
        {
            $data .= parse_extras($rule);//4
        }
    }

    if (is_string($extras))//5
    {
        $data .= parse_extras($extras);//6
    }

    $data.= '>';

    $data .= $text;
    $data .= "</a>";

    //echo $data;exit;

    return $data;
}

    function asset ($data){
        return get_domain().$data;
    }

    function chk_lgn(){
        if(!isset($_SESSION['logged_in'])){
            $url = getenv('SITE_URL')."/login";
            header ("Location: $url");
        }
    }

    function chk_adm(){
        chk_lgn();

        if($_SESSION['role'] != "admin"){
            $url = getenv('SITE_URL')."/login";
            header ("Location: $url");
        }
    }

    function sendmail($to,$name,$subj,$msg){
        $mail = new PHPMailer;
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = getenv('MAIL_HOST');  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = getenv('MAIL_USER');                 // SMTP username
        $mail->Password = getenv('MAIL_PASS');                           // SMTP password
        $mail->SMTPSecure = getenv('MAIL_DRIVER');                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = getenv('MAIL_PORT');                                    // TCP port to connect to

        $mail->setFrom(getenv('MAIL_USER'), getenv('MAIL_NAME'));
        $mail->addAddress($to, $name);     // Add a recipient

        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = $subj;
        $mail->Body    = $msg;

        if(!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            return true;
        }
    }

    function sms ($to,$msg){
        // Create a new instance of our awesome gateway class
        $gateway    = new AfricasTalkingGateway(getenv('SMS_USER'),getenv('SMS_KEY'));

        try
        {
            // Thats it, hit send and we'll take care of the rest.
            $results = $gateway->sendMessage($to, $msg);

            if($results){
                return true;
            }
            return false;
        }
        catch ( AfricasTalkingGatewayException $e )
        {
            echo "Encountered an error while sending: ".$e->getMessage();
        }

    }

    function value($name){
         return isset($_POST[$name]) ? $_POST[$name] : '';
     }

    function message($class,$msg){
        return '<div class="al-msg"><div class="alert alert-'.$class.'" role="alert">
        <span class="close" data-dismiss="alert">&times;</span>'.$msg .'</div></div>';
    }

    function parent($head){
        $name = basename($_SERVER['PHP_SELF']);

        $link = explode("_",$name);
        if ($head == $link[0]){
            return ' active';
        }
    }

    function child($child){
        $name = basename($_SERVER['PHP_SELF']);

        $temp = explode("_",$name);
        $link = explode(".",$temp[1]);
        if ($child == $link[0]){
            return ' active';
        }
    }

    function home($home){
        $name = basename($_SERVER['PHP_SELF']);
        $link = explode(".",$name);
        if ($home == $link[0]){
            return ' active';
        }
    }

    function dropdox($data = array(),$selected = null ){

    }

    function dump($data){
        echo "<pre>";
        print_r($data);exit;
    }

    function upload($file,$num,$dir = "",$name = null){
        $uploaddir = '../uploads/';
        $dir = $uploaddir.$dir.'/';
        $type = $_FILES[$file]['type'][$num];
        $temp = explode('/', $type);
        $extension = $temp[1];

        $doc = isset($name) ? $name.'.'.$extension : basename($_FILES[$file]['name'][$num]) ;
        $uploadfile = $dir.$doc;

        if(move_uploaded_file($_FILES[$file]['tmp_name'][$num],$uploadfile)){
            return $doc;
        }else{
            return false;
        }

    }
