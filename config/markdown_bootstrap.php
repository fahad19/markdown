<?php
/**
 * Configuration
 *
 * These fields will be converted from Markdown text to HTML for nodes.
 */
    Configure::write('Markdown.node_fields', array(
        //'excerpt',
        'body',
    ));

/**
 * Hook helper
 */
    Croogo::hookHelper('Nodes', 'Markdown.Markdown');
?>