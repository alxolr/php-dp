#[Factory Method] [1]
##Type
*Creational*

##Intent
*Defines an interface for creating an object, but let subclasses decide which class to instantiate. Factory Method lets a class defer instantiation to subclasses.*

##Alias
- *Virtual Constructor*

##Applicability
Use **FactoryMethod** when:
- a class can't anticipate the class of objects it must create.
- a class wants its subclasses to specify the objects it creates.
- classes delegate responsibility to one of the several helper subclasses, and you want to localize the knowledge of which helper subclass is the delegate.

##Participants
- **Product**
 - defines the interface of objects the factory method creates.
- **ConcreteProduct**
 - implements the Product interface.
- **Creator**
 - declares the factory method, which returns an object of type Product. Creator may also define a default implementation of the factory method that returns a default ConcreteProduct object.
 - may call the factory method to return an instance of a concrete product.
- **ConcreteCreator**
 - overrides the factory method to return an instance of a `ConcreteProduct`.
 
##Collaborations
- Creator relies on its subclasses to define the factory method so that it returns an instance of the appropriate `ConcreteProduct`

[1]: "Design Patterns: Elements of Reusable Object-Oriented Software" - *Erich Gamma, Richard Helm, Ralph Johnson, John Vlissides*
