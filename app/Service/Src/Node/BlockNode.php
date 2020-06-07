<?php

namespace App\Service\Src\Node;

// An array that stores the control words, which hides inner TextNode
// For example, there may be a description of font or color palette etc.
use Exception;
use Throwable;

define('DISABLE_PLAIN_TEXT', ["\\*", "\\fonttbl", "\\colortbl", "\\datastore", "\\themedata", "\\hl", "\\stylesheet", "\\nonshppict", "\\author", "\\operator"]);

// '{' ~ '}'
class BlockNode implements Node
{
    private $childNodes;

    public function __construct(array $childNodes)
    {

        $this->childNodes = $childNodes;
        $this->show_text  = true;
        foreach ($childNodes as $child) {
            if (in_array($child->name(), DISABLE_PLAIN_TEXT)) {
                $this->show_text = false;
            }
        }
    }

    public function name()
    {
        return 'block';
    }

    public function text()
    {
        if (!$this->show_text) {
            return '';
        }
        $text   = '';
        $textAr = [];
        foreach ($this->childNodes as $child) {
            $text = $child->text();
            if (empty($text)) {
                continue;
            } else {
                $textAr[] = $text;
            }
            /*$text .= $child->node();*/
        }
        return $textAr;
    }


    public function text2()
    {
        if (!$this->show_text) {
            return '';
        }
        $text = '';
        foreach ($this->childNodes as $child) {
            try {
                $node =  $child->text();
                    if(is_array($node)){
                        $node = implode($node);
                    }
                $text .= $node;
            }catch (Throwable $e){
                throw new Exception($e->getMessage());
            }
        }

        return $text;
    }


    public function childNodes()
    {
        return $this->childNodes;
    }
}
