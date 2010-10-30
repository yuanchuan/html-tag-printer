<?php
  /*
   * 快速生成  html 标签
   * version: 0.01
   * Created: 2010/10/23
   *
   * TODO: 1.精简函数代码，一般单个函数的长度不超过一屏
   *       2.增加容错处理
   *       3.<link /> <img />  <br />等标签没有考虑进去, 待补充,
   *       4.?
   */

  function T(){
    $result = '';
    $args=func_get_args();
    $arg_num=func_num_args();

    if($arg_num==1){
      if(is_string($args[0])){
        $result.='<'.$args[0].'></'.$args[0].'>';
      }
    }else if($arg_num==2){
      if(is_string($args[0]) && is_string($args[1])){
        $result.='<'.$args[0].'>'.$args[1].'</'.$args[0].'>';
      }else if(is_string($args[0]) && is_array($args[1])){
        $result.='<'.$args[0];
        $mark=true;;

        foreach($args[1] as $attr => $value){
          if(is_string($attr)){
           $result.=' '.$attr.'='.'"'.$value.'"';
          }else{
           if($mark){$result.='>';$mark=false;}
           $result.=$value;
          }
        }
        if($mark){
          $result.='></'.$args[0].'>';
        }else{
          $result.='</'.$args[0].'>';
        }
      }
    }else if($arg_num==3){
      if(is_string($args[0]) && is_array($args[1]) && is_string($args[2])){
        $result.='<'.$args[0];
        foreach($args[1] as $attr => $value){
          $result.=' '.$attr.'='.'"'.$value.'"';
        }

        $result.='>'.$args[2].'</'.$args[0].'>';
      }else if(is_string($args[0]) && is_array($args[1]) && is_array($args[2])){
        $result.='<'.$args[0];
        foreach($args[1] as $attr => $value){
          $result.=' '.$attr.'='.'"'.$value.'"';
        }

        $result.='>';
        foreach($args[2] as $value){
          $result.=$value;
        }
        $result.='</'.$args[0].'>';
      }
    }

    return $result;
  }
?>
