#Flyweight Pattern [1]
##Type
*Structural*

##Intent
> *Use sharing to support large numbers of fine-grained objects efficiently*

##Applicability
The **Flyweight Pattern** pattern's effectiveness depends heavily on how and where it's used. Apply the Flyweight pattern when all of the following are true:

- An application uses a large number of objects.
- Storage costs are high because of the sheer quantity of objects.
- Most object state can be made extrinsic.
- Many groups of objects may be replaced by relatively few shared objects once extrinsic state is removed.
- The application doesn't depend on object identity. Since flyweight objects may be shared, identity tests will return true for conceptually distinct objects.

##Participants
- **Flyweight**
 - declares an interface through which flyweights can receive and act on extrinsic state.
- **ConcreteFlyweight**
 - implements the Flyweight interface and adds storage for intrinsic state, if any. A `ConcreteFlyweight` object must be sharable. Any state if stores must be intrinsic; that is, it mus be independent of the `ConcreteFlyweight` object's context.
- **UnsharedConcreteFlyweight**
 - not all `Flyweight` subclasses need to be shared. The `Flyweight` interface enables sharing; it doesn't enforce it. It's common for `UnsharedConcreteFlyweight` objects to have `ConcreteFlyweight` objects as children at some level in the flyweight object structure.
- **FlyweightFactory**
 - creates and manages flyweight objects.
 - ensure that flyweights are shared properly. When a client requests a flyweight, the `FlyweightFactory` object supplies an existing instance or creates one, if none exists.
- **Client**
 - maintains a reference to flyweight(s).
 - computes or stores the extrinsic state of flyweight(s).
 
##Colaborations
- State that a flyweight needs to function must be characterized as either intrinsic or extrinsic. Intrinsic state is stored in the `ConcreteFlyweight` objects. Clients pass this state to the flyweight when they invoke its operations.
- Clients should not instantiate `ConcreteFlyweight`s directly. Clients must obtain `ConcreteFlyweight` objects exclusively from the `FlyweightFactory` object to ensure they are shared properly.

[1] "Design Patterns: Elements of Reusable Object-Oriented Software" - *Erich Gamma, Richard Helm, Ralph Johnson, John Vlissides*
