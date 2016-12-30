# Good Classes

[Solid Design Principles](https://en.wikipedia.org/wiki/SOLID_(object-oriented_design))

A good class should follow the following principles:

- **Single Responsibility**.  A good class should do one set of things and do it well.  A common violation occurs with logging a user in.  Often it sets session state, and it authenticates the user, and it checks their password, and so forth.  

Martin Fowler called this divergent change, and explains it as such:

> Programs should be structured in such a way that we can make changes easily. When we make a change we want to be able to jump to a single clear point in the system and make the change.

> Divergent change occurs when one class is commonly changed in different ways for different reasons. Ifyou look at the class and say, “Well, I will have to change these three methods every time I get a new database; I have to change these four methods every time there is a new financial instrument,” you likely have a situation in which two objects are better than one. That way each object is changed only as a result of one kind of change.”

- **Open-closed Principle**.  A good class or object should be open to extension but closed to modification.   Another way of saying this is that you should be able to add new features or extend a class without having to go back into the class and rewrite it.

A good example of this in practice is PHPStorm or Atom.  They can be extended with plugins without having to rewrite PHPStorm or Atom.  

The way this is done is through `Interfaces` and `Abstract Classes`, which will be observed in Chapters 3 and 4.

- **Liskov substitution principle**.  You should be able to substitute a class with one of its subclasses with another without having to change functionality.  

This is typically done with `Interfaces` and is known as `Design by Contract`.  Several of the PSRs (PHP Standards Recommendations) are Interfaces that explain how different frameworks should interoperate so that one framework or component can be swapped with another without requiring any code changes.

- **Interface Segregation Principle**.  No class should be forced to rely on Interfaces or methods it doesn't use.  This commonly occurs when an Interface or class has too many abstract methods and any classes that implement it must also implement all the abstract methods, even if they don't do anything with them.

- **Dependency Inversion**.  This means a couple of things.  One is that dependencies should be injected into an object rather than instatiated within an object.  Two, these dependencies should be Interfaces or Abstract Classes rather than concrete implementations.  The reason is that this allows multiple different classes to be used without having to rewrite the original class.