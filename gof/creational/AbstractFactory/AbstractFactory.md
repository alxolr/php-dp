#Abstract Factory Pattern
##Type
*Creational*

##Intent
*Provide an interface for creating families of related or dependent objects without specifying their concrete classes.*

##Applicability
Use **Abstract Factory** when:
- a system should be independent of how its products are created, composed, and represented.
- a system should be configured with one of multiple families of products.
- a family of related product objects is designed to be used together,and you need to enforce this constraint.
- you want to provide a class library of products, and you want to reveal just their interfaces, not their implementations.

##Participants
- **AbstractFactory**
 - declares an interface for operations that create abstract product objects.
- **ConcreteFactory**
 - implements the operations to create concrete product objects.
- **AbstractProduct**
 - declares an interface for a type of product object.
- **ConcreteProduct** 
 - defines a product object to be created by the corresponding concrete factory.
 - implements the *AbstractProduct* interface.
- **Client**
 - uses only interfaces declared by *AbstractFactory* and *AbstractProduct* classes.
