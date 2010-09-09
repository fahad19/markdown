<?php
/**
 * Markdown Helper
 *
 * Copyright 2010, Fahad Ibnay Heylaal <contact@fahad19.com>
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @author    Fahad Ibnay Heylaal <contact@fahad19.com>
 * @copyright Copyright 2010, Fahad Ibnay Heylaal <contact@fahad19.com>
 * @license   MIT License (http://www.opensource.org/licenses/mit-license.php)
 * @link      http://fahad19.com/blog/markdown-plugin
 */
class MarkdownHelper extends AppHelper {
/**
 * Other helpers used by this helper
 *
 * @var array
 * @access public
 */
    public $helpers = array(
        'Layout',
    );
/**
 * Convert markdown to html
 *
 * @param  string $text Text in markdown format
 * @return string
 */
    public function transform($text = null) {
        if (!isset($this->parser)) {
            if (!class_exists('Markdown_Parser')) {
                App::import('Vendor', 'Markdown.MarkdownParser');
            }
            $this->parser = new Markdown_Parser;
        }
        return $this->parser->transform($text);
    }
/**
 * afterSetNode callback for Croogo
 *
 * Modify the Node fields
 *
 * @return void
 */
    public function afterSetNode() {
        $fields = Configure::read('Markdown.node_fields');
        if (is_array($fields)) {
            foreach ($fields AS $field) {
                $this->Layout->setNodeField($field, $this->transform($this->Layout->node($field)));
            }
        }
    }

}
?>