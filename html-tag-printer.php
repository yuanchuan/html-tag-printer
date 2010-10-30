<?php
  /*
   * 快速生成  html 标签   ( HTML Printer for PHP )
   * 
   * @link:    http://github.com/spirit23/html-tag-printer
   * @version: 1.0
   * @author:  Yuan Chuan (spirit23@163.com)
   * @created: 2010/10/23
   * @license: MIT License
   */
   
  function T(){
    $args = func_get_args();

    /*
     * Break a html element into the following small pieces:
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
    
    /*
     * The tags below are semi-closed.
     */
    $semi_closed_pattern="/br|input|img|area|base|col|hr|meta|param/";
    
    if(func_num_args() && is_string($args[0])){
      $tag=trim($args[0]);
      
      $html['headtag'] = '<'.$tag;
      $html['midtag'] = preg_match($semi_closed_pattern,$tag) ?  '' : '>';
      $html['endtag'] = empty($html['midtag']) ? ' />' : '</'.$tag.'>';
      
      if(isset($args[1])){
        $arg1=$args[1];
        
        /*
         * The $args[1] is a text node rather than attrs.
         */
        if(is_string($arg1)){
          $html['text']=$arg1;
        }
               
        /*
         * There are two situations of the $args[1] to be an array:
         * 
         * 1.It is an array of attributes;
         * 2.It is an array of embeded self function calls and returns
         * child element tags.
         * 
         * The distinction is that the two arrays have different type of array
         * keys.In the first case the type of the keys is string and in the second
         * the type of keys is number.
         */
        
        if(is_array($arg1)){
          foreach($arg1 as $key => $value){
            if(is_string($key)){
              /*
               * An array of attributes.
               */
              $html['attr'].=' '.$key.'='.'"'.$value.'"';
              
            }else{
              /*
               * An array of embeded functions.
               */
              $html['text'].=$value;
            }
          }
                   
          /*
           * The $args[2] is the text node whether it is a string or an array
           * of a strings.
           */
          if(isset($args[2])){
            $arg2=$args[2];
            
            if(is_string($arg2)){
              $html['text'].=$arg2;
              
            }else if(is_array($arg2)){
              /*
               * Iterate through the array and add them to the html text.
               */
               foreach($arg2 as $text){
                 $html['text'].=$text;
               }
            }
          }
        }
     }
   }

   return join('',$html);
 }

?>