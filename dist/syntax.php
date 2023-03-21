<?php

if(!defined('DOKU_INC')) die();

class syntax_plugin_codify extends DokuWiki_Syntax_Plugin {

  public function getType() {
    return 'substition';
  }

  public function getSort() {
    return 158;
  }

  public function connectTo($mode) {
    $this->Lexer->addEntryPattern('<codify.*?>(?=.*?</codify>)', $mode, 'plugin_codify');
  }

  public function postConnect() {
    $this->Lexer->addExitPattern('</codify>', 'plugin_codify');
  }

  public function handle($match, $state, $pos, Doku_Handler $handler) {
    if ($state == DOKU_LEXER_ENTER) {
      $attributes = trim(substr($match, 7, -1));
      $chunk = preg_split("/\s+/", $attributes);
      $match = $chunk[0];
    }

    return array($state, $match);
  }

  public function render($mode, Doku_Renderer $renderer, $data) {
    if ($mode != 'xhtml') return false;

    list($state, $match) = $data;

    switch ($state) {
      case DOKU_LEXER_ENTER:
        $renderer->doc .= "<pre class=\"dokuwiki-plugin-codify line-numbers\">";
        $renderer->doc .= "<code class=\"language-{$match}\">";
        break;

      case DOKU_LEXER_UNMATCHED:
        $renderer->doc .= $renderer->_xmlEntities($match);
        break;

      case DOKU_LEXER_EXIT:
        $renderer->doc .= "</code>";
        $renderer->doc .= "</pre>";
        break;
    }

    return false;
  }

}
