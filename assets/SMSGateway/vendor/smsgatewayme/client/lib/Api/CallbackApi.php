<?php
/**
 * CallbackApi
 * PHP version 5
 *
 * @category Class
 * @package  SMSGatewayMe\Client
 * @author   http://github.com/swagger-api/swagger-codegen
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache Licene v2
 * @link     https://github.com/swagger-api/swagger-codegen
 */
/**
 *  Copyright 2016 SmartBear Software
 *
 *  Licensed under the Apache License, Version 2.0 (the "License");
 *  you may not use this file except in compliance with the License.
 *  You may obtain a copy of the License at
 *
 *      http://www.apache.org/licenses/LICENSE-2.0
 *
 *  Unless required by applicable law or agreed to in writing, software
 *  distributed under the License is distributed on an "AS IS" BASIS,
 *  WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 *  See the License for the specific language governing permissions and
 *  limitations under the License.
 */

/**
 * NOTE: This class is auto generated by the swagger code generator program. 
 * https://github.com/swagger-api/swagger-codegen 
 * Do not edit the class manually.
 */

namespace SMSGatewayMe\Client\Api;

use \SMSGatewayMe\Client\Configuration;
use \SMSGatewayMe\Client\ApiClient;
use \SMSGatewayMe\Client\ApiException;
use \SMSGatewayMe\Client\ObjectSerializer;

