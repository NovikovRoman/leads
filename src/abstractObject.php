<?php
namespace Leads;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Psr7\Response;

abstract class abstractObject
{
    const API_POINT = 'https://api.leads.su/webmaster/';
    const MAX_REDIRECT = 5;
    const TIMEOUT = 15;

    protected $token;
    protected $client;
    protected $properties; // разрешенные атрибуты
    protected $objName; // вторая часть url для API-запроса
    protected $responseType = 'json';

    public function __construct($token, $objName)
    {
        $this->token = $token;
        $this->objName = $objName;
        $this->client = new Client();
    }

    public function __get($name)
    {
        if (in_array($name, $this->properties)) {
            return $this->$name;
        }
        throw new \InvalidArgumentException('__get not found ' . $name);
    }

    public function __set($name, $value)
    {
        if (!in_array($name, $this->properties)) {
            throw new \InvalidArgumentException('__set not found ' . $name);
        }
        $this->$name = $value;
    }

    /**Заполнение атрибутов данными из массива
     * Несуществующие атрибуты игнорируются
     * @param array $array
     * @return $this
     */
    public function fillFields(Array $array)
    {
        foreach ($array as $prop => $value) {
            try {
                $this->$prop = $value;
            } catch (\InvalidArgumentException $e) {
                // do nothing
            }
        }
        return $this;
    }

    /** GET запрос к API
     * @return bool|array|string
     */
    protected function get()
    {
        $res = null;
        $getParams = http_build_query($this->buildGetParams());
        $url = self::API_POINT . $this->objName . '?' . $getParams;
        try {
            $res = $this->client->request('GET', $url, $this->paramsRequest());
        } catch (ClientException $e) {
            return $e->getResponse()->getBody()->getContents();
        }
        return $this->handlerResponse($res);
    }

    /** POST запрос к API
     * @return bool|array|string
     */
    protected function post()
    {
        $url = self::API_POINT . $this->objName;
        $paramsRequest = $this->paramsRequest();
        $paramsRequest['form_params'] = $this->buildGetParams();
        try {
            $res = $this->client->request('POST', $url, $paramsRequest);
        } catch (ClientException $e) {
            return $e->getResponse()->getBody()->getContents();
        }
        return $this->handlerResponse($res);
    }

    /** Установка типа ответа (json|xml)
     * @param $type
     * @return string
     */
    protected function setResponseType($type)
    {
        $type = strtolower($type);
        $this->responseType = ($type != 'json' && $type != 'xml') ? 'json' : $type;
        return $this->responseType;
    }

    /** Обработчик ответа сервера
     * @param Response $res
     * @return bool|mixed|string
     */
    private function handlerResponse(Response $res)
    {
        if ($res->getStatusCode() != 200) {
            return false;
        }
        if ($this->responseType == 'json') {
            return json_decode($res->getBody()->getContents(), true);
        }
        return $res->getBody()->getContents();
    }

    /** Сборщик параметров для отправки серверу
     * @return array
     */
    private function buildGetParams()
    {
        $getParams = [
            'response_type' => $this->responseType,
            'token' => $this->token,
        ];
        foreach ($this->properties as $prop) {
            if (property_exists($this, $prop)) {
                $getParams[$prop] = $this->$prop;
            }
        }
        return $getParams;
    }

    /** Настройки для соединения
     * @return array
     */
    private function paramsRequest()
    {
        return [
            'allow_redirects' => [
                'max' => self::MAX_REDIRECT,
                'referer' => true,
            ],
            'timeout' => self::TIMEOUT,
        ];
    }
}