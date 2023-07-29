<?php

require '../ConexaBlog/protected/vendor/autoload.php';
use GuzzleHttp\Client;

/**
 * This is the model class for table "tbl_user".
 *
 * The followings are the available columns in table 'tbl_user':
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $email
 */
class _BaseModel
{
    protected $api;

    public function __construct(string $entity)
    {
        $this->api = new Client([
            // Base URI is used with relative requests
            'base_uri' => $_ENV['BASE_URL_MY_DB'] . '/' . $entity . '/',
        ]);
    }

    public function all()
    {
        $response = $this->api->request('GET', '');
        return json_decode($response->getBody(), true);
    }

    public function get($params = [])
    {
        $response = $this->api->request('GET','',  [
            'query' => $params
        ]);
        return json_decode($response->getBody(), true);
    }

    public function post($params = [])
    {
        $response = $this->api->request('POST','', [
            'form_params' => $params
        ]);
        return json_decode($response->getBody(), true);
    }

    public function put($params = [])
    {
        $response = $this->api->request('PUT', '', [
            'form_params' => $params
        ]);
        return json_decode($response->getBody(), true);
    }

    public function delete($params = [])
    {
        $response = $this->api->request('DELETE', '', [
            'form_params' => $params
        ]);
        return json_decode($response->getBody(), true);
    }

}