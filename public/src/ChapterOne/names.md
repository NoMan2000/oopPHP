# Names

- PHP classes must begin with a letter or underscore.
- Remaining characters must be letters, numbers, or underscores.
- PSR-1 and PSR-2 is the PHP Standard Recommendations for naming classes and variables.  PSR-4 is the standard for dealing with namespaces, class name, and folder structure
- A namespace should begin with Pascal casing / StudlyCaps.  `CorrectNameSpace` vs. `incorrectNameSpace` or `incorrect_namespace`.
- Variable and method names should be camel-cased.  `public function getVariable` vs. `public function GetVariable` or `public function get_variable`.
- Class names should be Pascal-cased.

		namespace MyFolder
		
		class MyClass
		{
			private $variable;
			
			public function getMethod()
			{
				return $this->variable;
			}
		}
		
- While not explicitly stated by any PSR, most programmers use underscores to separate global functions.  `array_get` instead of `arrayGet`.

