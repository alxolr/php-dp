#Mediator Pattern [1] 
##Type
*Behavioral*

##Intent
> Define an object that encapsulates how a set of objects interact. `Mediator` promotes loose coupling by keeping objects from referring to each other explicitly, and it lets you vary their interaction independently.

##Applicability
Use the `Mediator` pattern
 - a set of objects communicate in well-defined but complex ways. The resulting interdependencies are unstructured and difficult to understand.
 - reusing an object is difficult because it referers to and communicate switch many other objects.
 - a behavior that's distributed between several classes should be customizable without a lot of subclassing.
 
##Participants
- **Mediator**
 - defines an interface for communicating with `Colleague` objects.
- **ConcreteMediator**
 - implements cooperative behavior by coordinating `Colleague` objects.
 - knows and maintains its colleagues.
- **Colleague classes**
 - each Colleague class knows its `Mediator` object.
 - each colleague communicates with its mediator whenever it would have otherwise communicate with another colleague.


## Colaborations
 - `Colleagues` send and receive requests from a `Mediator` object. The mediator implements the cooperative behavior by routing requests between the appropriate colleagues(s). 
 
## Implementation

The following implementation issues are relevant to the `Mediator` pattern:
* *Omitting the abstract Mediator class.* There's no need to define an abstract Mediator class when colleagues work with only one mediator. The abstract coupling that the Mediator class provides lets colleagues work with different Mediator subclasses, and vice versa.
* *Colleague-Mediator communication.* Colleagues have to communicate with their mediator when an event of interest occurs. One approach is to implement the `Mediator` as an `Observer`. Colleague classes act as Subjects, sending notifications to the mediator whenever they change state. The mediator repsonds by propagating the effects of the change to the other colleagues.
 
 Another approach defines a specialized notification interface in Mediator that lets colleagues be more direct in their communication.

[1] "Design Patterns: Elements of Reusable Object-Oriented Software" - *Erich Gamma, Richard Helm, Ralph Johnson, John Vlissides*
