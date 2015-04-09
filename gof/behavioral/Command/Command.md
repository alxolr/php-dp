#[Command Pattern] [1] 
##Type
*Behavioral*

##Intent
> *Encapsulate a request as an object, thereby letting you parametrize clients with different request, queue or log request, and support undoable operations*

##Applicability
Use the `Command` Pattern when you want to
- parameterize objects by an action to perform. You can express such parameterization in a procedural language with a `callback` function, that is,
a function that's registered somewhere to be called at a later point. Commands are an object-oriented replacement for `callbacks`.
- specify, queue, and execute requests at different times. A command object can have a lifetime independent of the original request. If the receiver of a request can be represented in an address space-independent way, then you can transfer a command object for the request to a different process and fulfill the request there.
- support undo. The `Command`s Execute operation can store state for reversing it's effects in the command itself. The `Command` interface must have added Unexecute operation that reverse the effects of a previous call to Execute. Execute commands are stored in a history list. Unlimite-level undo and redo is achieved by traversing this list backwards and forwards calling Unexecute and Execute, respectively.
- support logging changes so that they can be reapplied incase of a system crash. By augmenting the Command interface with load and store operations, you can keep a persistent log of changes. Recovering from a crash involves reloading logged commands from disk and reexecuting them with the Execute operation.
- structure a system around high-level operations built on primitives operations. Such a structure is common in information systems that support `transactions`. A transaction encapsulate a set of changes to data. The `Command` pattern offers a way to model transactions. Commands have a common interface, letting you invoke all transactions the same way. The pattern also makes it easy to extend the system with new transactions.

##Participants
- **Command**
 - declares an interface for executing an operation.
- **ConcreteCommand**
 - defines a binding between a `Receiver` object and an action.
 - implements Execute by invoking the corresponding operation(s) on Receiver.
- **Client**
 - creates a `ConcreteCommand` object and sets its receiver.
- **Invoker**
 - ask the command to carry out the request.
- **Receiver**
 - knows how to perform the operations associated with carrying out a request. Any class may serve as a Receiver.

##Colaborations
- The `client` creates a `ConcreteCommand` object and specifies its `receiver`.
- An `Invoker` object stores the `ConcreteCommand` object.
- The `invoker` issues a request by calling `Execute` on the command. When commands are undoable, `ConcreteCommand` stores state for undoing the command prior to invoking Execute.
- The `ConcreteCommand` object invokes operations on its receiver to carry out the request.

[1]: "Design Patterns: Elements of Reusable Object-Oriented Software" - *Erich Gamma, Richard Helm, Ralph Johnson, John Vlissides*
