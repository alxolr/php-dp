#Composite Pattern
##Type
*Structural*

##Intent
> *Compose objects into tree structures to represent part-whole hierarchies. Composite lets clients treat individual object and compositions of objects uniformly*

##Applicability
Use the **Composite Pattern** when:
- you want to represent part-whole hierarchies of objects.
- you want clients to be able to ignore the difference between compositions of objects and individual objects. Clients will treat all object in the composite structure uniformly.

##Participants
- **Component**
 - declares the interface for objects in the composition.
 - implements default behavior for interface common to all classes, as appropriate.
 - declares an interface for accessing and managing its child components.
 - defines an interface for accessing a component's parent in the recursive structure, and implements it if that's appropriate.
- **Leaf**
 - represents leaf objects in the composition. A leaf has no children.
 - defines behavior for primitive objects in the composition.
- **Composite**
 - defines behavior for components having children.
 - stores child components.
 - implements child-related operations in the Component interface.
- **Client**
 - manipulates objects in the composition through the `Component` interface.
 
##Colaborations
 - Clients use the Component class interface to interact with objects in the composite structure. If the recipient is a Leaf, then the request is handled directly. If the recipient is a Composite, then it usually forwards requests to its child components, possibly performing additional operations before and/or after forwarding.
