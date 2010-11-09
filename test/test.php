<?php
  /*
   * Test for html-tag-printer.php
   * 
   * TODO: Build standard test file.
   */
   
  include "../html-tag-printer.php";
  
  echo T('div',array(
         T('p','content1'),
         T('p','content2'),
         T('p','content3')
       ));

  echo T('div',array('id'=>'hello'),
          T('div',array('id'=>'world'),array(
            T('p','hello'),
            T('p','world')
          )
       ));
       
  echo T('ul',array('id'=>'nav'),array(
         T('li',
           T('a',array('href'=>'#','id'=>'current'),'1')),
         T('li',
           T('a',array('href'=>'#'),'2'))
       ));

?>