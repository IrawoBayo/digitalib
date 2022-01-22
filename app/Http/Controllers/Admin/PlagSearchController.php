<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use JanDrda\LaravelGoogleCustomSearchEngine\LaravelGoogleCustomSearchEngine;

class PlagSearchController extends Controller
{
    public function index()
    {
        // return view('admin.plag-search');
        // $cleanQuery = 'Hello world';
        // $curl = curl_init();
        // curl_setopt($curl, CURLOPT_URL, 'https://www.google.com/search?q='.$cleanQuery);
        // curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        // curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        // $result = curl_exec($curl);
        // curl_close($curl);

        // die($result);

        // $searchResults = new GoogleSearch();
        // $searchResults->setEngineId('8879f0271d655f718');
        // $searchResults->getResults('The meaning of life');
        
        // $fulltext = new LaravelGoogleCustomSearchEngine(); // initialize
        // $fulltext->setEngineId('8879f0271d655f718');
        // $fulltext->setApiKey('AIzaSyBdsfqWf0-gILsJbpxpvulZLFZ7oAUDt_8');
        // $results = $fulltext->getResults('Hello world');
        // print_r($results);

    //     $client = new \GuzzleHttp\Client();
    // $request = $client->get('https://www.googleapis.com/customsearch/v1?key=AIzaSyBdsfqWf0-gILsJbpxpvulZLFZ7oAUDt_8&cx=8879f0271d655f718&q=lectures');
    // $response = $request->getBody();
   
    // dd($response);
    $parameters = array(
        'start' => 1, // start from the 10th results,
        'num' => 10 // number of results to get, 10 is maximum and also default value
    );
    $fulltext = new LaravelGoogleCustomSearchEngine();
    $fulltext->setEngineId('8879f0271d655f718');
    $fulltext->setApiKey('AIzaSyBdsfqWf0-gILsJbpxpvulZLFZ7oAUDt_8');
    $results = $fulltext->getResults('Downloaded from FUTO library by library number:', $parameters);
    // $info = $fulltext->getSearchInformation();
    // return response()->json($results);
    return view('admin.plag',compact('results'));
    }
}
