<?php

class action_plugin_codify extends DokuWiki_Action_Plugin {

  public function register(Doku_Event_Handler $controller) {
    $controller->register_hook('TPL_METAHEADER_OUTPUT', 'BEFORE', $this, '_hookjs');
  }

  public function _hookjs(Doku_Event $event, $param) {
    $pluginBase = DOKU_BASE.'lib/plugins';

    // BEGIN: Stylesheets
    $event->data['link'][] = array(
      'rel' => 'stylesheet',
      'href' => 'https://cdn.jsdelivr.net/npm/prismjs@1.29.0/themes/prism.min.css'
    );

    $event->data['link'][] = array(
      'rel' => 'stylesheet',
      'href' => 'https://cdn.jsdelivr.net/npm/prismjs@1.29.0/plugins/line-numbers/prism-line-numbers.min.css'
    );

    $event->data['link'][] = array(
      'rel' => 'stylesheet',
      'href' => $pluginBase.'/codify/codify.css'
    );
    // END: Stylesheets


    // BEGIN: Scripts
    $event->data['script'][] = array(
      'src' => 'https://cdn.jsdelivr.net/npm/prismjs@1.29.0/prism.min.js',
      // 'defer' => 'defer',
      '_data' => ''
    );

    $event->data['script'][] = array(
      'src' => 'https://cdn.jsdelivr.net/npm/prismjs@1.29.0/components/prism-core.min.js',
      // 'defer' => 'defer',
      '_data' => ''
    );

    $event->data['script'][] = array(
      'src' => 'https://cdn.jsdelivr.net/npm/prismjs@1.29.0/plugins/autoloader/prism-autoloader.min.js',
      // 'defer' => 'defer',
      '_data' => ''
    );

    $event->data['script'][] = array(
      'src' => 'https://cdn.jsdelivr.net/npm/prismjs@1.29.0/plugins/line-numbers/prism-line-numbers.min.js',
      // 'defer' => 'defer',
      '_data' => ''
    );

    $event->data['script'][] = array(
      'src' => $pluginBase.'/codify/codify.js',
      // 'defer' => 'defer',
      '_data' => ''
    );
    // END: Scripts
  }

}
