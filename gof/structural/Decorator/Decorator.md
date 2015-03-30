#Decorator Pattern
##Type
*Structural*

##Intent
> *Attach additional responsibilities to an object dynamically. Decorators provide a flexible alternative to subclassing for extending functionality*

##Also known as 
*Wrapper*

##Applicability
Use the **Decorator Pattern**:
- to add responsibilities to individual objects dynamically and transparently, that is, without affecting other objects.
- for responsibilities that can be withdrawn.
- when extension by subclassing is impractical. Sometimes a large number of independent extensions are possible and would produce an explosion of subclasses to support every combination. Or a class definition may be hidden or otherwise unavailable for subclassing.

##Participants
- **Component**
 - defines the interface for objects that can have responsibilities added to them dynamically.
- **ConcreteComponent**
 - defines an object to which additional responsibilities can be attached.
- **Decorator**
 - maintains a reference to a Component object and defines an interface that conforms to Component's interface.
- **ConcreteDecorator**
 - adds responsibilities to the component. 
 
##Colaborations
 - Decorator forwards requests to its Component object. It may optionally perform additional operations before and after forwarding the request.
