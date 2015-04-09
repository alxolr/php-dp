#[Chain of Responsibility Pattern] [1]
##Type
*Behavioral*

##Intent
> *Avoid coupling the sender of a request to its receiver by giving more than one object a chance to handle the requests. Chain the receiving objects and pass the request along the chain until an object handles it.*

##Applicability
- more than one object may handle a request, and the handler isn't known *a priori*. The handler should be ascertained automatically.
- you want to issue a request to one of several objects without specifying the receiver explicitly.
- the set of objects that can handle a requests should be specified dynamically.

##Participants
- **Handler**
 - defines an interface for handling requests.
 - (optional) implements the successor link;
- **ConcreteHandler**
 - handles requests it is responsible for.
 - can access its successor.
 - if the `ConcreteHandler` can handle the request, it does so; otherwise it forwards the request to its successor.
- **Client**
 - initiates the request to a `ConcreteHandler` object on the chain.
 
##Colaborations
- When a client issues a request, the request propagates along the chain until a `ConcreteHandler` object takes 
responsibility for handling it.

[1]: "Design Patterns: Elements of Reusable Object-Oriented Software" - *Erich Gamma, Richard Helm, Ralph Johnson, John Vlissides*
