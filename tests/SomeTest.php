<?php

use PhpParser\Node\Expr\FuncCall;
use PhpParser\NodeFinder;
use PhpParser\ParserFactory;

class SomeTest extends PHPUnit\Framework\TestCase {
    public function testSomething(): void {
        $parser = (new ParserFactory)->create(ParserFactory::PREFER_PHP7);
        $stmts = $parser->parse('<?php var_dump("test");');
        foreach ((new NodeFinder())->findInstanceOf($stmts, FuncCall::class) as $funcCalls) {
            $funcCalls->name->getParts();
        }
        $this->assertTrue(true);
    }
}
