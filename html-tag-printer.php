<?php
  /*
   * 快速生成  html 标签
   * version: 0.01
   * Created: 2010/10/23
   *
   */
   
  function T(){
    $args = func_get_args();
    $arg_num = func_num_args();
    
    /*
     * A html element is composed of the following small pieces
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
     * Full closed html tags (<p></p> for instance) excludes the below tags
     */
    $full_tag_pattern="/[^br|input|img|area|base|col|hr|meta|param]/";
    
    
    if($arg_num && is_string($args[0])){
      $tag=trim($args[0]);
      
      $html['headtag'] = '<'.$tag;
      $html['midtag'] = preg_match($full_tag_pattern,$t) ? '>' : '';
      $html['endtag'] = preg_match($full_tag_pattern,$t) ? '</'.$tag.'>' : ' />';
      
      if(isset($args[1])){
        $arg1=$args[1];
        
        /*
         * The $args[1] is a text node rather than attrs
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
         * keys.In the first situation the type of the keys is string and second
         * the type of keys is number;
         */
        
        if(is_array($arg1)){
          foreach($arg1 as $key => $value){
            if(is_string($key)){
              /*
               * An array of attributes
               */
              $html['attr'].=' '.$attr.'='.'"'.$value.'"';
              
            }else{
              /*
               * An array of embeded functions
               */
              $html['text'].=$key;
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
               * Iterate through the array and added them to the html text
               */
               foreach($arg2 as $value){
                 $html['text'].=$value;
               }
            }
          }
        }
     }
   }

   return join('',$html);
 }

?>
