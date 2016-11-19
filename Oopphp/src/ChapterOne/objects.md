# Objects vs Classes

- Classes can only contain single-use properties, constants, and methods.  That is to say, they can only contain `static` properties or methods or else they can contain `const` declarations.
- An `object` is a particular instance of a class.  Each object maintains its own set of properties in addition to the properties that are shared across the class.
- `Objects` have several unique features that make them more useful than creating several static classes.
    1. Since each maintains its own internal state, whatever happens in `object1` will not effect `object2`.  
    2. Objects have access to several `magic methods`.  Although many of these can cause painful spaghetti code, the two most useful magic methods are `__construct` and `__destruct`.  The `__construct` method allows `Dependency Injection` to occur, where values are passed in on initialization rather than `hard-coded` into the application.  Hard-coding values makes your application brittle.
- The purpose of `object-oriented programming`, which is generally opposed to `procedural programming`, can be summarized by the following:
    1. Inheritance.  In procedural programming, a function cannot inherit behavior from another piece of code.  Although this does not inherently lead to `code duplication`, it does make it harder to figure out how to properly write code that does not result in copy-pasting large amounts of code.
    2. Polymorphism.  An object's method can extend the parent's method.  Demo code:
        ```
        class ParentClass
        {
            public function getValue()
            {
                return 'parent value';
            }
        }
        
        class ChildClass extends ParentClass
        {
            public function getValue()
            {
                return parent::getValue() . " and child value";
            }
        }
        ```
        
    The inheriting class adds new behavior to the parent class.
    3. Abstraction.  Using `interfaces` or `abstract classes and methods`, an object's `definition` can be given, explaining what `parameters` need to be passed in and what the expected `return type` will be.  This means that **how** an object peforms its task is completely separate from **what** an object needs to perform its task.
    4. Encapsulation.   Related `properties` and `methods` belong in the same `namespace` and `class`.  This means it is possible to semantically group code together so that all related code can be accessed.  Objects have scope-visibility, and for any processing that is not necessary for the method to do its work, those properties and methods can be hidden.  
    5. Data-hiding.  Like encapsulation, this means that any extraneous data is hidden from outside of the class.  Compare with writing procedural code where `data collision` is possible, the same variable can be named multiple times and this can cause one variable to overwrite another variable.  By hiding data or restricting how that data is accessed, code is protected from accidental bad definitions or access from an unauthorized source.


