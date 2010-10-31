<h1>
  HTML Tag Printer for PHP
</h1>
<p>
  It makes the code clean when there are many dynamic attributes to be set on the element:
</p>

<pre>
  echo T('a',array(
         'href'=>'http://www.google.com',
         'id'=>'hi_google',
         'target'=>'_blank'
       ),'hi google');
</pre>

<h2>
  More examples
</h2>

<pre>
  echo T();
  
  echo T('p','hi');
  
  echo T('p',array(
         'id'=>'test',
         'class'=>'test'
       ),'hi');
  
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
</pre>
