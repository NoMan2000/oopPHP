# Type-Hinting

- Can declare return types of several primitives.
- `null`, `void`, and `mixed` are not allowed.  Nor are multiple return types.  
- Mixed types with nullable are going to be allowed in future PHP versions.  The syntax is `?type`.  If a parent class does not declare a nullable return type or typehint, the child class can add it.  But if a parent class adds the nullable return type, a child class cannot remove it.
- Union types `Iterable | array` were downvoted in the PHP RFC.  They may return in the future, but will not be implemented in the near future.
- The magic methods `__clone`, `__construct`, and `__destruct` cannot have return types, because they cannot return anything except a new class in the case of __clone.
- Return types are optional.  They are only required if it is declared in the parent or interface.  Returning the wrong type will generate a fatal error.
- Valid return types outside of scalars and classes are `self`, `parent`, `callable`, and `array`.

## Strict Types For Return Values

- `declare(strict_types=1)` is used implement strict mode.  It must be the first statement in the file and it only applies to that particular file.  It has no affect on included files or parent files.
- Another way of saying this is that strict types are based upon the caller and never the callee.  The exception is return types.
- This change is applied to the entire file, including how core PHP functions and classes work.
- A float can coerce an integer in strict mode, but that's all.
- For return types, it depends on where the function or method was defined.
- In the WeakClass, there is no `declare(strict_types=1)`.  This means return types will not be affected at all by turning it on in the caller.
- Using a return type results in more sane conversions than using type-casting with `strval, intval, boolval, floatval`
  The first case will cause a notice error `Array to string conversion`, but intval will either return 0 or 1, depending upon whether or not the array is empty.  Boolval will also return true or false on the same parameter.
  This is similar to using the `empty` check on an array.  Using a return type, an array with throw an error on the return.

## Strict Types for Parameters

- For argument parameters, how it is interpreted depends on where it is called.  
  Data types are only enforced if strict mode is enabled in the file that calls the function or method, not in the file that defines the function or method.
- 

## General notes

- If the parent class does not have strict_types, setting it in the child class and then returning the parent's method will not set the parent's parameters to strict mode parameter types.  
  It will always obey the file they are declared in, not invoked in.
