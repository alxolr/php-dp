#Iterator Pattern [1] 
##Type
*Behavioral*

##Intent
> Provide a way to access the elements of an aggregate object sequentially without exposing its underlying representation.

##Also Known As
*Cursor*

##Applicability
Use the `Iterator` pattern
 - to access an aggregate object's contents without exposing its internal representation.
 - to support multiple traversals of a aggregate objects.
 - to provide a uniform interface for traversing different aggregate structures (that is, to support polymorphic iteration).

##Participants
- **Iterator**
 - defines an interface for accessing and traversing elements.
- **ConcreteIterator**
 - implements the `Iterator` interface.
 - keeps track of the current position in the traversal of the aggregate.
- **Aggregate**
 - defines an interface for creating an `Iterator` object.
- **ConcreteAggregate**
 - implements the `Iterator` creation interface to return an instance of the proper `ConcreteIterator` .

##Colaborations
 - A `ConcreteIterator` 

[1] "Design Patterns: Elements of Reusable Object-Oriented Software" - *Erich Gamma, Richard Helm, Ralph Johnson, John Vlissides*
