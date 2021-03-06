<?php
namespace App\Telegram;
use ChatWatch\Config;

class TelegramController implements \App\Core\ControllerInterface
{
    /**
     * @var \App\Core\Controller Main Controller
     */
    private $controller;

    /**
    * @var array conf bot information
    */
    private $conf;
    
    protected $requestParams = [];
    
    private $payload;
 
    private $class;

    public function __construct() 
    {
        $this->class = new TelegramClass();
        $this->conf = (new Config())->getConf('telegram');
    }
    
    public function main()
    {
        return \json_encode(['sucess' => false, 'message' => "Not implemeted"]);
    }
    
    public function getRequestParams()
    {
        return $this->requestParams;
    }
   
    public function setRequestParams(array $requestParams)
    {
        $this->requestParams = $requestParams;
        return $this;
    }

    public function setController(\App\Core\Controller $controller)
    {
        $this->controller = $controller;
        return $this;
    }
    
    public function getPayload() 
    {
        return $this->payload;
    }

    public function setPayload($payload) 
    {
        $this->payload = $payload;
        return $this;
    }
    
    /**
    * @route("POST")
    */
    public function setNewUpdates()
    {
        $params = $this->requestParams;
        if(isset($params['btk']) and $params['btk'] === $this->conf['botToken']){
            $payload = \json_decode(\file_get_contents('php://input'), true);
            if($this->class->setParams($this->getRequestParams())->setNewUpdates($payload) === true) {
                return ($this->controller->jsonSucess("Message saved."));
            } else {
                (new \App\Utils\Log())->logWrite(["payload" => $payload, "error" => $this->class->getError(), "params" => $this->getRequestParams()]);
                $error = ($this->class->getError() ?: 'Undefined error.');
                return ($this->controller->jsonError($error));
            }
        } else {
            return ($this->controller->jsonError("401 - Unauthorized"));
        }
    }
}