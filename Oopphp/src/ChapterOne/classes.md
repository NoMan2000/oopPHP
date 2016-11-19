# Classes

- Can have unlimited properties and methods.
- Having more than 20 is usually what's known as a "code smell".  Having too many methods and properties is a sign that your class is doing too much work.
- Method names have three possible visibilities:  `public`, `protected`, or `private`.
- If scope-visibility is not declared, then it is assumed to be public.
- Properties can have default values.  Default values must be known at compilation time.  For example:


     class DirectoryLister
     {
         public $dir = __DIR__ . '/myFile.php';
     }
    
Is completely valid.  But:

    class DirectoryLister
    {
        public $dir = dirname(__DIR__) . '/myFile.php';
    }
    
Is not valid.  That's because __DIR__ is a compile-time constant whereas dirname() is a dynamically invoked function.
