#Singleton Pattern [1]
##Type
*Creational*

##Intent
*Ensure a class only has one instance, and provide a global point of access to it.*

##Applicability
Use **Singleton** when:
- there must be exactly one instance of a class, and it must be accessible to clients from a well-known access point.
- when the sole instance should be extensible by subclassing, and clients should be able to use an extended instance without modifying their code.

##Participants
- **Singleton**
 - defines an Instance operation that lets clients access its unique instance. Instance is a class operation.
 - may be responsible for creating its own unique instance.

##Collaborations
- Clients access a `Singleton` instance solely through `Singleton`'s Instance operation.

[1] "Design Patterns: Elements of Reusable Object-Oriented Software" - *Erich Gamma, Richard Helm, Ralph Johnson, John Vlissides*
