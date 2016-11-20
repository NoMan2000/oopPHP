# Closures

- Closures cannot be directly created, it will emit an error.
- Closures are created by assigning a function to a variable.
```
$closure = function ($var1) {
    return $var1 + 10;
};
```
- There are three ways to pass an argument to a closure, two of which are common to regular functions.
    1. Pass as argument parameters.
    2. Use the `global` keyword before a variable name and import it in from the global namespace.
    3. Add the `use($var)` statement to the end of the definition to import the variable into the closure.  Note that unlike the global keyword, this is a `non-dynamic` binding.  Whatever the value is at the time the `use` keyword is found is what the value will be, even if it's changed after the fact.

- If you want to ensure that a closure is passed in as an argument, use the `Closure` type-hint.  This is different from the `callable` type-hint.
