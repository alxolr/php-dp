#Facade Pattern
##Type
*Structural*

##Intent
> *Provide a unified interface to a set of interfaces in a subsystem. Facade defines a higher-level interface that makes the subsystem easier to use.*

##Applicability
Use the **Facade Pattern**:
- you want to provide a simple interface to a complex subsystem. Subsystems often get more complex as they evolve. Most patterns, when applied, result in more and smaller classes. This makes the subsystem more reusable and easier to customize, but it also becomes harder to use for clients that don't need to customize it. A facade can provide a simple default view of the subsystem that is good enough for most clients. Only clients needing more customizability will need to look beyond the facade.
- there are many dependencies between clients and the implementation classes of an abstraction. Introduce a facade to decouple the subsystem from clients and other subsystems, thereby promoting subsystem independence and portability.
- you want to layer your subsystem. Use a facade to define an entry point to each subsystem level. If subsystems are depedent, then you can simplify the dependencies between them by making them communicate with each other solely through their facades.

##Participants
- **Facade**
 - knows which subsystem classes are responsible for a request.
 - delegates client request to appropriate subsystem objects.
- **subsystem classes**
 - implement subsystem functionality.
 - handle work assigned by the Facade object.
 - have no knowledge of the facade; that is, they keep no references to it.
 
##Colaborations
 - Clients communicate with the subsystem by sending requests to `Facade`, which forwards them to appropriate subsystem object(s). Although the subsystem objects perform the actual work, the facade may have to do work of its own to translate its interface to subsystem interfaces.
 - Clients that use the facade don't have to access its subsystem objects directly.
