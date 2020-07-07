# Modelmanager
Uses of the singleton pattern to set up a model structure.

This is an assignment part of a web development course. 
The assignment: make a modelmanager.
1. The modelmanager contains private variables for application models, and public methods to retrieve the models.
2. If a model is not instantiated yet, the modelmanager will do so. 
3. It will store the newly created instance.
4. When a stored model is available, the manager will return the stored model.

This way, through the modelmanager, the same model instance will be returned every time
and the developer can access any model anywhere in de application.

Because the modelmanager is in charge of creating and storing the models, the model classes themselves do not need to be implemented as a singleton.
In testing 
Even though the user retrieves the same instance of the model every time, the model classes do not need to be implemented as a singleton.

a normal class also.
If a developer wants to create a second instance of a class, he or she will be able to do so.

The database is implemented as a singleton, using the standard code for singletons.

This assignment was completed in early March, 2020.
