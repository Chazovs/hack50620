<?php


namespace App\Service;

use App\Service\Src\Scanner;
use App\Service\Src\Parser;
use App\Service\Src\Document;
use App\Service\Src\Node\Node;
use App\Service\Src\Node\BlockNode;
use App\Service\Src\Node\CharNode;
use App\Service\Src\Node\CtrlWordNode;
use App\Service\Src\Node\ParNode;
use App\Service\Src\Node\TextNode;

class RtfParser
{

    //https://github.com/tyru/php-rtf-parser

    public function extractText(string $filename, array $config)
    {
        // Read the data from the input file.
        $text = file_get_contents($filename);
        if (empty($text)) {
            return '';
        }

        $scanner = new Scanner($text);


        $parser  = new Parser($scanner);

        $text    = '';
        $doc     = $parser->parse();


        foreach ($doc->childNodes() as $node) {
            $texts = $node->text();
        }

        if ($config['input_encoding'] !== $config['output_encoding']) {
            foreach ($texts as &$text){

                $text = mb_convert_encoding($text, $config['output_encoding'], $config['input_encoding']);
            }
        }

        return $texts;
    }

    public function extractText2(string $filename, array $config)
    {
        // Read the data from the input file.
        $text = file_get_contents($filename);
        if (empty($text)) {
            return '';
        }

        $scanner = new Scanner($text);


        $parser  = new Parser($scanner);

        $text    = '';
        $doc     = $parser->parse();

        $texts= [];
        foreach ($doc->childNodes() as $node) {
            $texts = $node->text2();
        }

        if ($config['input_encoding'] !== $config['output_encoding']) {
            foreach ($texts as &$text){

                $text = mb_convert_encoding($text, $config['output_encoding'], $config['input_encoding']);
            }
        }

        return $texts;
    }

    public function getConfig()
    {
        if (preg_match('/^Windows/', php_uname('s'))) {
            // TODO: Get current code page of output_encoding.
            // 'cp932' is default code page of Japanese version.
            return [
                'input_encoding'  => 'guess',
                'output_encoding' => 'cp932',
            ];
        }
        // Detect encoding from LANG environment variable
        $lang    = getenv('LANG');
        $matches = null;
        if (is_string($lang) && preg_match('/\.(.+)$/', $lang, $matches)) {
            $out = $matches[1];
        } else {
            $out = 'utf-8';
        }
        return [
            'input_encoding'  => 'guess',
            'output_encoding' => $out,
        ];
    }

    /**
     * @param $filename
     * @param $config
     * @return bool|false|string|string[]|null
     */
    public function main($filename, $config)
    {   $textArr = $this->extractText($filename, $config);
        $result['text'] = $textArr;
        $result['filename'] = $filename;
        return json_encode($result);
    }


    public function main2($filename, $config)
    {   $textArr = $this->extractText2($filename, $config);
        $result['text'] = $textArr;
        $result['filename'] = $filename;
        return json_encode($result);
    }

}
