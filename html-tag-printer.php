<?php
  /**
   * 快速生成 html 标签   ( HTML tag printer)
   *
   * @link:    http://github.com/yuanchuan/html-tag-printer
   * @version: 1.0
   * @author:  Yuan Chuan (yuanchuan23@gmail.com)
   * @created: 2010/10/23
   * @license: MIT License
   */

  function T() {
    $args = func_get_args();

    /**
     * Break a html element into five components:
     *
     * <a        href="#"   >        hello     </a>
     * headtag   attr       midtag   text      endtag
     */
    $html = array(
      'headtag' => '',
      'attr'    => '',
      'midtag'  => '',
      'text'    => '',
      'endtag'  => ''
    );

    // A semi-closed tag has a different endtag and no midtag.
    $semi_closed_pattern = "/^(input|img|area|base|col|hr|br|meta|param)/";

    if (func_num_args() && is_string($args[0])) {
      $tag = trim($args[0]);

      //TODO: Detect invalid tags
      $html['headtag'] = '<'.$tag;
      $html['midtag'] = preg_match($semi_closed_pattern,$tag) ?  '' : '>';
      $html['endtag'] = empty($html['midtag']) ? ' />' : '</'.$tag.'>';

      if (isset($args[1])) {
        $arg1 = $args[1];

        // $args[1] is a text node if it is of string type.
        if (is_string($arg1)) {
          $html['text'] = $arg1;
        }

        /**
         * There are two situations of $args[1] to be an array:
         *
         * 1.It is an array of attributes;
         * 2.It is an array of embeded self function calls which returns
         *   child element tags.
         *
         * The distinction is that the two arrays have different type of array
         * keys. In the first case the type of the keys is string and in the second
         * the type is number.
         */
        if (is_array($arg1)) {
          foreach($arg1 as $key => $value){
            $value = trim($value);

            if (is_string($key)) {
              //An array of attributes.
              $html['attr'] .= empty($value) ? '' : (' '.$key.'="'.$value.'"');
            } else {
              // An array of embeded functions which returns string.
              $html['text'] .= $value;
            }
          }

          if ( isset($args[2]) ) {
            $arg2 = $args[2];

            //$args[2] is text node whether it's a string or an array of strings.
            if (is_string($arg2)) {
              $html['text'] .= $arg2;
            } else if (is_array($arg2)) {
              $html['text'] .= join('',$arg2);
            }
          }
        }
     }
   }

   return join('',$html);
 }

?>
