<html>
<body>
<h1>Some Examples</h1>

<pre>
  echo T();
  
  echo T('p','hi');           //<p></p>
  
  echo T('p',array(           //<p id="test" class="text">hi</p>
         'id'=>'test',
         'class'=>'test'
       ),'hi');
  
  echo T('p',array('class'=>'test'),
         T('a',array(
           'href'=>'http://www.google.com',
           'id'=>'goto_google',
           'target'=>'_blank'
         ),'hi google')
       );

  echo T('div',array(
         T('p','content1'),
         T('p','content2'),
         T('p','content3')
       ));
  
  echo T('input',array('type'=>'text'));
  
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
</pre>

</body>
</html>
