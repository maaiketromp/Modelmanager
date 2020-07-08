# Modelmanager
Make your models available throughout your application by using a modelmanager.

Models are needed in different places in the application. Usually a developer needs the same instance of a particular model to be able to work with it.
One way of making the model available to another class is to use dependency injection. Another way could be to make static classes or use the singleton pattern.

These solutions have drawbacks: putting models in constructors of every class gives a lot of boilerplate code. When following the second approach testability decreases, and creating a(n) (second) instance of a model will be impossible. The use of many static classes might also go against the idea of object-oriented programming.

This solution aims to use the singleton pattern in such a way that:
1. The models do not need to be implemented as singleton,
1. but one instance of each application model is available through a modelmanagerclass.

This is achieved in the following way:
1. The modelmanager contains private variables for application models, and public methods to retrieve these models.
1. If a model is not instantiated yet, the modelmanager will do so. 
1. The modelmanager stores the newly created instance.
1. When an existing model is available, the manager returns that instance.
1. The modelmanager is an abstract static class, approachable in the whole application.

Other notes:
* If a developer wants to create a second instance of a modelclass, for instance for testing purposes, he or she will be able to do so.
* In this example the crudclass is implemented as a singleton, using the standard code for singletons.

This solution was an assignment in a web development course by Educom and completed early March 2020, revised July 2020.
