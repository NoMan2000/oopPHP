# Traits

- A trait is a way to create horizontally reusable code for common tasks.
- Examples of common tasks are creating `Singletons`, (though some will call this an anti-pattern), and logging messages.
- In our example class `ChapterEight\Auth.php`, we will use the latter example.
- You can define as many traits as necessary.
- Traits can inherit other traits by also using the `use` keyword
- A class using a Trait will override the parent classes implementation.  However, a child class that implements the same method will override the Traits method.
- Traits can have properties.
- If two traits are inherited by a class with the same methods on both traits, there will be an error.
- To resolve the error, use the `insteadof` operator to specify inheritance.
- If you want to use both methods of two conflicting trait, alias the other trait with the `as` operator
