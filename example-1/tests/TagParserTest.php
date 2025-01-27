<?php

namespace Tests;

use App\TagParser;
use PHPUnit\Framework\TestCase;

class TagParserTest extends TestCase
{
  protected $parser;

  protected function setUp(): void
  {
    $this->parser = new TagParser;
  }

  public function test_it_parses_a_single_tag()
  {
    $result = $this->parser->parse('personal');
    $expected = ['personal'];
    
    $this->assertSame($expected, $result);
  }

  public function test_it_parses_a_comma_seperated_list_of_tags()
  {
    $result = $this->parser->parse('personal, money, family');
    $expected = ['personal', 'money', 'family'];

    $this->assertSame($expected, $result);
  }

  public function test_it_parses_a_pipe_seperated_list_of_tags()
  {
    $result = $this->parser->parse('personal | money | family');
    $expected = ['personal', 'money', 'family'];

    $this->assertSame($expected, $result);
  }

  public function test_spaces_as_optional()
  {
    $result = $this->parser->parse('personal,money,family');
    $expected = ['personal', 'money', 'family'];

    $this->assertSame($expected, $result);

    $result = $this->parser->parse('personal|money|family');
    $expected = ['personal', 'money', 'family'];
    
    $this->assertSame($expected, $result);
  }
}