#Prototype Pattern [1]
##Type
*Creational*

##Intent
*Specify the kinds of objects to create using a prototypical instance, and create new objects by copying this prototype*

##Applicability
Use **Prototype** when:
- a system should be independent of how its products are created, composed, and represented.
- when the classes to instantiate are specified at run-time, for example, by dynamic loading.
- to avoid building a class hierarchy of factories that parallels the class hierarchy of products.
- when instances of a class can have one of only a few different combinations of state. It may be more convenient to install a corresponding number of prototypes and clone them rather than instantiating the class manually, each time with the appropriate state.

##Participants
- **Prototype**
 - declares an interface for cloning itself.
- **ConcretePrototype**
 - implements an operation for cloning itself.
- **Client**
 - creates a new object by asking a prototype to clone itself.
 
##Collaborations
- A client asks a prototype to clone itself.

[1] "Design Patterns: Elements of Reusable Object-Oriented Software" - *Erich Gamma, Richard Helm, Ralph Johnson, John Vlissides*
