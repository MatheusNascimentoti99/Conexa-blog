<?php

require '../ConexaBlog/protected/vendor/autoload.php';
use GuzzleHttp\Client;

/**
 * Class _BaseModel
 * @package ConexaBlog\protected\models
 * @property Client $api
 * @property string $entity
 */

class _BaseModel
{
    protected $api;
    private $entity;
    public $error = null;

    private $_embedded = [];
    private $_expand = [];

    public function __construct(string $entity)
    {
        $this->entity = $entity;
        $this->api = new Client([
            // Base URI is used with relative requests
            'base_uri' => $_ENV['BASE_URL_MY_DB'] . '/' . $entity . '/',
        ]);
    }

    public function withEmbedded(array $relations)
    {
        $this->_embedded = $relations;
        
    }

    public function withExpand(array $relations)
    {
        $this->_expand = $relations;
    }

    public function all(array $params = [])
    {
        $params = array_merge($params, [
            '_expand' => implode(',', $this->_expand),
            '_embed' => implode(',', $this->_embedded)
        ]);
        $response = $this->api->request(
            'GET',
            '',
            [
                'query' => $params
            ]
        );
        if ($response->getStatusCode() == 200) {
            return json_decode($response->getBody(), true);
        } else {
            $this->error = 'Não foi possível obter os dados de ' . $this->entity;
        }
    }

    public function get($id, array $params = [])
    {
        $params = array_merge($params, [
            '_expand' => implode(',', $this->_expand),
            '_embed' => implode(',', $this->_embedded)
        ]);
        $response = $this->api->request('GET', "{$id}", [
            'query' => $params
        ]);
        if ($response->getStatusCode() == 200) {
            return json_decode($response->getBody(), true);
        } else {

            $this->error = 'Não foi possível obter os dados de ' . $this->entity;

        }
    }

    public function post(array $params = [])
    {
        $response = $this->api->request('POST', '', [
            'form_params' => $params
        ]);
        if ($response->getStatusCode() == 201) {
            return json_decode($response->getBody(), true);
        } else {
            $this->error = 'Não foi possível realizar operação';
        }
    }

    public function put($id, array $params = [])
    {
        $response = $this->api->request('PUT', "{$id}", [
            'form_params' => $params
        ]);
        if ($response->getStatusCode() == 200) {
            return json_decode($response->getBody(), true);
        } else {
            $this->error = 'Não foi possível realizar operação';
        }
    }

    public function delete($id, array $params = [])
    {
        $response = $this->api->request('DELETE', "{$id}", [
            'form_params' => $params
        ]);
        if ($response->getStatusCode() == 200) {
            return json_decode($response->getBody(), true);
        } else {
            $this->error = 'Não foi possível realizar operação';
        }
    }

}