<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GetPosicionesArbitum extends Controller
{
    public function getPositions($wallet){
        
        $valorLoked = $this->getLokedValue($wallet);
        $valorStaked = $this->getStaking($wallet);
        
        $valorLokedScroll = $this->getLokedScrollValue($wallet);
        $valorSatkedScroll = $this->getStakedScroll($wallet);

        $valorLokedEthereum = $this->getLokedEthereumValue($wallet);
        $valorSatkedEthereum = $this->getStakedEthereum($wallet);

        return response()->json(["loked"=>$valorLoked,"staked"=>$valorStaked,"stakedScroll"=>$valorSatkedScroll,"lokedScroll"=>$valorLokedScroll,"stakedEthereum"=>$valorSatkedEthereum,"lokedEthereum"=>$valorLokedEthereum]);
    }

    public function getLokedValue($wallet){

        $client = new \GuzzleHttp\Client();

        $arrayloked = [];
        
        $response = $client->request('GET', 'https://api.zerion.io/v1/wallets/'.$wallet.'/positions/?filter[positions]=only_complex&currency=usd&filter[position_types]=locked&filter[chain_ids]=arbitrum&filter[trash]=only_non_trash&sort=value', [
        'headers' => [
        'accept' => 'application/json',
        'authorization' => 'Basic emtfZGV2X2I5OWQzOWYwYjk1MjQ4YTU5ODJlMjZlYjYwNTI3YTUwOg==',
                ],
            ]);
        
        $response = json_decode($response->getBody());
        
        foreach($response->data as $key=>$contenido){
             $positions = array(
                "name_protocol"=> $contenido->attributes->name,
                "monto_loked" => $contenido->attributes->quantity->float,
                "simbolo" => $contenido->attributes->fungible_info->symbol,
                "fiat_value" => $contenido->attributes->value,
                "icon_url" => $contenido->attributes->fungible_info->icon
            );

            array_push($arrayloked, $positions);
        }

        return $arrayloked;
    }

    public function getStaking($wallet){
        $client = new \GuzzleHttp\Client();

        $arraystaking = [];
        
        $response = $client->request('GET', 'https://api.zerion.io/v1/wallets/'.$wallet.'/positions/?filter[positions]=only_complex&currency=usd&filter[position_types]=staked&filter[chain_ids]=arbitrum&filter[trash]=only_non_trash&sort=value', [
        'headers' => [
        'accept' => 'application/json',
        'authorization' => 'Basic emtfZGV2X2I5OWQzOWYwYjk1MjQ4YTU5ODJlMjZlYjYwNTI3YTUwOg==',
                ],
            ]);
        
        $response = json_decode($response->getBody());
        
        foreach($response->data as $key=>$contenido){
             $positions = array(
                "name_protocol"=> $contenido->attributes->name,
                "monto_loked" => $contenido->attributes->quantity->float,
                "simbolo" => $contenido->attributes->fungible_info->symbol,
                "fiat_value" => $contenido->attributes->value,
                "icon_url" => $contenido->attributes->fungible_info->icon
            );

            array_push($arraystaking, $positions);
        }

        return $arraystaking;
    }

    public function getStakedScroll($wallet){
        $client = new \GuzzleHttp\Client();

        $arraystaking = [];

        $response = $client->request('GET', 'https://api.zerion.io/v1/wallets/'.$wallet.'/positions/?filter[positions]=only_complex&currency=usd&filter[position_types]=staked&filter[chain_ids]=scroll&filter[trash]=only_non_trash&sort=value', [
        'headers' => [
            'accept' => 'application/json',
            'authorization' => 'Basic emtfZGV2X2I5OWQzOWYwYjk1MjQ4YTU5ODJlMjZlYjYwNTI3YTUwOg==',
        ],
        ]);

        $response = json_decode($response->getBody());

        foreach($response->data as $key=>$contenido){
            $positions = array(
               "name_protocol"=> $contenido->attributes->name,
               "monto_loked" => $contenido->attributes->quantity->float,
               "simbolo" => $contenido->attributes->fungible_info->symbol,
               "fiat_value" => $contenido->attributes->value,
               "icon_url" => $contenido->attributes->fungible_info->icon
           );

           array_push($arraystaking, $positions);
       }

       return $arraystaking;
    }

    public function getLokedScrollValue($wallet){

        $client = new \GuzzleHttp\Client();

        $arraylokedScroll = [];

        $response = $client->request('GET', 'https://api.zerion.io/v1/wallets/'.$wallet.'/positions/?filter[positions]=only_complex&currency=usd&filter[position_types]=locked&filter[chain_ids]=scroll&filter[trash]=only_non_trash&sort=value', [
        'headers' => [
            'accept' => 'application/json',
            'authorization' => 'Basic emtfZGV2X2I5OWQzOWYwYjk1MjQ4YTU5ODJlMjZlYjYwNTI3YTUwOg==',
        ],
        ]);

        $response = json_decode($response->getBody());

        foreach($response->data as $key=>$contenido){
            $positions = array(
               "name_protocol"=> $contenido->attributes->name,
               "monto_loked" => $contenido->attributes->quantity->float,
               "simbolo" => $contenido->attributes->fungible_info->symbol,
               "fiat_value" => $contenido->attributes->value,
               "icon_url" => $contenido->attributes->fungible_info->icon
           );

           array_push($arraylokedScroll, $positions);
       }

       return $arraylokedScroll;
    }

    public function getStakedEthereum($wallet){
        $client = new \GuzzleHttp\Client();

        $arraystaking = [];

        $response = $client->request('GET', 'https://api.zerion.io/v1/wallets/'.$wallet.'/positions/?filter[positions]=only_complex&currency=usd&filter[position_types]=staked&filter[trash]=only_non_trash&sort=value', [
            'headers' => [
              'accept' => 'application/json',
              'authorization' => 'Basic emtfZGV2X2I5OWQzOWYwYjk1MjQ4YTU5ODJlMjZlYjYwNTI3YTUwOg==',
            ],
          ]);

        $response = json_decode($response->getBody());
        

        foreach($response->data as $key=>$contenido){
            $positions = array(
               "name_protocol"=> $contenido->attributes->name,
               "monto_loked" => $contenido->attributes->quantity->float,
               "simbolo" => $contenido->attributes->fungible_info->symbol,
               "fiat_value" => $contenido->attributes->value,
               "icon_url" => $contenido->attributes->fungible_info->icon
           );

           array_push($arraystaking, $positions);
       }

       return $arraystaking;
    }

    public function getLokedEthereumValue($wallet){

        $client = new \GuzzleHttp\Client();

        $arraylokedScroll = [];

        $response = $client->request('GET', 'https://api.zerion.io/v1/wallets/'.$wallet.'/positions/?filter[positions]=only_complex&currency=usd&filter[position_types]=locked&filter[trash]=only_non_trash&sort=value', [
            'headers' => [
              'accept' => 'application/json',
              'authorization' => 'Basic emtfZGV2X2I5OWQzOWYwYjk1MjQ4YTU5ODJlMjZlYjYwNTI3YTUwOg==',
            ],
          ]);
          

        $response = json_decode($response->getBody());

        foreach($response->data as $key=>$contenido){
            $positions = array(
               "name_protocol"=> $contenido->attributes->name,
               "monto_loked" => $contenido->attributes->quantity->float,
               "simbolo" => $contenido->attributes->fungible_info->symbol,
               "fiat_value" => $contenido->attributes->value,
               "icon_url" => $contenido->attributes->fungible_info->icon
           );

           array_push($arraylokedScroll, $positions);
       }

       return $arraylokedScroll;
    }


}
