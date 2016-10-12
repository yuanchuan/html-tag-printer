# HTML tag printer
> Make the code clean when there are many dynamic attributes to be set on the element

### Example

```php
echo T('a', array(
  'href' => '//www.google.com',
  'id' => 'google'
), 'hi google');
```
Outputs:
```html
<a href="https://www.google.com" id="google">hi google</a>
```

### More examples

The arguments vary in number as well as type.

```php
echo T();
// ''

echo T('p');
// <p></p>

echo T('p', 'hi');
// <p>hi</p>

echo T('p', array(
  'id' => 'test',
  'class' => 'test'
), 'hi');
// <p id="test" class="test">hi</p>
```

### Nested tags

```php
echo T('div', array(
  T('p', 'content1'),
  T('p', 'content2'),
  T('p', 'content3')
));

echo T('div', array('id' => 'hello'),
  T('div', array('id' => 'world'), array(
    T('p', 'hello'),
    T('p', 'world')
  )
));

echo T('ul', array('id' => 'nav'), array(
  T('li',
    T('a', array('href' => '#', 'id' => 'current'), 'link1')),
  T('li',
    T('a', array('href' => '#'), 'link2'))
));
```
