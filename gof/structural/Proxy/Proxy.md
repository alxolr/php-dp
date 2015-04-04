#Proxy Pattern
##Type
*Structural*

##Intent
> *Provide a surrogate or placeholder for another object to control access to it*

##Also Known AS
**Surrogate**

##Applicability
`Proxy` is applicable whenever there is a need for a more versatile or sophisticated reference to an object than a 
simple pointer. Here are several common situations in which the `Proxy` pattern is applicable:

- A `remote proxy` provides a local representative for an object in a different address space.
- A `virtual proxy` creates expensive objects on demand.
- A `protection proxy` controls access to the original object. Protection proxies are useful when objects should have
 different access rights.
- A `smart reference` is a replacement for a bare pointer that performs additional actions when an object is accessed.
Typical uses include:
 - counting the number of references to the real object so that it can be freed automatically when there are no more
 references
 - loading a persistent object into memory when it's first referenced.
 - checking that the real object is locked before it's accessed to ensure that no other object can change it.

##Diagram
![Proxy](http://yuml.me/1c3ed541)

##Participants
- **Proxy**
 - maintains a reference that lets the proxy access the real subject. Proxy may refer to a `Subject` if the `RealSubject`
 and `Subject` interfaces are the same.
 - provides an interface identical to `Subject`'s so that a proxy can be substituted for the real subject.
 - controls access to the real subject and may be responsible for creating and deleting it.
 - other responsibilities:
  - `remote proxies` are responsible for encoding a request and its arguments and for sending the encoded request to the
  real subject in a different address space.
  - `virtual proxies` may cache additional information about the real subject so that they can postpone accessing it.
  - `protection proxies` check that the caller has the access permissions required to perform a request.
  
- **Subject**
 - defines the common interface for `RealSubject` and `Proxy` so that a `Proxy` can be used anywhere a RealSubject is expected.
- **RealSubject**
 - defines the real object that the proxy represents.
 
##Colaborations
The proxy forwards requests to `RealSubject` when appropriate, depending on the kind of proxy.