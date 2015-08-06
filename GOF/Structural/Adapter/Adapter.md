#Adapter Pattern [1]
##Type
*Structural*

##Intent
*Convert the interface of a class into another interface clients expect. Adapter lets classes work together that couldn't otherwise because of incompatible interfaces.*

##Also known as 
*Wrapper*

##Applicability
Use **Adapter pattern** when:
- you want to use an existing class, and its interface does not match the one you need.
- you want to create a reusable class that cooperates with unrelated or unforseen classes, that is, classes that don't necessarily have compatible interfaces.
- *(object adapter only)* you need to use several existing subclasses, but it's impractical to adapt their interfaces by subclassing every one. An object adapter can adapt the interface of its parent class.

##Participants
- **Target** (Shape)
 - defines the domain-specific interface that Client uses.
- **Client**
 - collaborates with objects conforming to the Target interface.
- **Adaptee**
 - defines an existing interface that needs adapting.
- **Adapter**
 - adapts the interface of Adaptee to the Target interface.
 
##Colaborations
 - Clients call operations on an Adapter instance. In turn, the adapter calls Adaptee operations that carry out the request.

[1] "Design Patterns: Elements of Reusable Object-Oriented Software" - *Erich Gamma, Richard Helm, Ralph Johnson, John Vlissides*
