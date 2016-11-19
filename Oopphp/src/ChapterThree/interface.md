# Interface

- An interface is an abstract type that defines public methods and their signatures, but does not implement them.  It can also define constants.
- Note that a constant on an interface **cannot be redefined**.  A constant that is put on a parent class can be overridden by a child class.   See ClassConstantOne and ClassConstantTwo.
- An interface can `extend` another interface.  We see this in the `SubtractContract` that it extends the `AddContract`
