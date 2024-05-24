<?php 
namespace App\Http\Traits;

trait ConsultaApiCoinmarketcapTrait{

    public function escapeJsonString($value) { 
        $escapers = array("\'");
        $replacements = array("\\/");
        $result = str_replace($escapers, $replacements, $value);
        return $result;
    }

    public function consultaApiCoinmarketCap($symbol,$moneda){ 
            $url = 'https://pro-api.coinmarketcap.com/v1/cryptocurrency/quotes/latest';
            $parameters = [
            'symbol' => $symbol,
            'convert' => $moneda
            ];
    
            $headers = [
            'Accepts: application/json',
            'X-CMC_PRO_API_KEY: a3d40011-8f49-4c61-8707-62b34bee12ea'
            ];
            $qs = http_build_query($parameters); // query string encode the parameters
            $request = "{$url}?{$qs}"; // create the request URL
    
    
            $curl = curl_init(); // Get cURL resource
            // Set cURL options
            curl_setopt_array($curl, array(
            CURLOPT_URL => $request,            // set the request URL
            CURLOPT_HTTPHEADER => $headers,     // set the headers 
            CURLOPT_RETURNTRANSFER => 1         // ask for raw response instead of bool
            ));
    
            $response = curl_exec($curl); // Send the request, save the response
            //print_r(json_decode($response)); // print json decoded response
            curl_close($curl); // Close request
            //return $response;
    
            $curl_response = $this->escapeJsonString($response);
            $curl_response = json_decode($curl_response,true);
    
            /*$proyectos = Proyectos::select('id','proyecto','ticker')->where('status',1)->get();
            return response()->json(['proyectos' => $proyectos], 200);*/
    
            return $curl_response['data'];
    }

}
