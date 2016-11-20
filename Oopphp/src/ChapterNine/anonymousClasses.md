# Anonymous classes

- PHP has had both stdClass and lambdas, (Closures), for a while.  
- Both have their uses but some substantial downsides.
- stdClass cannot easily add methods onto it that can be invoked.  For example, in the MagicClass class, the only way to invoke the stdClass items passed in the Constructor is to call the magic method invoke.
```
    /**
     * @param string $name
     * @param array $arguments
     * @return mixed
     */
    public function __call(string $name, array $arguments)
    {
        if (isset($this->items->$name)) {
            return $this->items->$name->__invoke($arguments);
        }
    }
```

- This makes the code hard to read and invoking magic methods like this is a sub-optimal strategy.
- They also cannot extend a class or implement an interface, making their usefulness restricted outside of quickly creating a new object.
- Lambdas are useful as anonymous functions, but they cannot hold method or properties, implement interfaces, or extend a class.
- Anonymous classes can have member properties and methods, can extend other objects, and can implement interfaces.
- Their classname is randomly generated and they cannot be type-hinted.  Therefore it is probably best to make sure that anonymous classes implement an interface or extend another class so that it can be checked against.
