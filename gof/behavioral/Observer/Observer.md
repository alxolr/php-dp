#Observer Pattern [1] 
##Type
*Behavioral*

##Intent
> 

##Applicability
Use the `Memento` pattern when
 - a snapshot of (some portion of) an object's state must be saved so that it can be restored to that state later, and
 - a direct interface to obtaining the state would expose implementation details and break the object's encapsulation.
 
##Participants
- **Memento**
 - stores internal state of the `Originator` object. The memento may store as much or as little of the originator's internal state as necessary at its originator's discretion.
 - protects against access by objects other than originator. Memento have effectively two interfaces. Caretaker sees a narrow interface to the Memento - it can only pass the memento to the other objects. `Originator`, in contrast, sees a wide interface, one that lets it access all the data necessary to restore itself to its previous state. Ideally, only the originator that produced the memento would permitted to access the memento's internal state.
- **Originator**
 - creates a memento containing a snapshot of its current internal state.
 - uses the memento to restore it's internal state.
- **Caretaker**
 - is responsible for the memento's safekeeping
 - never operates on or examines the contents of a memento

##Colaborations
 - A caretaker requests a memento from an originator, holds it for a time, and passes it back to the originator. Sometimes the caretaker won't pass the memento back to the originator, because the originator might never need to revert to an earlier state.
 - Mementos are passive. Only the originator that created a memento will assign or retrieve its state.
 
##Implementation
* *Language support.* Mementos have two interfaces: a wide one for the originators and a narrowone for other objects. Ideally the implementation language will support two levels of static protection.
* *Storing incremental changes.* When mementos get created and passed back to their originator in a predictable sequence, then Memento can save just the *incremental change* to the originator's internal state.

[1] "Design Patterns: Elements of Reusable Object-Oriented Software" - *Erich Gamma, Richard Helm, Ralph Johnson, John Vlissides*
