<?php

  include "../html-tag-printer.php";
  include "simple_test_helper.php";
  
  Test('Empty tag', array(
    'input' => T('p'),
    'output' => '<p></p>'
  ));
  
  Test ('Write attribute', array(
    'input' => 
      T('a',array(
        'href'=>'http://www.google.com',
        'id'=>'hi_google',
        'target'=>'_blank'
       ),'hi google'),
     
     'output' => '<a href="http://www.google.com" id="hi_google" target="_blank">hi google</a>'
  ));
  
  Test('Semi-closed image tag', array(
    'input' => 
      T('img', array(
        'src' => '#',
        'alt' => 'image'
      )),
    
    'output' => '<img src="#" alt="image" />'
  )); 
  
  Test('Plain tag', array(
    'input' => T('p','This is a test'),
    'output' => '<p>This is a test</p>'
  ));
    
  Test('Multiple child tags', array(
    'input' =>
      T('div',array(
        T('p','content1'),
        T('p','content2'),
        T('p','content3')
      )),
     
     'output' => '<div><p>content1</p><p>content2</p><p>content3</p></div>'
  ));
  
  
  Test('Nested list', array(
    'input' =>  
      T('ul',array('id'=>'nav'),array(
        T('li',
          T('a',array('href'=>'#','id'=>'current'),'1')),
        T('li',
          T('a',array('href'=>'#'),'2'))
      )),
      
    'output' => '<ul id="nav"><li><a href="#" id="current">1</a></li><li><a href="#">2</a></li></ul>'
  ));
    
?>