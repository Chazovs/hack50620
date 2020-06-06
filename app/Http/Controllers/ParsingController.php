<?php

namespace App\Http\Controllers;

use App\Service\RtfParser;
use Illuminate\Http\Request;

class ParsingController extends Controller
{
    public function index(){
        $parser = new RtfParser();

        $config['input_encoding'] = 'cp1251';
        $config['output_encoding'] = 'UTF-8';
        $filename = 'http://'.$_SERVER['SERVER_NAME'].'/data/001.rtf';
       return $parser->main($filename, $config);
    }

    public function index2($filePath){
        $parser = new RtfParser();

        $config['input_encoding'] = 'cp1251';
        $config['output_encoding'] = 'UTF-8';

        $filename = $filePath;
        return $parser->main($filename, $config);
    }
}
