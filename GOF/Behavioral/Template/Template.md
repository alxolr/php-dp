#Template method Pattern [1] 
##Type
*Behavioral*

##Intent
> Define the skeleton of an algorithm in an operation, deferring some steps to subclasses. Template Method lets subclasses redefine certain steps of an algorithm without changing the algorithm's structure.


##Participants
- **AbstractClass**
 - define abstract primitive operations that concrete subclasses define to implement steps of an algorithm.
 - implements a template method defining the skeleton of an algorithm. The template method calls primitive operations as well as operations defined in AbstractClass or those of other objects.
- **ConcreteClass**
 - implements the primitive operations to carry out subclass - specific steps of the algorithm.
 
##Colaborations
- ConcreteClass relies on AbstractClass to implement the invariant steps of the algorithm.
 
 
[1] "Design Patterns: Elements of Reusable Object-Oriented Software" - *Erich Gamma, Richard Helm, Ralph Johnson, John Vlissides*
