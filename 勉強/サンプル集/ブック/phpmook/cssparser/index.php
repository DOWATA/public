<?php
// (1) Autoloaderの設定
require_once ("vendor/autoload.php");

// (2) Namespaceを使わず利用できるように設定
use Sabberworm\CSS\Parser as CSSParser;
use Sabberworm\CSS\RuleSet\DeclarationBlock as Block;
use Sabberworm\CSS\Rule\Rule as Rule;
use Sabberworm\CSS\Value\Color as Color;

// (3) CSSファイルの読み込みとパース
$css = file_get_contents( "input.css" );
$parser = new CSSParser( $css );
$doc = $parser->parse();

// (4) すべての宣言ブロックを取得
$blocks = $doc->getAllDeclarationBlocks();
foreach( $blocks as $block ){
 // (5) セレクタ一覧を取得
 $selectors = $block->getSelectors();
 $list = array ();
 foreach( $selectors as $selector ){
  $val = $selector->getSelector();
  $list[] = $val;
 }
 if(in_array( "#sample", $list )){
  // (6) 新たにスタイルを追加する
  $rule = new Rule( "font-size" );
  $rule->addValue( "12px" );
  $block->addRule( $rule );
  
  // (7) padding-rightの指定があれば、それを削除する
  $rules = $block->getRules( "padding-" );
  foreach( $rules as $rule ){
   $name = $rule->getRule();
   if($name == 'padding-right'){
    $block->removeRule( $rule );
   }
  }
 }
}
// (8) 新たな宣言ブロックを追加する
$block = new Block();
$block->setSelector(".book");
$rule = new Rule("text-weight");
$rule->addValue("bold");
$block->addRule($rule);
$doc->append($block);

header('Content-Type: text/css');
print $doc->__toString();