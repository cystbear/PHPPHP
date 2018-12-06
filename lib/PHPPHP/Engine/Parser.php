<?php

namespace PHPPHP\Engine;

class Parser {

    protected $parser;
    protected $traverser;
    
    public function __construct() {
        $this->parser = new \PhpParser\Parser\Php7(new \PhpParser\Lexer);
        $this->traverser = new \PhpParser\NodeTraverser;
        $this->traverser->addVisitor(new \PhpParser\NodeVisitor\NameResolver);
    }
    
    public function parse($code) {
        $ast = $this->parser->parse($code);
        $ast = $this->traverser->traverse($ast);
        return $ast;
    }

}
