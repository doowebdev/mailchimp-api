<?php
namespace Doowebdev;
{
    use GuzzleHttp\Client;

    /**
     * Class MailChimpApi
     * @package Doowebdev
     */
    class MailChimpApi
    {
        /**
         * @var
         */
        private $apiKey;
        /**
         * @var string
         */
        private $endpoint;
        /**
         * @var Client
         */
        private $guzzle;

        const FORMAT    = 'json';
        const DC        = 'us1';
        const ERROR_MSG = 'Please provide a MailChimp API key';
        const TIMEOUT   = 60;

        /**
         * @param $apiKey
         *
         * @throws \Exception
         */
        public function __construct($apiKey)
        {
            $this->guzzle = new Client();

            if (!$apiKey) {
                throw new \Exception(self::ERROR_MSG);

            } else {
                list(, $dataCentre) = explode('-', $apiKey);

                if (!$dataCentre) {
                    $dataCentre = self::DC;
                }

                $this->endpoint  = 'https://' . $dataCentre . '.api.mailchimp.com/2.0';
                $this->apiKey = $apiKey;
            }
        }

        /**
         * @param       $method
         * @param array $postFields
         *
         * @return mixed
         */
        public function run($method, $postFields = [])
        {
            $postFields['apikey'] = $this->apiKey;

            $request = $this->guzzle->post(
                $this->endpoint . '/' . $method . '.' . self::FORMAT,
                $this->requestOptions($postFields)
            );

            return $this->response($request);
        }


        /**
         * @param $postFields
         *
         * @return array
         */
        private function requestOptions($postFields)
        {
            return [
                'body'    => [$postFields],
                'headers' => [
                    'User-Agent' => 'Mozilla/5.0 (compatible; Konqueror/4.0; Microsoft Windows) KHTML/4.0.80 (like Gecko)',
                    'Accept'     => 'application/' . self::FORMAT
                ],
                'timeout' => self::TIMEOUT

            ];
        }

        /**
         * @param $response
         *
         * @return mixed
         */
        private function response($response)
        {
            $format = self::FORMAT;

            return $response->$format();
        }
    }
}