/**
 * CallbackApi Class Doc Comment
 *
 * @category Class
 * @package  SMSGatewayMe\Client
 * @author   http://github.com/swagger-api/swagger-codegen
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache Licene v2
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class CallbackApi
{

    /**
     * API Client
     * @var \SMSGatewayMe\Client\ApiClient instance of the ApiClient
     */
    protected $apiClient;
  
    /**
     * Constructor
     * @param \SMSGatewayMe\Client\ApiClient|null $apiClient The api client to use
     */
    function __construct($apiClient = null)
    {
        if ($apiClient == null) {
            $apiClient = new ApiClient();
            $apiClient->getConfig()->setHost('https://smsgateway.me/api/v4');
        }
  
        $this->apiClient = $apiClient;
    }
  
    /**
     * Get API client
     * @return \SMSGatewayMe\Client\ApiClient get the API client
     */
    public function getApiClient()
    {
        return $this->apiClient;
    }
  
    /**
     * Set the API client
     * @param \SMSGatewayMe\Client\ApiClient $apiClient set the API client
     * @return CallbackApi
     */
    public function setApiClient(ApiClient $apiClient)
    {
        $this->apiClient = $apiClient;
        return $this;
    }
  
    
    /**
     * createCallback
     *
     * Create Callback
     *
     * @param \SMSGatewayMe\Client\Model\CreateCallbackRequest $callback callback to create (required)
     * @return \SMSGatewayMe\Client\Model\Callback
     * @throws \SMSGatewayMe\Client\ApiException on non-2xx response
     */
    public function createCallback($callback)
    {
        list($response, $statusCode, $httpHeader) = $this->createCallbackWithHttpInfo ($callback);
        return $response; 
    }


    /**
     * createCallbackWithHttpInfo
     *
     * Create Callback
     *
     * @param \SMSGatewayMe\Client\Model\CreateCallbackRequest $callback callback to create (required)
     * @return Array of \SMSGatewayMe\Client\Model\Callback, HTTP status code, HTTP response headers (array of strings)
     * @throws \SMSGatewayMe\Client\ApiException on non-2xx response
     */
    public function createCallbackWithHttpInfo($callback)
    {
        
        // verify the required parameter 'callback' is set
        if ($callback === null) {
            throw new \InvalidArgumentException('Missing the required parameter $callback when calling createCallback');
        }
  
        // parse inputs
        $resourcePath = "/callback";
        $httpBody = '';
        $queryParams = array();
        $headerParams = array();
        $formParams = array();
        $_header_accept = ApiClient::selectHeaderAccept(array('application/json'));
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = ApiClient::selectHeaderContentType(array());
  
        
        
        
        // default format to json
        $resourcePath = str_replace("{format}", "json", $resourcePath);

        
        // body params
        $_tempBody = null;
        if (isset($callback)) {
            $_tempBody = $callback;
        }
  
        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        } elseif (count($formParams) > 0) {
            $httpBody = $formParams; // for HTTP post (form)
        }
        
        // this endpoint requires API key authentication
        $apiKey = $this->apiClient->getApiKeyWithPrefix('Authorization');
        if (strlen($apiKey) !== 0) {
            $headerParams['Authorization'] = $apiKey;
        }
        
        
        // make the API Call
        try {
            list($response, $statusCode, $httpHeader) = $this->apiClient->callApi(
                $resourcePath, 'POST',
                $queryParams, $httpBody,
                $headerParams, '\SMSGatewayMe\Client\Model\Callback'
            );
            
            if (!$response) {
                return array(null, $statusCode, $httpHeader);
            }

            return array(\SMSGatewayMe\Client\ObjectSerializer::deserialize($response, '\SMSGatewayMe\Client\Model\Callback', $httpHeader), $statusCode, $httpHeader);
            
        } catch (ApiException $e) {
            switch ($e->getCode()) { 
            case 200:
                $data = \SMSGatewayMe\Client\ObjectSerializer::deserialize($e->getResponseBody(), '\SMSGatewayMe\Client\Model\Callback', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            case 400:
                $data = \SMSGatewayMe\Client\ObjectSerializer::deserialize($e->getResponseBody(), '\SMSGatewayMe\Client\Model\ErrorResponse', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            case 401:
                $data = \SMSGatewayMe\Client\ObjectSerializer::deserialize($e->getResponseBody(), '\SMSGatewayMe\Client\Model\ErrorResponse', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            case 403:
                $data = \SMSGatewayMe\Client\ObjectSerializer::deserialize($e->getResponseBody(), '\SMSGatewayMe\Client\Model\ErrorResponse', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            case 500:
                $data = \SMSGatewayMe\Client\ObjectSerializer::deserialize($e->getResponseBody(), '\SMSGatewayMe\Client\Model\FatalResponse', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            default:
                $data = \SMSGatewayMe\Client\ObjectSerializer::deserialize($e->getResponseBody(), '\SMSGatewayMe\Client\Model\FatalResponse', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            }
  
            throw $e;
        }
    }
    
    /**
     * getCallback
     *
     * Get a specific callback
     *
     * @param string $id  (required)
     * @return \SMSGatewayMe\Client\Model\Callback
     * @throws \SMSGatewayMe\Client\ApiException on non-2xx response
     */
    public function getCallback($id)
    {
        list($response, $statusCode, $httpHeader) = $this->getCallbackWithHttpInfo ($id);
        return $response; 
    }


    /**
     * getCallbackWithHttpInfo
     *
     * Get a specific callback
     *
     * @param string $id  (required)
     * @return Array of \SMSGatewayMe\Client\Model\Callback, HTTP status code, HTTP response headers (array of strings)
     * @throws \SMSGatewayMe\Client\ApiException on non-2xx response
     */
    public function getCallbackWithHttpInfo($id)
    {
        
        // verify the required parameter 'id' is set
        if ($id === null) {
            throw new \InvalidArgumentException('Missing the required parameter $id when calling getCallback');
        }
  
        // parse inputs
        $resourcePath = "/callback/{id}";
        $httpBody = '';
        $queryParams = array();
        $headerParams = array();
        $formParams = array();
        $_header_accept = ApiClient::selectHeaderAccept(array('application/json'));
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = ApiClient::selectHeaderContentType(array());
  
        
        
        // path params
        
        if ($id !== null) {
            $resourcePath = str_replace(
                "{" . "id" . "}",
                $this->apiClient->getSerializer()->toPathValue($id),
                $resourcePath
            );
        }
        // default format to json
        $resourcePath = str_replace("{format}", "json", $resourcePath);

        
        
  
        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        } elseif (count($formParams) > 0) {
            $httpBody = $formParams; // for HTTP post (form)
        }
        
        // this endpoint requires API key authentication
        $apiKey = $this->apiClient->getApiKeyWithPrefix('Authorization');
        if (strlen($apiKey) !== 0) {
            $headerParams['Authorization'] = $apiKey;
        }
        
        
        // make the API Call
        try {
            list($response, $statusCode, $httpHeader) = $this->apiClient->callApi(
                $resourcePath, 'GET',
                $queryParams, $httpBody,
                $headerParams, '\SMSGatewayMe\Client\Model\Callback'
            );
            
            if (!$response) {
                return array(null, $statusCode, $httpHeader);
            }

            return array(\SMSGatewayMe\Client\ObjectSerializer::deserialize($response, '\SMSGatewayMe\Client\Model\Callback', $httpHeader), $statusCode, $httpHeader);
            
        } catch (ApiException $e) {
            switch ($e->getCode()) { 
            case 200:
                $data = \SMSGatewayMe\Client\ObjectSerializer::deserialize($e->getResponseBody(), '\SMSGatewayMe\Client\Model\Callback', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            case 400:
                $data = \SMSGatewayMe\Client\ObjectSerializer::deserialize($e->getResponseBody(), '\SMSGatewayMe\Client\Model\ErrorResponse', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            case 401:
                $data = \SMSGatewayMe\Client\ObjectSerializer::deserialize($e->getResponseBody(), '\SMSGatewayMe\Client\Model\ErrorResponse', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            case 403:
                $data = \SMSGatewayMe\Client\ObjectSerializer::deserialize($e->getResponseBody(), '\SMSGatewayMe\Client\Model\ErrorResponse', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            case 500:
                $data = \SMSGatewayMe\Client\ObjectSerializer::deserialize($e->getResponseBody(), '\SMSGatewayMe\Client\Model\FatalResponse', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            default:
                $data = \SMSGatewayMe\Client\ObjectSerializer::deserialize($e->getResponseBody(), '\SMSGatewayMe\Client\Model\FatalResponse', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            }
  
            throw $e;
        }
    }
    
    /**
     * searchCallbacks
     *
     * Search callbacks
     *
     * @param \SMSGatewayMe\Client\Model\Search $search Search Criteria (optional)
     * @return \SMSGatewayMe\Client\Model\CallbackSearchResult
     * @throws \SMSGatewayMe\Client\ApiException on non-2xx response
     */
    public function searchCallbacks($search = null)
    {
        list($response, $statusCode, $httpHeader) = $this->searchCallbacksWithHttpInfo ($search);
        return $response; 
    }


    /**
     * searchCallbacksWithHttpInfo
     *
     * Search callbacks
     *
     * @param \SMSGatewayMe\Client\Model\Search $search Search Criteria (optional)
     * @return Array of \SMSGatewayMe\Client\Model\CallbackSearchResult, HTTP status code, HTTP response headers (array of strings)
     * @throws \SMSGatewayMe\Client\ApiException on non-2xx response
     */
    public function searchCallbacksWithHttpInfo($search = null)
    {
        
  
        // parse inputs
        $resourcePath = "/callback/search";
        $httpBody = '';
        $queryParams = array();
        $headerParams = array();
        $formParams = array();
        $_header_accept = ApiClient::selectHeaderAccept(array('application/json'));
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = ApiClient::selectHeaderContentType(array());
  
        
        
        
        // default format to json
        $resourcePath = str_replace("{format}", "json", $resourcePath);

        
        // body params
        $_tempBody = null;
        if (isset($search)) {
            $_tempBody = $search;
        }
  
        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        } elseif (count($formParams) > 0) {
            $httpBody = $formParams; // for HTTP post (form)
        }
        
        // this endpoint requires API key authentication
        $apiKey = $this->apiClient->getApiKeyWithPrefix('Authorization');
        if (strlen($apiKey) !== 0) {
            $headerParams['Authorization'] = $apiKey;
        }
        
        
        // make the API Call
        try {
            list($response, $statusCode, $httpHeader) = $this->apiClient->callApi(
                $resourcePath, 'POST',
                $queryParams, $httpBody,
                $headerParams, '\SMSGatewayMe\Client\Model\CallbackSearchResult'
            );
            
            if (!$response) {
                return array(null, $statusCode, $httpHeader);
            }

            return array(\SMSGatewayMe\Client\ObjectSerializer::deserialize($response, '\SMSGatewayMe\Client\Model\CallbackSearchResult', $httpHeader), $statusCode, $httpHeader);
            
        } catch (ApiException $e) {
            switch ($e->getCode()) { 
            case 200:
                $data = \SMSGatewayMe\Client\ObjectSerializer::deserialize($e->getResponseBody(), '\SMSGatewayMe\Client\Model\CallbackSearchResult', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            case 400:
                $data = \SMSGatewayMe\Client\ObjectSerializer::deserialize($e->getResponseBody(), '\SMSGatewayMe\Client\Model\ErrorResponse', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            case 401:
                $data = \SMSGatewayMe\Client\ObjectSerializer::deserialize($e->getResponseBody(), '\SMSGatewayMe\Client\Model\ErrorResponse', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            case 403:
                $data = \SMSGatewayMe\Client\ObjectSerializer::deserialize($e->getResponseBody(), '\SMSGatewayMe\Client\Model\ErrorResponse', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            case 500:
                $data = \SMSGatewayMe\Client\ObjectSerializer::deserialize($e->getResponseBody(), '\SMSGatewayMe\Client\Model\FatalResponse', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            default:
                $data = \SMSGatewayMe\Client\ObjectSerializer::deserialize($e->getResponseBody(), '\SMSGatewayMe\Client\Model\FatalResponse', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            }
  
            throw $e;
        }
    }
    
    /**
     * updateCallback
     *
     * Update callback
     *
     * @param string $id  (required)
     * @param \SMSGatewayMe\Client\Model\UpdateCallbackRequest[] $callback callback update data (required)
     * @return \SMSGatewayMe\Client\Model\Callback
     * @throws \SMSGatewayMe\Client\ApiException on non-2xx response
     */
    public function updateCallback($id, $callback)
    {
        list($response, $statusCode, $httpHeader) = $this->updateCallbackWithHttpInfo ($id, $callback);
        return $response; 
    }


    /**
     * updateCallbackWithHttpInfo
     *
     * Update callback
     *
     * @param string $id  (required)
     * @param \SMSGatewayMe\Client\Model\UpdateCallbackRequest[] $callback callback update data (required)
     * @return Array of \SMSGatewayMe\Client\Model\Callback, HTTP status code, HTTP response headers (array of strings)
     * @throws \SMSGatewayMe\Client\ApiException on non-2xx response
     */
    public function updateCallbackWithHttpInfo($id, $callback)
    {
        
        // verify the required parameter 'id' is set
        if ($id === null) {
            throw new \InvalidArgumentException('Missing the required parameter $id when calling updateCallback');
        }
        // verify the required parameter 'callback' is set
        if ($callback === null) {
            throw new \InvalidArgumentException('Missing the required parameter $callback when calling updateCallback');
        }
  
        // parse inputs
        $resourcePath = "/callback/{id}";
        $httpBody = '';
        $queryParams = array();
        $headerParams = array();
        $formParams = array();
        $_header_accept = ApiClient::selectHeaderAccept(array('application/json'));
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = ApiClient::selectHeaderContentType(array());
  
        
        
        // path params
        
        if ($id !== null) {
            $resourcePath = str_replace(
                "{" . "id" . "}",
                $this->apiClient->getSerializer()->toPathValue($id),
                $resourcePath
            );
        }
        // default format to json
        $resourcePath = str_replace("{format}", "json", $resourcePath);

        
        // body params
        $_tempBody = null;
        if (isset($callback)) {
            $_tempBody = $callback;
        }
  
        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        } elseif (count($formParams) > 0) {
            $httpBody = $formParams; // for HTTP post (form)
        }
        
        // this endpoint requires API key authentication
        $apiKey = $this->apiClient->getApiKeyWithPrefix('Authorization');
        if (strlen($apiKey) !== 0) {
            $headerParams['Authorization'] = $apiKey;
        }
        
        
        // make the API Call
        try {
            list($response, $statusCode, $httpHeader) = $this->apiClient->callApi(
                $resourcePath, 'PUT',
                $queryParams, $httpBody,
                $headerParams, '\SMSGatewayMe\Client\Model\Callback'
            );
            
            if (!$response) {
                return array(null, $statusCode, $httpHeader);
            }

            return array(\SMSGatewayMe\Client\ObjectSerializer::deserialize($response, '\SMSGatewayMe\Client\Model\Callback', $httpHeader), $statusCode, $httpHeader);
            
        } catch (ApiException $e) {
            switch ($e->getCode()) { 
            case 200:
                $data = \SMSGatewayMe\Client\ObjectSerializer::deserialize($e->getResponseBody(), '\SMSGatewayMe\Client\Model\Callback', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            case 400:
                $data = \SMSGatewayMe\Client\ObjectSerializer::deserialize($e->getResponseBody(), '\SMSGatewayMe\Client\Model\ErrorResponse', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            case 401:
                $data = \SMSGatewayMe\Client\ObjectSerializer::deserialize($e->getResponseBody(), '\SMSGatewayMe\Client\Model\ErrorResponse', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            case 403:
                $data = \SMSGatewayMe\Client\ObjectSerializer::deserialize($e->getResponseBody(), '\SMSGatewayMe\Client\Model\ErrorResponse', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            case 500:
                $data = \SMSGatewayMe\Client\ObjectSerializer::deserialize($e->getResponseBody(), '\SMSGatewayMe\Client\Model\FatalResponse', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            default:
                $data = \SMSGatewayMe\Client\ObjectSerializer::deserialize($e->getResponseBody(), '\SMSGatewayMe\Client\Model\FatalResponse', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            }
  
            throw $e;
        }
    }
    
}
